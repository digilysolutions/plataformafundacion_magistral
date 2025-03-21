@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Crear') }} Membresía
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-success m-4">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Membresía</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('memberships.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('memberships.store') }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            @csrf

                            @include('membership.form-create')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script>
    function validatePrice() {
        const input = document.getElementById('price');
        const value = input.value;

        // Reemplaza la coma por un punto para manejar correctamente el número
        const formattedValue = value.replace(',', '.');

        // Regular expression for positive decimal numbers
        const regex = /^(?!-)[0-9]*[.,]?[0-9]*$/;

        // Test the value against the regex
        if (!regex.test(formattedValue) || (formattedValue.includes('.') && formattedValue.split('.').length > 2)) {
            // If the value doesn't match the regex, remove the last character
            input.value = value.slice(0, -1);
        } else {
            // Update the input value to replace the comma with a dot for processing
            input.value = formattedValue.replace('.', ',');
        }
    }
</script>
     <script src=" {{ asset('js/table-treeview.js') }} "></script>
@endsection
