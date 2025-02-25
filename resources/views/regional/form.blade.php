<div class="row padding-1 p-1">

        <div class="form-group col-md-6">
            <label for="name" class="form-label">{{ __('Nombre') }} *   </label>
            <input type="text" name="name" class="form-control " required
                value="{{ old('name', $regional?->name) }}" id="name" placeholder="Nombre" required>
                       <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-6 ">
            <label for="phone" class="form-label">{{ __('Teléfono') }}</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                value="{{ old('phone', $regional?->phone) }}" id="phone" placeholder="Teléfono">
                <div class="help-block with-errors"></div>
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="mail" class="form-label">{{ __('Correo') }}</label>
            <input type="text"  id="mail"  name="mail" class="form-control @error('mail') is-invalid @enderror"
                value="{{ old('mail', $regional?->mail) }}" id="mail" placeholder="Correo">
                <div class="help-block with-errors"></div>
        </div>


        <div class="form-group col-md-6">
            <label for="address" class="form-label">{{ __('Paises') }}</label>
            <select id="country_id" name="country_id" class="form-control">

                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" @if ($country->id==$regional->country_id) select

                    @endif>
                        {{ $country->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group col-md-12">
            <label for="address" class="form-label">{{ __('Dirección') }}</label>
            <textarea type="text" name="address" class="form-control "
               id="address" placeholder="Dirección">{{ old('address', $regional?->address) }}</textarea>
               <div class="help-block with-errors"></div>
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
