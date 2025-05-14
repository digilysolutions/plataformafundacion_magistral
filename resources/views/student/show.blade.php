@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $student->name ?? __('Mostrar') . ' ' . __('Estudiante') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Estudiante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="@if(Auth::user()->role=="Centro Educativo"){{ route('students.indexToStudyCenter',[$student->studyCenter->id]) }} @elseif ( Auth::user()->role=="Administrador"){{ route('students.index') }} @endif"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">


                        <div class="form-group mb-2 mb20">
                            <strong>Código:</strong>
                            {{ $student->id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Usuario:</strong>
                            {{ $student->person->user->email }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre y Apellidos:</strong>
                            {{ $student->person->name }} {{ $student->person->lastname }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Curso:</strong>
                            {{ $student->course->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Centro de estudio:</strong>
                            @if($student->studyCenter) {{ $student->studyCenter->name }} @else No pertenece @endif
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Membresía:</strong>
                            @if($student->membership){{ $student->membership->name }} @else Sin membresía @endif
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Activado:</strong>
                            @if ($student->activated == 1)
                                Si
                            @else
                                No
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
