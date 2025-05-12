@extends('layouts.app-admin')
@section('title-header-admin')
    PLataforma Fundación Magistral
@endsection
@section('content-admin')
    @php
        $user = Auth::user();
    @endphp
    <h3> {{ $user->person->name }}</h3>
    
@endsection
