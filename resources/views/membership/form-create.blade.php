<div class="row padding-1 p-1">
    <div class="col-md-12">


        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="name" class="form-control " value="{{ old('name', $membership?->name) }}"
                id="name" placeholder="Nombre" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="price" class="form-label">{{ __('Precio') }}</label>
            <input type="text" name="price" class="form-control" id="price" placeholder="Precio" required
                value="{{ old('price', $membership?->price) }}" oninput="validatePrice()" />
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
        <div class="custom-control custom-checkbox custom-control-inline col-lg-6">
            <input type="checkbox" class="custom-control-input" id="customCheck5" name="is_studio_center">
            <label class="custom-control-label" for="customCheck5"> ¿Centro de estudio?</label>
        </div>
        <div class="help-block with-errors"></div>

        <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline col-lg-6">
            <input type="checkbox" class="custom-control-input bg-primary" id="customCheck-1" name="activated">
            <label class="custom-control-label" for="customCheck-1"> Activado</label>
        </div>
    </div>

</div>


<hr>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Características de la Membresía</h4>
                </div>
            </div>
            <div class="card-body">
                <div id="table" class="table-editable">

                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                            <tr>
                                <th>Características</th>
                                <th>Descripción</th>
                                <th>URL</th>
                                <th style="width: 180px">Acceso</th>
                                <th style="width: 150px">Límite de Uso</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($membershipsFeature as $membershipFeature)
                                <tr>
                                    <td contenteditable="true">{{ $membershipFeature->name }} </td>
                                    <td contenteditable="true"><input type="text" class="form-control"
                                            name="{{ $membershipFeature->id }}-description"
                                            id="{{ $membershipFeature->id }}-description"
                                            value="{{ old($membershipFeature->id . '-description') }}"></td>
                                    <td contenteditable="true"><input type="text" class="form-control"
                                            name="{{ $membershipFeature->id }}-url"
                                            id="{{ $membershipFeature->id }}-url"
                                            value="{{ old($membershipFeature->id . '-url') }}"></td>
                                    <td contenteditable="true"><select class="form-control"
                                            name="{{ $membershipFeature->id }}-has_access"
                                            id="{{ $membershipFeature->id }}-has_access"
                                            value="{{ old($membershipFeature->id . '-has_access') }}">
                                            <option value="true">Con Acceso</option>
                                            <option value="false">Sin Acceso</option>
                                        </select> </td>
                                    <td contenteditable="true"><input type="text" class="form-control"
                                            name="{{ $membershipFeature->id }}-usage_limit"
                                            id="{{ $membershipFeature->id }}-usage_limit" placeholder="null"
                                            value="{{ old($membershipFeature->id . '-usage_limit') }}"></td>

                                    <td>
                                        <span class="table-remove"><button type="button"
                                                class="btn bg-danger-light btn-rounded btn-sm my-0">Eliminar</button></span>
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="col-md-12 mt20 mt-2">
    <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
</div>
