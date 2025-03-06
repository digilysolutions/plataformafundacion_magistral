@extends('layouts.app-admin')

@section('title-header-admin')
    Membresía
@endsection
@section('content-admin')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Renovar Membresía</h3>
                </div>
                <div class="card-body">
                    <form id="renewMembershipForm" method="POST" action="{{ route('study_centers.renew_membership', ['studyCenterId' => $studyCenter->id]) }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="membership_id">Seleccionar Membresía</label>
                            <select class="form-control @error('membership_id') is-invalid @enderror" id="membership_id" name="membership_id" required>
                                <option value="">-- Seleccionar --</option>
                                @foreach ($memberships as $membership)
                                    <option value="{{ $membership->id }}" @if ( $membership->id ==$studyCenter->membership_id) selected

                                    @endif>{{ $membership->name }} - ${{ $membership->price }} ({{ $membership->duration_days }} días)</option>
                                @endforeach
                            </select>
                            @error('membership_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="payment_method">Método de Pago</label>
                            <select class="form-control @error('payment_method') is-invalid @enderror" id="payment_method" name="payment_method" required>
                                <option value="">-- Seleccionar --</option>
                                <option value="credit_card">Tarjeta de Crédito</option>
                                <option value="paypal">PayPal</option>
                                <!-- Puedes agregar más métodos de pago aquí -->
                            </select>
                            @error('payment_method')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Renovar Membresía</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
