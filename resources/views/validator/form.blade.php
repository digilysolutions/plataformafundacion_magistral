


<div class="row padding-1 p-1">

    <div class="form-group col-md-6">
        <label for="name" class="form-label">{{ __('Nombre') }} *</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $validator?->person?->name) }}" id="name" placeholder="Entra el nombre del validator" required>
        <div class="help-block with-errors"></div>

    </div>
    <div class="form-group col-md-6">
        <label for="lastname" class="form-label">{{ __('Apellidos') }}</label>
        <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname', $validator?->person?->lastname) }}" id="lastname" placeholder="Apellidos">
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="email" class="form-label">{{ __('Correo') }}</label>
        <input type="text"  id="mail"  name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $validator?->person?->email) }}" id="email" placeholder="Correo">
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="phone" class="form-label">{{ __('Teléfono') }}</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $validator?->person?->phone) }}" id="phone" placeholder="Teléfono">
        <div class="help-block with-errors"></div>
    </div>


    <div class="form-group col-md-12">
        <label class="form-label" for="terms">Selecciona una  especialidad *</label>
        <select id="specialty_id" class="form-control" name="specialty_id" required>
            @foreach ($specialties as $specialty)
                <option value="{{ $specialty->id }}" @if ($specialty->id == $validator->specialty_id) selected @endif>
                    {{ $specialty->name }}
                </option>
            @endforeach
        </select>
        <div class="help-block with-errors"></div>
    </div>

    
<div class="col-md-12 mt20 mt-2">
    <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
</div>
</div>
