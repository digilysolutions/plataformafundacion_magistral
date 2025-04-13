<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Student::all();
    }

    public function headings(): array
    {
        return [

            'Nombre',
            'Apellidos',
            'Correo',
            'Telefono',
            'Curso',
            'Membresia',
            'Centro'
        ];
    }
}
