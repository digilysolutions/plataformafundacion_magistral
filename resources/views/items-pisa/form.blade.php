<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $itemsPisa?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="code" class="form-label">{{ __('Code') }}</label>
            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code', $itemsPisa?->code) }}" id="code" placeholder="Code">
            {!! $errors->first('code', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="year" class="form-label">{{ __('Year') }}</label>
            <input type="text" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year', $itemsPisa?->year) }}" id="year" placeholder="Year">
            {!! $errors->first('year', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="question" class="form-label">{{ __('Question') }}</label>
            <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" value="{{ old('question', $itemsPisa?->question) }}" id="question" placeholder="Question">
            {!! $errors->first('question', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="activated" class="form-label">{{ __('Activated') }}</label>
            <input type="text" name="activated" class="form-control @error('activated') is-invalid @enderror" value="{{ old('activated', $itemsPisa?->activated) }}" id="activated" placeholder="Activated">
            {!! $errors->first('activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="state" class="form-label">{{ __('State') }}</label>
            <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" value="{{ old('state', $itemsPisa?->state) }}" id="state" placeholder="State">
            {!! $errors->first('state', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="resource" class="form-label">{{ __('Resource') }}</label>
            <input type="text" name="resource" class="form-control @error('resource') is-invalid @enderror" value="{{ old('resource', $itemsPisa?->resource) }}" id="resource" placeholder="Resource">
            {!! $errors->first('resource', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ai_help" class="form-label">{{ __('Ai Help') }}</label>
            <input type="text" name="ai_help" class="form-control @error('ai_help') is-invalid @enderror" value="{{ old('ai_help', $itemsPisa?->ai_help) }}" id="ai_help" placeholder="Ai Help">
            {!! $errors->first('ai_help', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="specialty_id" class="form-label">{{ __('Specialty Id') }}</label>
            <input type="text" name="specialty_id" class="form-control @error('specialty_id') is-invalid @enderror" value="{{ old('specialty_id', $itemsPisa?->specialty_id) }}" id="specialty_id" placeholder="Specialty Id">
            {!! $errors->first('specialty_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="level_id" class="form-label">{{ __('Level Id') }}</label>
            <input type="text" name="level_id" class="form-control @error('level_id') is-invalid @enderror" value="{{ old('level_id', $itemsPisa?->level_id) }}" id="level_id" placeholder="Level Id">
            {!! $errors->first('level_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sublevel_id" class="form-label">{{ __('Sublevel Id') }}</label>
            <input type="text" name="sublevel_id" class="form-control @error('sublevel_id') is-invalid @enderror" value="{{ old('sublevel_id', $itemsPisa?->sublevel_id) }}" id="sublevel_id" placeholder="Sublevel Id">
            {!! $errors->first('sublevel_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="content_id" class="form-label">{{ __('Content Id') }}</label>
            <input type="text" name="content_id" class="form-control @error('content_id') is-invalid @enderror" value="{{ old('content_id', $itemsPisa?->content_id) }}" id="content_id" placeholder="Content Id">
            {!! $errors->first('content_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
