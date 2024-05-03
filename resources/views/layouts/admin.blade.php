<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cine Constelación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{!! asset('./css/index.css') !!}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">
  </head>
  <body class="allerta-stencil-regular" onload="mostrarNoti()">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- INICIO DEL BANNER -->
    <div class="banner">
        <img src="{!! asset('./img/Banner.png') !!}" alt="Banner de Cine Constelación">

        <div class="nysLogoFondo">

        </div>

        <div class="contenedorNysLogo">
            <div class="nysLogo">
                <div class="logo">
                    <img src="{!! asset('./img/logos/logo_fondo_negro.png') !!}" alt="Logo de Cine Constelación con fondo negro">
                </div>
                <div class="nys">
                    <h1>CINE CONSTELACION</h1>
                    <p>DONDE LAS ESTRELLAS BRILLAN</p>
                </div>
            </div>
        </div>

        <div class="redesSociales">
            <a href="https://www.instagram.com" target="_blank"><img src="{!! asset('./img/logos/instagram.png') !!}" alt=""></a>
            <a href="https://www.tiktok.com/es/" target="_blank"><img src="{!! asset('./img/logos/tik-tok.png') !!}" alt=""></a>
            <a href="https://www.facebook.com/?locale=es_LA" target="_blank"><img src="{!! asset('./img/logos/facebook.png') !!}" alt=""></a>
        </div>
    </div>
    <!-- /FIN DEL BANNER -->

    <!-- INICIO DEL NAVBAR -->
    <nav style="position: sticky; top: 0; width: 100%; z-index: 3;">

        <div class="barra1">
            <ul>
                <li id="nombreCine"><a href="{{route('index')}}">CINE CONSTELACIÓN</a></li>
                
                <li id="iniciarSesion"><a href="#">Iniciar Sesion</a></li>
                <li id="registrarse"><a href="#">Registrarse</a></li>
                
                <div id="notiCarritoDiv">
                    <li><a href="#" id="carrito" onclick="carritoCompras()">Carrito de Compras</a></li>

                    <?php
                    $detalles = 0;
                    ?>

                    @foreach ($detalles_temporales as $item)
                        <?php
                            $detalles = $detalles + 1;
                        ?>
                    @endforeach
                    
                    <span id="notiCarrito" style="visibility: hidden;">
                       
                        <?php echo $detalles; ?>
                    </span>

                    <input type="text" name="" id="valorNoti" value="<?php echo $detalles; ?>" hidden>
                </div>
            </ul>
            
        </div>
        <div class="barra2">
            <ul>
                <li><a href="{{route('cartelera')}}">Preventas</a></li>
                <li><a href="{{route('cartelera')}}">Cartelera</a></li>
                <li><a href="{{route('index')}}" id="liInicio">
                    <img src="{!! asset('./img/logos/logo_fondo_negro.png') !!}" alt=""  id="imgInicio">
                </a></li>
                <li><a href="{{route('tienda')}}">Confitería</a></li>
                <li><a href="{{route('tienda')}}">Promociones</a></li>
            </ul>
        </div>
    </nav>
    <!-- FIN DEL NAVBAR -->

    {{-- INICIO DEL CARRITO DE COMPRAS --}}
        <div class="divBodyMio" id="div1" style="visibility: hidden;">
            
        </div>

        <div class="carritoDiv text-light text-center" id="div2" style="visibility: hidden;">
            <h2>Carrito de Compras</h2>
            <hr>
            
            <div class="overflow-auto" style="height: 77%;">
                <table class="table text-light">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Tamaño</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Total</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            
                        ?>
                    
                        @foreach ($detalles_temporales as $item)
                        <form action="{{route('editarItemCarrito', $item->id_det_vent_temp)}}" method="get">
                            {{ csrf_field() }}
                        <?php
                            
                            echo '
                                <tr class="table-dark">
                                    <td>'. $item->nombre .'</td>
                                    <td><input type="text" value="'. $item->cantidad .'" id="cantidad" name="cantidad"></td>
                                    <td>'. $item->tamanio .'</td>
                                    <td>'. $item->precio .'</td>
                                    <td>'. $item->total .'</td>
                                    <td>
                                        <input type="submit" value="Editar">
                                        /
                                        <a href="';?>{{route('eliminarItemCarrito', $item->id_det_vent_temp)}}<?php echo '">Eliminar</a>
                                    </td>
                                </tr>
                            ';

                        ?>    
                        </form>
                        @endforeach
                    
                    </tbody>
                  </table>
            </div>

            <button type="button" class="btn" style="background-color: #E7B411; width: 100px;" onclick="ocultarCarrito()">Salir</button>
        </div>
    {{-- FIN DEL CARRITO DE COMPRAS --}}
    
    @yield('contenido')

    <!-- INICIO DEL FOOTER -->
    <footer>
        <div class="navFooter d-flex justify-content-center pt-5 pb-5" style="background-color: #666666;">
            <div class="text-light">
                <h4>Cartelera</h4>
                <hr width="100%">
                <p>Semanal</p>
                <p>Preventas</p>
                <p>Preestrenos</p>
            </div>

            <div class="text-light ms-5">
                <h4>Confitería</h4>
                <hr width="100%">
                <p>Dulcería</p>
                <p>Bebidas</p>
                <p>Promociones</p>
            </div>

            <div class="text-light ms-5">
                <h4>¿Quiénes Somos?</h4>
                <hr width="100%">
                <p>Historia</p>
            </div>

            <div class="text-light ms-5">
                <h4>Redes Sociales</h4>
                <hr width="100%">
                <p>Instragram</p>
                <p>Tik Tok</p>
                <p>Facebook</p>
            </div>
        </div>
        <div class="copyFooter d-flex justify-content-center" style="background-color: #D7D7D7;">
            <p class="text-dark mt-3">Derechos de autor © 2024. Cine Constelación.</p>
        </div>
    </footer>
    <!-- FIN DEL FOOTER -->
    <script src="{{ asset('js/script.js') }}"></script>
  </body>
</html>