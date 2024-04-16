@extends ('layouts.admin')
@section ('contenido')

{{-- INICIO DEL APARTADO DE CARTELERA COMPLETA --}}
<div class="container text-light mt-5">
    <h2>Cartelera Completa</h2>

    <div class="d-flex w-75"> 
    
        @foreach ($carteleraCompleta as $item)
        <?php
        //{{route('descripcionCartelera', 'id')}} -> Primero va el nombre de la ruta y despues el parametro a enviar a la ruta
        echo '
                <div class="card me-5 w-50" style="background-color: #E8E8E8;">
                    <a href="';?>{{route('descripcionCartelera', $item->id_pelicula)}}<?php echo '"><img src="'. $item->portada .'" class="card-img-top bg-light" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">'. $item->titulo .'</h5>
                        
                        <div class="d-flex">

                            <h5 class="card-text"></h5>
                            
                        </div>

                    </div>
                    </a>
                </div>
            ';
        ?>
        @endforeach
    </div>

</div>
{{-- FIN DEL APARTADO DE CARTELERA COMPLETA --}}

{{-- INCIO DEL APARTADO PREVENTAS --}}
<div class="container text-light mt-5 mb-5">
    <h2>Preventas</h2>

    <div class="d-flex w-75"> 
    
        @foreach ($carteleraPreventa as $item)
        <?php
            echo '
                <div class="card me-5 w-50" style="background-color: #E8E8E8;">
                    <a href="';?>{{route('descripcionCartelera', $item->id_pelicula)}}<?php echo '"><img src="'. $item->portada .'" class="card-img-top bg-light" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">'. $item->titulo .'</h5>
                        
                        <div class="d-flex">

                            <h5 class="card-text"></h5>
                            
                        </div>

                    </div>
                    </a>
                </div>
            ';
        ?>
        @endforeach
    </div>    
</div>
{{-- FIN DEL APARTADO PREVENTAS --}}

@stop