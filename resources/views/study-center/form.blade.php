<div class="row padding-1 p-1">

    <div class="form-group col-md-6">
        <label for="name" class="form-label">{{ __('Nombre') }} *</label>
        <input type="text" name="name" class="form-control " value="{{ old('name', $studyCenter?->name) }}"
            id="name" placeholder="Nombre" required>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group col-md-6">
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
        <label for="mail" class="form-label">{{ __('Correo') }}</label>
        <input type="text" id="mail" name="mail" class="form-control @error('mail') is-invalid @enderror"
            value="{{ old('mail', $studyCenter?->mail) }}" id="mail" placeholder="Correo">
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
        <input type="text" class="form-control" name="name_people" id="name_people" placeholder="Nombre" value="{{ old('name_people', $studyCenter?->person?->name) }}">
    </div>
    <div class="form-group col-md-6">
        <label for="lname">Apellidos:</label>
        <input type="text" class="form-control"  name="lastname" id="lastname" placeholder="Apellidos" value="{{ old('lastname', $studyCenter?->person?->lastname) }}">
    </div>
</div>


<div class="col-md-12 mt20 mt-2">
    <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
</div>
