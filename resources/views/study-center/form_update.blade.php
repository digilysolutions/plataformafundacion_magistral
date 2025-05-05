<div class="row padding-1 p-1">
    <div class="form-group col-md-4">
        <label for="name" class="form-label">{{ __('No') }} *</label>
        <input type="text" name="code" class="form-control " value="{{ old('code', $studyCenter?->code) }}"
            id="name" placeholder="No" required>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group col-md-4">
        <label for="name" class="form-label">{{ __('Nombre') }} *</label>
        <input type="text" name="name" class="form-control " value="{{ old('name', $studyCenter?->name) }}"
            id="name" placeholder="Nombre" required>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group col-md-4">
        <label for="membership_id" class="form-label">{{ __('Membresía') }} *</label>
        <select id="membership_id" name="membership_id" class="form-control" required>
            @foreach ($memberships as $membership)
                <option value="{{ $membership->id }}" @if ($membership->id == $studyCenter->membership_id) selected @endif>
                    {{ $membership->name }}</option>
            @endforeach
        </select>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="regional_id" class="form-label">{{ __('Regional') }} *</label>
        <select id="regional_id" name="regional_id" class="form-control" required>
            <option value="">Selecciona una regional</option>
            @foreach ($regionals as $regional)
                <option value="{{ $regional->id }}" @if ($regional->id == $studyCenter->regional_id) selected @endif>
                    {{ $regional->name }}
                </option>
            @endforeach
        </select>
        <div class="help-block with-errors"></div>
    </div>

    <div class="form-group col-md-6" id="districtGroup">
        <label for="district_id" class="form-label">{{ __('Distrito') }} *</label>
        <select id="district_id" name="district_id" class="form-control" required>
            <option value="">Selecciona un distrito</option>
            <!-- Las opciones de distrito se llenarán aquí dinámicamente -->
        </select>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="phone" class="form-label">{{ __('Teléfono') }}</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
            value="{{ old('phone', $studyCenter?->phone) }}" id="phone" placeholder="Teléfono">
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="mail" class="form-label">{{ __('Correo') }} *</label>
        <input type="text" id="mail" name="mail" class="form-control @error('mail') is-invalid @enderror"
            value="{{ old('mail', $studyCenter?->mail) }}" id="mail" placeholder="Correo" required>
        <div class="help-block with-errors"></div>
    </div>


    <div class="form-group col-md-12">
        <label for="address" class="form-label">{{ __('Dirección') }}</label>
        <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address"
            placeholder="Dirección  ">{{ old('address', $studyCenter?->address) }}</textarea>
        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div class="help-block with-errors"></div>
    </div>
    <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
        <input type="checkbox" class="custom-control-input bg-primary" id="customCheck-1" name="activated"
            checked="">
        <label class="custom-control-label" for="customCheck-1"> Activado</label>
    </div>
</div>
<hr>
<h5 class="mb-3 form-group">Datos del Responsable</h5>
<div class="row padding-1 p-1">
    <div class="form-group col-md-6">
        <label for="fname">Nombre:</label>
        <input type="text" class="form-control" name="name_people" id="name_people" placeholder="Nombre"
            value="{{ old('name_people', $studyCenter?->person?->name) }}">
    </div>
    <div class="form-group col-md-6">
        <label for="lname">Apellidos:</label>
        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellidos"
            value="{{ old('lastname', $studyCenter?->person?->lastname) }}">
    </div>
    <div class="form-group col-md-12">
        <label for="name" class="form-label">{{ __('Usuario') }}</label>
        <input type="text" name="username" class="form-control " value="{{ old('username', $studyCenter?->person?->user->email) }}"
            id="username" placeholder="Usuario" required>
        <div class="help-block with-errors"></div>
    </div>
     <div class="col-md-12">
    <div class="floating-label form-group position-relative">  <!-- Agregar position-relative -->
        <label>Contraseña</label>
        <input class="floating-input form-control" id="password" name="password" type="password" placeholder=" " autocomplete="current-password" />


        <!-- Ojo para mostrar/ocultar contraseña -->
        <span toggle="#password" class="toggle-password" style="cursor: pointer; position: absolute; right: 10px; top: 70%; transform: translateY(-50%); z-index: 1;">
            <!-- Ojo Cerrado por defecto -->
            <svg class="svg-icon eye-icon" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12c0 0 3.1 7 11 7s11-7 11-7-3.1-7-11-7-11 7-11 7z"></path>
                <circle cx="12" cy="12" r="3"></circle>
                <line x1="1" y1="1" x2="23" y2="23" stroke="currentColor" stroke-width="2"></line>
            </svg>
        </span>
    </div>
</div>


<div class="col-md-12 mt20 mt-2">
    <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
</div>
