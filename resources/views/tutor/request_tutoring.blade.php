
@extends('layouts.app-admin')

@section('title-header-admin')
Panel Tutor
@endsection

@section('content-admin')

<div class="d-flex justify-content-center align-items-center vh-100">
    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target=".bd-example-modal-sm">Solicitar tutor</button>
  </div>
                     <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">Solicitud de Tutoría</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <p>Tu solicitud de tutoría ha sido enviada exitosamente. Nos comunicaremos contigo pronto para coordinar los detalles. ¡Gracias por confiar en nosotros!</p>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              </div>
                           </div>
                        </div>
                     </div>
 @endsection
