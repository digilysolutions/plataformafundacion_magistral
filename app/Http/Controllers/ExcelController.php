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
        return view('importStudents');
    } //Importar estudiantes
    public function importStudents(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new StudentsImport, $request->file('import_file'));

        return back()->with('success', 'Datos importados exitosamente.');
    }
}
