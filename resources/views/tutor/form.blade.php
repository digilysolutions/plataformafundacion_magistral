<div class="row padding-1 p-1">

    <div class="form-group col-md-6">
        <label for="name" class="form-label">{{ __('Nombre') }} *</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $tutor?->person?->name) }}"
            id="name" placeholder="Entra el nombre del tutor" required>
        <div class="help-block with-errors"></div>

    </div>
    <div class="form-group col-md-6">
        <label for="lastname" class="form-label">{{ __('Apellidos') }}</label>
        <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror"
            value="{{ old('lastname', $tutor?->person?->lastname) }}" id="lastname" placeholder="Apellidos">
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="email" class="form-label">{{ __('Correo') }} *</label>
        <input type="text" id="mail" name="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $tutor?->person?->email) }}" id="email" placeholder="Correo" required>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="phone" class="form-label">{{ __('Teléfono') }}</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
            value="{{ old('phone', $tutor?->person?->phone) }}" id="phone" placeholder="Teléfono">
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group  col-md-12">
        <label for="address" class="form-label">{{ __('Centro de Estudio') }} *</label>
        <select id="studycenters_id" name="studycenters_id" class="form-control" required>
            @foreach ($studyCenters as $studyCenter)
                <option value="{{ $studyCenter->id }}" @if ($studyCenter->id == $tutor->studycenters_id) select @endif>
                    {{ $studyCenter->name }}</option>
            @endforeach

        </select>
        <div class="help-block with-errors"></div>
    </div>

    <div class="form-group col-md-12">
        <label class="form-label" for="terms">Selecciona una especialidad *</label>
        <select id="specialty_id" class="form-control" name="specialty_id" required>
            @foreach ($specialties as $specialty)
                <option value="{{ $specialty->id }}" @if ($specialty->id == $tutor->specialty_id) selected @endif>
                    {{ $specialty->name }}
                </option>
            @endforeach
        </select>
        <div class="help-block with-errors"></div>
    </div>


    <div class="form-group col-md-12">
        <label for="name" class="form-label">{{ __('Usuario') }}</label>
        <input type="text" name="username" class="form-control "
            value="{{ old('username', $tutor?->person?->user->name) }}" id="username" placeholder="Usuario" required>
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
    <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
        <input type="checkbox" class="custom-control-input bg-primary" id="customCheck-1" name="activated"
            checked="">
        <label class="custom-control-label" for="customCheck-1"> Activado</label>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
