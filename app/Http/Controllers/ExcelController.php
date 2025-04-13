<?php

namespace App\Http\Controllers;


use App\Imports\EstudiantesImport; // Asegúrate de crear esta clase de importación
use App\Imports\RegionalImport;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importView()
    {
        return view('import');
    }
    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new RegionalImport, $request->file('import_file'));

        return back()->with('success', 'Datos importados exitosamente.');
    }


    //-------------Estudiantes---------
    ///Vista para la carga Inicial de los estudiantes
    public function importViewStudents()
    {
        return view('study-center.importStudents');
    } //Importar estudiantes
    public function importStudents(Request $request)
    {

        $request->validate([
            'import_file' => 'required|mimes:xlsx,xls',
        ]);

        // Importar estudiantes
        $import = new StudentsImport();
        $headers =  $import->getRowValidationRules();
        $file = $request->file('import_file');
        $reader = Excel::toArray(new StudentsImport(), $file);
        $headers = array_keys($reader[0][0]);

        // Verifica los encabezados
        $import->checkHeaders($headers);
        $headerErrors = $import->getHeaderErrors();
        if (!empty($headerErrors)) {
            return back()->withErrors(['header_errors' => implode('<br>', $headerErrors)]);
        }

        try {
            Excel::import($import, $request->file('import_file'));
            // Obtener los correos duplicados de la importación
            $duplicateEmails = $import->getDuplicateEmails();

            if (!empty($duplicateEmails)) {
                // Formatear la salida
                $formattedDuplicates = implode('<br>', array_map(
                    fn($email, $message) => "$email: $message",
                    array_keys($duplicateEmails),
                    $duplicateEmails
                ));

                return back()->withErrors(['duplicates' => 'Los siguientes correos son duplicados:<br>' . $formattedDuplicates]);
            }
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            // Captura los errores de validación
            $failures = $e->failures();

            // Prepara los mensajes de error
            $errorMessages = [];
            foreach ($failures as $failure) {
                // Mensaje para cada fallo, aquí puedes personalizar
                $errorMessages[] = "Fila {$failure->row()}: " . implode(', ', $failure->errors());
            }
            return back()->withErrors(['duplicates' => implode('<br>', $errorMessages)]);
        }

        return back()->with('success', 'Datos importados exitosamente.');
    }
}
