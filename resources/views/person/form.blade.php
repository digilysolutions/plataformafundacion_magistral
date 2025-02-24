<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $person?->name) }}" id="name" placeholder="Nombre" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lastname" class="form-label">{{ __('Apellidos') }}</label>
            <input type="text" name="lastname" class="form-control " value="{{ old('lastname', $person?->lastname) }}" id="Lastname" placeholder="Apellidos">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Correo') }}</label>
            <input type="text" name="email" class="form-control" value="{{ old('email', $person?->email) }}" id="email" placeholder="Correo">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="phone" class="form-label">{{ __('Teléfono') }}</label>
            <input type="text" name="phone" class="form-control " value="{{ old('phone', $person?->phone) }}" id="phone" placeholder="Teléfono">
            <div class="help-block with-errors"></div>
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
