<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="name" class="form-control " value="{{ old('name', $student?->person?->name) }}"
                id="name" placeholder="Nombre" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lastname" class="form-label">{{ __('Apellidos') }}</label>
            <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror"
                value="{{ old('lastname', $student?->person?->lastname) }}" id="lastname" placeholder="Apellidos">
            <div class="help-block with-errors"></div>
        </div>

        <div class="form-group mb-2 mb20">
            <label for="phone" class="form-label">{{ __('Teléfono') }}</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                value="{{ old('phone', $student?->person?->phone) }}" id="phone" placeholder="Teléfono">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="address" class="form-label">{{ __('Curso') }}</label>
            <select id="course" name="course" class="form-control">

                <option value="Curso 1"> Curso 1</option>
                <option value="Curso 2"> Curso 2</option>
                <option value="Curso 3"> Curso 3</option>
                <option value="Curso 4"> Curso 4</option>

            </select>

        </div>

        @if (isset($idStudyCenter))
            <input name="studycenters_id" hidden value="{{$idStudyCenter}}">
        @else
            <div class="form-group mb-2 mb20">
                <label for="address" class="form-label">{{ __('Centro de Estudio') }}</label>
                <select id="studycenters_id" name="studycenters_id" class="form-control">
                    @foreach ($studyCenters as $studyCenter)
                        <option value="{{ $studyCenter->id }}" @if ($studyCenter->id == $student->studycenters_id) selected @endif>
                            {{ $studyCenter->name }}</option>
                    @endforeach

                </select>
                <div class="help-block with-errors"></div>
            </div>
        @endif

        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Usuario') }}</label>
            <input type="text" name="username" class="form-control " value="{{ old('username', $student?->person?->user->name) }}"
                id="username" placeholder="Usuario" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                 id="password" placeholder="Contraseña">
            <div class="help-block with-errors"></div>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
