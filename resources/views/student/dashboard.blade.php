@extends('layouts.app-admin')
@section('title-header-admin')
   PLataforma Fundación Magistral
@endsection
@section('content-admin')
@php
$user = Auth::user();
@endphp
<h3>  {{$user->person->name}}</h3>
@include('pisa_test.test')
    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button>
@endsection

