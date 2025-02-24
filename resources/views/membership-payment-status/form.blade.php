<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="activated" class="form-label">{{ __('Activcado') }}</label>
            <input type="text" name="activated" class="form-control " value="{{ old('activated', $membershipPaymentStatus?->activated) }}" id="activated" placeholder="Activated" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control  value="{{ old('name', $membershipPaymentStatus?->name) }}" id="name" placeholder="Name">
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
