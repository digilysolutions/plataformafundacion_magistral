<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="activated" class="form-label">{{ __('Activcado') }}</label>
            <input type="text" name="activated" class="form-control @error('activated') is-invalid @enderror" value="{{ old('activated', $studyCenter?->activated) }}" id="activated" placeholder="Activated">
            {!! $errors->first('activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $studyCenter?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="address" class="form-label">{{ __('Address') }}</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $studyCenter?->address) }}" id="address" placeholder="Address">
            {!! $errors->first('address', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="phone" class="form-label">{{ __('Phone') }}</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $studyCenter?->phone) }}" id="phone" placeholder="Phone">
            {!! $errors->first('phone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="mail" class="form-label">{{ __('Mail') }}</label>
            <input type="text" name="mail" class="form-control @error('mail') is-invalid @enderror" value="{{ old('mail', $studyCenter?->mail) }}" id="mail" placeholder="Mail">
            {!! $errors->first('mail', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tracking_code" class="form-label">{{ __('Tracking Code') }}</label>
            <input type="text" name="tracking_code" class="form-control @error('tracking_code') is-invalid @enderror" value="{{ old('tracking_code', $studyCenter?->tracking_code) }}" id="tracking_code" placeholder="Tracking Code">
            {!! $errors->first('tracking_code', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="regional_id" class="form-label">{{ __('Regional Id') }}</label>
            <input type="text" name="regional_id" class="form-control @error('regional_id') is-invalid @enderror" value="{{ old('regional_id', $studyCenter?->regional_id) }}" id="regional_id" placeholder="Regional Id">
            {!! $errors->first('regional_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="district_id" class="form-label">{{ __('District Id') }}</label>
            <input type="text" name="district_id" class="form-control @error('district_id') is-invalid @enderror" value="{{ old('district_id', $studyCenter?->district_id) }}" id="district_id" placeholder="District Id">
            {!! $errors->first('district_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="people_id" class="form-label">{{ __('Persona') }}</label>
            <input type="text" name="people_id" class="form-control @error('people_id') is-invalid @enderror" value="{{ old('people_id', $studyCenter?->people_id) }}" id="people_id" placeholder="Persona">
            {!! $errors->first('people_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="membership_id" class="form-label">{{ __('Membership Id') }}</label>
            <input type="text" name="membership_id" class="form-control @error('membership_id') is-invalid @enderror" value="{{ old('membership_id', $studyCenter?->membership_id) }}" id="membership_id" placeholder="Membership Id">
            {!! $errors->first('membership_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
