<?php

namespace App\Imports;

use App\Models\Membership;
use App\Models\Person;
use App\Models\Regional;
use App\Models\Student;
use App\Models\StudyCenter;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentsImport implements ToModel, WithHeadingRow
{
    protected $expectedHeaders = [
        'nombre',
        'apellidos',
        'correo',
        'telefono',
        'curso',
        'membresia',
        'centro'
    ];
    protected $headerErrors = [];
    // Asegúrate de incluir habilitar encabezados de la tabla
    protected array $duplicateEmails = [];
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string',
            'correo' => 'required|email',
            'apellidos' => 'nullable|string',
            'telefono' => 'nullable|string',
            'membresia' => 'nullable|string',
            'centro' => 'nullable|string',
            'curso' => 'nullable|string',
        ];
    }

    // Método que valida los encabezados
    public function getRowValidationRules(): array
    {
        return $this->expectedHeaders;
    }
    public function checkHeaders(array $headers): void
    {
        $expectedHeadersSet = collect($this->expectedHeaders);

        $providedHeadersSet = collect($headers);

        if (!$providedHeadersSet->diff($expectedHeadersSet)->isEmpty() || !$expectedHeadersSet->diff($providedHeadersSet)->isEmpty()) {
            $this->headerErrors[] = 'El archivo no contiene los encabezados correctos: ' . implode(', ', $this->expectedHeaders);
        }
    }

    public function getHeaderErrors(): array
    {
        return $this->headerErrors;
    }
    public function customValidationMessages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'El formato del correo no es válido.',
            // Otros mensajes personalizados según sea necesario
        ];
    }


    public function model(array $row)
    {
        // Filtrar columnas vacías
        $filteredRow = array_filter($row, function ($value) {
            return !is_null($value) && $value !== '';
        });

        // Inicializa un array estático para rastrear correos duplicados
        static $duplicateEmails = [];

        // Inicializa un contador para los correos en el Excel
        static $emailCounts = [];

        // Contamos cuántas veces aparece cada correo
        if (isset($filteredRow['correo'])) {
            $emailHash = $filteredRow['correo'];
            $emailCounts[$emailHash] = isset($emailCounts[$emailHash]) ? $emailCounts[$emailHash] + 1 : 1;

            // Si el correo ya fue contado en el Excel y es duplicado, lo registramos
            if ($emailCounts[$emailHash] > 1) {
                $this->duplicateEmails[$emailHash] = 'Duplicado en el Excel';
                return null; // Ignorar esta fila
            }
        }

        // Busca si existe un usuario con el mismo correo en la base de datos
        $existingUser = User::where('email', $filteredRow['correo'] ?? '')->first();

        // Si existe en la BD
        if ($existingUser) {
            $this->duplicateEmails[$emailHash] = 'Ya existe en la BD';
            return null; // Ignorar esta fila
        }

        // Continuar con la creación del usuario, persona y estudiante
        DB::beginTransaction();
        try {
            // Buscar la membresía y el centro de estudio
            $membership = Membership::where('name', $filteredRow['membresia'])->first();
            $studyCenter = StudyCenter::where('name', $filteredRow['centro'])->first();

            // Crear el usuario
            $user = User::create([
                'name' => $filteredRow['nombre'],
                'email' => $filteredRow['correo'],
                'activated' => true,
                'password' => Hash::make($filteredRow['nombre']),
                'membership_id' => $membership->id ?? null,
                'role' => 'Estudiante',
                'roleid' => 2
            ]);

            // Crear la persona vinculada
            $person = Person::create([
                'name' => $filteredRow['nombre'],
                'email' => $filteredRow['correo'] ?? null,
                'lastname' => $filteredRow['apellidos'] ?? null,
                'phone' => $filteredRow['telefono'] ?? null,
                'activated' => true,
                'user_id' => $user->id
            ]);

            // Crear el estudiante
            $student = new Student([
                'name' => $filteredRow['nombre'],
                'people_id' => $person->id,
                'course' => $filteredRow['curso'] ?? null,
                'studycenters_id' => $studyCenter ? $studyCenter->id : null
            ]);

            // Guardar el estudiante
            $student->save();

            DB::commit();
            return $student; // Retorna el estudiante creado

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return null; // Continúa ignorando esta fila
        }
    }

    // Obtiene los correos duplicados y su origen
    public function getDuplicateEmails()
    {
        return $this->duplicateEmails ?? [];
    }
}
