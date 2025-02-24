<div class="row padding-1 p-1">
    <div class="col-md-12">


        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="name" class="form-control " value="{{ old('name', $studyCenter?->name) }}" id="name" placeholder="Nombre" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="address" class="form-label">{{ __('Dirección') }}</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $studyCenter?->address) }}" id="address" placeholder="Address">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="phone" class="form-label">{{ __('Teléfono') }}</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $studyCenter?->phone) }}" id="phone" placeholder="Teléfono">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="mail" class="form-label">{{ __('Correo') }}</label>
            <input type="text" name="mail" class="form-control @error('mail') is-invalid @enderror" value="{{ old('mail', $studyCenter?->mail) }}" id="mail" placeholder="Correo">
            <div class="help-block with-errors"></div>
        </div>

        <div class="form-group mb-2 mb20">
            <label for="regional_id" class="form-label">{{ __('Regional') }}</label>
            <select id="regional_id" name="regional_id" class="form-control">
                <option value="">Selecciona una regional</option>
                @foreach ($regionals as $regional)
                    <option value="{{ $regional->id }}" @if ($regional->id == $studyCenter->regional_id) selected @endif>
                        {{ $regional->name }}
                    </option>
                @endforeach
            </select>
            <div class="help-block with-errors"></div>
        </div>

        <div class="form-group mb-2 mb20" id="districtGroup" style="display: none;">
            <label for="district_id" class="form-label">{{ __('Distrito') }}</label>
            <select id="district_id" name="district_id" class="form-control">
                <option value="">Selecciona un distrito</option>
                <!-- Las opciones de distrito se llenarán aquí dinámicamente -->
            </select>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="membership_id" class="form-label">{{ __('Membresía') }}</label>
            <select id="membership_id" name="membership_id" class="form-control">

                @foreach ($memberships as $membership)
                    <option value="{{ $membership->id }}" @if ($membership->id==$studyCenter->membership_id) select

                    @endif>
                        {{ $membership->name }}</option>
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
