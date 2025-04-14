<div class="row padding-1 p-1">

        <div class="form-group col-md-6">
            <label for="name" class="form-label">{{ __('Nombre') }} *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $tutor?->person?->name) }}" id="name" placeholder="Entra el nombre del tutor" required>
            <div class="help-block with-errors"></div>

        </div>
        <div class="form-group col-md-6">
            <label for="lastname" class="form-label">{{ __('Apellidos') }}</label>
            <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname', $tutor?->person?->lastname) }}" id="lastname" placeholder="Apellidos">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-6">
            <label for="email" class="form-label">{{ __('Correo') }}</label>
            <input type="text"  id="mail"  name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $tutor?->person?->email) }}" id="email" placeholder="Correo">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-6">
            <label for="phone" class="form-label">{{ __('Teléfono') }}</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $tutor?->person?->phone) }}" id="phone" placeholder="Teléfono">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group  col-md-12">
            <label for="address" class="form-label">{{ __('Centro de Estudio') }} *</label>
            <select id="studycenters_id" name="studycenters_id" class="form-control" required>
                @foreach ($studyCenters as $studyCenter)
                    <option value="{{ $studyCenter->id }}" @if ($studyCenter->id==$tutor->studycenters_id) select

                    @endif>
                        {{ $studyCenter->name }}</option>
                @endforeach

            </select>
            <div class="help-block with-errors"></div>
        </div>

        <div class="form-group col-md-12">
            <label class="form-label" for="terms">Selecciona una  especialidad *</label>
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
            <input type="text" name="username" class="form-control " value="{{ old('username', $tutor?->person?->user->name) }}"
                id="username" placeholder="Usuario" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-12">
            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                 id="password" placeholder="Contraseña">
            <div class="help-block with-errors"></div>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
        <input type="checkbox" class="custom-control-input bg-primary" id="customCheck-1" name="activated"
            checked="">
        <label class="custom-control-label" for="customCheck-1"> Activado</label>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
