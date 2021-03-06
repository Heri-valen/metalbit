<!--ventas-->
 <div class="col-md-10 col-lg-offset-1">
    <div class="box box-primary">
      <div class="box-header">
          <h3 class="box-title">Listado de mis anuncios de venta</h3>
            @guest
              <a href="{{route('login')}}" class="btn btn-primary pull-right btn-lg" >
                  <i class="fa fa-user-plus"> Crear Anuncio</i>
              </a>
              @else 
               <a href="{{route('anuncios.create')}}" class="btn btn-primary pull-right btn-lg" >
                  <i class="fa fa-user-plus"> Crear Anuncio</i>
              </a>
              @endguest 

      </div>
     <div class="box-body">
          <table id="users-table"class="table table-striped table-codensed table-hover table-resposive">
            <thead>
              <tr>
                <th>Tipo transacción</th>
                <th>Calificación</th>
                <th>Forma de Pago</th>
                <th>Ubicación</th>
                <th>Precio/Moneda</th>
                <th>Criptomoneda</th>
                <th>Limites</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
           
            <tbody>
              {{--se crean las tablas de ventas--}} 
              @foreach ($anuncios as $ad)
                  @if($ad->tipo_anuncio =="venta")
                   <tr>
                    <td class="text-green text-center"><strong><h3>Venta</h3></strong></td>
                    <td>
                      @for($i=1;$i<=$ad->calificacion;$i++)
                          @if($i<=3)
                            <img  class="star" src="{{asset('img/star.png')}}">
                          @endif
                      @endfor
                    </td>
                    <td>{{$ad->banco }}</td>
                    <td>{{$ad->ubicacion}}</td>
                    <td>
                       <span class="text-blue"><h4> {{$ad->precio_moneda}} </h4></span> <span class="text-red">{{$ad->moneda}}</span>
                      
                   </td>
                    <td>{{$ad->cripto_moneda}}</td>
                    <td>{{ number_format($ad->limite_min,2, ',', '.') }} / {{ number_format($ad->limite_max,2, ',', '.')}} {{$ad->moneda}}</td>
                    <td>
                      <h5 id="h5_estado_{{$ad->id}}">{{$ad->estado_anuncio}}</h5>
                      @if($ad->estado_anuncio=="activo")
                        <input id="rng_{{$ad->id}}" type="range" min="0" max="1" value="1" onchange="cambiar_estado('{{$ad->id}}')">
                      @else
                        <input id="rng_{{$ad->id}}" type="range" min="0" max="1" value="0" onchange="cambiar_estado('{{$ad->id}}')">
                      @endif
                      
                    </td>
                    <td>
                      @guest
                              <button id="{{'btn_'.$ad->cod_anuncio}}" type="button" class="btn btn-success" data-toggle="modal" onclick="descontar_recargar('{{ 'ventana_login'.$ad->id}}','{{$ad->cod_anuncio}}','0','info')">
                                Ver info
                                </button>
                                                      
                              <button id="{{'btn_'.$ad->cod_anuncio}}" type="button" class="btn btn-default" data-toggle="modal" onclick="descontar_recargar('{{ 'ventana_login'.$ad->id}}','{{$ad->cod_anuncio}}','0',false)">
                                Comprar
                              </button>

                          
                           @include('posts.ventana_modal_login')
                      @else
                        
                            <button id="{{'btn_'.$ad->cod_anuncio}}" type="button" class="btn btn-success" data-toggle="modal" onclick="descontar_recargar('{{ 'infogen'.$ad->id}}','{{$ad->id_anuncio}}','0',false)">
                            Ver info
                            </button>
                          
                          @include('posts.ventana_modal_info_general')

                      @endguest
                        
                        
                    </td>
                   </tr>
                  @endif
              @endforeach
              {{--se crean las tablas de ventas--}} 
            </tbody>
          </table>
          
     </div>



    </div>


 </div>
<!--ventas-->

