@extends('layouts.app-admin')
@section('title-header-admin')
   Reporte Personal - Plataforma Fundación Magistral
@endsection
@section('content-admin')

<div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-tables table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>No</th>
                                        <th></th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Specialty') }}</th>
                                        <th>{{ __('Activated') }}</th>


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp

                                    @foreach ($validators as $validator)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $validator->person->id }}</td>
                                            <td>{{ $validator->person->name }}</td>
                                            <td>{{ $validator->specialty->name }}</td>
                                            <td>
                                                @if ($validator->activated == 1)
                                                    Si
                                                @else
                                                    No
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('validators.destroy', $validator->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('validators.show', $validator->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('validators.edit', $validator->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('¿Estás seguro que quieres eliminar?') ? this.closest('form').submit() : false;"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>{{ __('Code') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Especiality') }}</th>
                                        <th>{{ __('Activated') }}</th>

                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

@endsection
