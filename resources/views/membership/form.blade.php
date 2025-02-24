<div class="row padding-1 p-1">
    <div class="col-md-12">


        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="name" class="form-control "
                value="{{ old('name', $membership?->name) }}" id="name" placeholder="Nombre" required>
                <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="price" class="form-label">{{ __('Precio') }}</label>
            <input type="text" name="price" class="form-control "
                value="{{ old('price', $membership?->price) }}" id="price" placeholder="Precio" required>
                <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="type" class="form-label">{{ __('Tipo') }}</label>
            <input type="text" name="type" class="form-control @error('type') is-invalid @enderror"
                value="{{ old('type', $membership?->type) }}" id="type" placeholder="Tipo de Membresía">
                <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="duration_days" class="form-label">{{ __('Duración') }}</label>
            <input type="text" name="duration_days" class="form-control @error('duration_days') is-invalid @enderror"
                value="{{ old('duration_days', $membership?->duration_days) }}" id="duration_days"
                placeholder="Tiempo de Duración">
                <div class="help-block with-errors"></div>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="customCheck5" name="is_studio_center">
            <label class="custom-control-label" for="customCheck5"> ¿Centro de estudio?</label>
         </div>
         <div class="help-block with-errors"></div>

        <div id="student_limit_id" class="form-group mb-2 mb20">
            <label for="student_limit" class="form-label">{{ __('Cantidad de Estudiantes') }}</label>
            <input type="text" id="student_limit" name="student_limit" class="form-control @error('student_limit') is-invalid @enderror"
                value="{{ old('student_limit', $membership?->student_limit) }}" id="student_limit"
                placeholder="Cantidad de Estudiantes">
                <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="limite_items" class="form-label">{{ __('Cantidad de Items') }}</label>
            <input type="text" name="limite_items" class="form-control @error('limite_items') is-invalid @enderror"
                value="{{ old('limite_items', $membership?->limite_items) }}" id="limite_items"
                placeholder="Cantidad de Items">

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
