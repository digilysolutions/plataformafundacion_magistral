<div class="row padding-1 p-1">
    <div class="col-md-12">


        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $tutor?->name) }}" id="name" placeholder="Nombre">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lastname" class="form-label">{{ __('Apellidos') }}</label>
            <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname', $tutor?->lastname) }}" id="lastname" placeholder="Apellidos">
            {!! $errors->first('lastname', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Correo') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $tutor?->email) }}" id="email" placeholder="Correo">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="phone" class="form-label">{{ __('Teléfono') }}</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $tutor?->phone) }}" id="phone" placeholder="Teléfono">
            {!! $errors->first('phone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="address" class="form-label">{{ __('Centro de Estudio') }}</label>
            <select id="studycenters_id" name="studycenters_id" class="form-control">
                @foreach ($studyCenters as $studyCenter)
                    <option value="{{ $studyCenter->id }}" @if ($studyCenter->id==$tutor->studycenters_id) select

                    @endif>
                        {{ $studyCenter->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="address" class="form-label">{{ __('Especialidad') }}</label>
            <select id="specialty_id" name="specialty_id" class="form-control">
                @foreach ($specialties as $specialty)
                    <option value="{{ $specialty->id }}" @if ($specialty->id==$tutor->specialty_id) select

                    @endif>
                        {{ $specialty->name }}</option>
                @endforeach

            </select>
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
