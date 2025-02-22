<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="membership_id" class="form-label">{{ __('Membership Id') }}</label>
            <input type="text" name="membership_id" class="form-control @error('membership_id') is-invalid @enderror" value="{{ old('membership_id', $membershipFeaturesMembership?->membership_id) }}" id="membership_id" placeholder="Membership Id">
            {!! $errors->first('membership_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="membership_feature_id" class="form-label">{{ __('Membership Feature Id') }}</label>
            <input type="text" name="membership_feature_id" class="form-control @error('membership_feature_id') is-invalid @enderror" value="{{ old('membership_feature_id', $membershipFeaturesMembership?->membership_feature_id) }}" id="membership_feature_id" placeholder="Membership Feature Id">
            {!! $errors->first('membership_feature_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="value" class="form-label">{{ __('Value') }}</label>
            <input type="text" name="value" class="form-control @error('value') is-invalid @enderror" value="{{ old('value', $membershipFeaturesMembership?->value) }}" id="value" placeholder="Value">
            {!! $errors->first('value', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
