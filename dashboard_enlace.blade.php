



<div class="container">
  <div class="row">



    @foreach ($secretarias_statistics as $secretary )
    <div class="col-lg-3">
<div class="small-box {{$secretary->bg_random_value}}">
  <div class="inner">
    <h3>{{number_format($secretary->percent,2)}}%</h3>
    <p>{{$secretary->name}}</p>
  </div>
  <div class="icon">
    <i class="fas ">&#xf043;</i>
  </div>
  <a type="button"class="small-box-footer" data-toggle="modal" data-target="#modal{{$secretary->id}}">
    Más info <i class="fas fa-arrow-circle-right"></i>
  </a>
  <div class="modal fade" id="modal{{$secretary->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <!-- modal-sm = modal small | modal-lg = modal large | modal-xl = modal extra large  -->
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title text-dark" id="exampleModalCenterTitle">Datos especificos del porcentaje</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body text-center">
                  <p class="text-dark">Solicitudes turnadas: <strong>{{$secretary->num_request_turned}}</strong></p>
                  <p class="text-dark">Solicitudes / conocimiento.: <strong>{{$secretary->num_request_knowledge}}</strong></p>
                  <p class="text-dark">Solicitudes / atención.: <strong>{{$secretary->num_request_for_attention}}</strong></p>
                  <p class="text-dark">Solicitudes / respuesta.: <strong>{{$secretary->num_request_completed}}</strong></p>
                  <p class="text-dark">Solicitudes pendiente.: <strong>{{$secretary->num_request_pending}}</strong></p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

              </div>
          </div>
      </div>
  </div>
</div>
</div>

    @endforeach







<div class="col-lg-3">
<div class="small-box bg-gradient-navy">
  <div class="inner">
    <h3>{{ number_format($secretarias_statistics[0]->percent_requests_answered, 2) }}%</h3>
    <p>Total Peticiónes Contestadas</p>
  </div>
  <div class="icon">
    <i class="fas ">&#xf1c1;</i>
  </div>


</div>

</div>








<div class="col-lg-4">




</div>





</div>
</div>
