@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Crear') }} Carga Inicial
@endsection
@section('content-admin')
    <h1>Carga Inicial de Datos</h1>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if($errors->any())
    <div>
        <strong>Errores:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li> <
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('importStudents') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Selecciona un archivo Excel:</label>
        <input type="file" name="import_file" required>
        <button type="submit" class="btn btn-primary btn-sm ">Cargar Datos</button>
    </form>
@endsection
