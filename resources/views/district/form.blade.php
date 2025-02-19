<div class="row padding-1 p-1">
    <div class="col-md-12">


        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $district?->name) }}" id="name" placeholder="Nombre">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="address" class="form-label">{{ __('Dirección') }}</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $district?->address) }}" id="address" placeholder="Dirección">
            {!! $errors->first('address', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="phone" class="form-label">{{ __('Teléfono') }}</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $district?->phone) }}" id="phone" placeholder="Teléfono">
            {!! $errors->first('phone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="mail" class="form-label">{{ __('Correo') }}</label>
            <input type="text" name="mail" class="form-control @error('mail') is-invalid @enderror" value="{{ old('mail', $district?->mail) }}" id="mail" placeholder="Correo">
            {!! $errors->first('mail', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="address" class="form-label">{{ __('Regionales') }}</label>
            <select id="regional_id" name="regional_id" class="form-control">

                @foreach ($regionals as $regional)
                    <option value="{{ $regional->id }}" @if ($regional->id==$district->regional_id) select

                    @endif>
                        {{ $regional->name }}</option>
                @endforeach

            </select>
        </div>

        <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
            <input type="checkbox" class="custom-control-input bg-primary" id="customCheck-1" name="activated"
                checked="">
            <label class="custom-control-label" for="customCheck-1"> Activado</label>
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
