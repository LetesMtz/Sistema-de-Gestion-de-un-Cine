@extends ('layouts.admin')
@section ('contenido')

{{-- INICIO DEL APARTADO BEBIDAS --}}


<div class="container mt-5 text-light">
    <h2>Bebidas</h2>

    <div class="d-flex"> 
    
        <div class="card me-5" style="width: 25rem; background-color: #E8E8E8;">
            <img src="./img/bebidas/355ml.webp" class="card-img-top bg-light" alt="...">
            <div class="card-body">
                <h5 class="card-title">Agua Embotellada</h5>
                
                <div class="d-flex">
                    <?php
                        $carrito = [];


                    ?>

                    

                    <form action="{{ route('carritoCompras') }}" method="post">
                        {{ csrf_field() }}
                        
                        <div class="w-100">
                            

                            <label for="aguasId">Tamaño:</label>
                            <select class="form-select" name="aguasId" id="aguasId" aria-label="Default select example" onchange="precioAgua()">
                                <option selected>Seleccione...</option>

                                @foreach ($productos as $item)
                                <?php
                                    if ($item->id_tipo_producto == 3 && $item->identificador == 'Agua') {
                                        echo '
                                            <option value="'. $item->id_producto .'">'. $item->tamanio .'</option>
                                        ';
                                    }
                                ?>
                                @endforeach
                                
                                
                            </select>

                            <script>
                                function precioAgua(){
        
                                    var buscar = document.querySelector("#aguasId").value;
                
                                    document.querySelector('#precioAgua').value = 23;
                                }
                            </script>
                        </div>

                        <div class="ms-1 w-25">
                            <label for="hola">Precio:</label>
                            <input type="text" class="form-control mb-4" id="precioAgua" placeholder="" readonly>
                        </div>
                        
                    </div>

                    <div class="ms-1 w-25">
                        <label for="hola">Cantidad:</label>
                        <input type="number" class="form-control mb-4" name="cantidadAguas" id="nameAgua" placeholder="1">
                    </div>

                    <button type="submit" class="btn mb-3" style="background-color: #E7B411;">Añadir al carrito</button>

                    

                </form>
            </div>
        </div>

        <div class="card me-5" style="width: 25rem; background-color: #E8E8E8;">
            <img src="./img/bebidas/varios_vasos.png" class="card-img-top bg-light" alt="...">
            <div class="card-body">
                <h5 class="card-title">Vaso de Soda</h5>
                
                <form action="{{ route('carritoCompras') }}" method="post">
                    {{ csrf_field() }}
                    <div class="d-flex">
                        <?php
                            $carrito = [];


                        ?>

                        <div class="w-75">
                            <label for="sodas">Soda:</label>
                            <select class="form-select" name="aguasId" id="sodas" aria-label="Default select example" onchange="tamanioSoda()">
                                <option selected>Seleccione...</option>
                                @foreach ($productos as $item)
                                <?php
                                    if ($item->id_tipo_producto == 3 && $item->identificador == 'Soda') {
                                        echo '
                                            <option value="'. $item->id_producto .'">'. $item->nombre .', ' . $item->tamanio .'</option>
                                        ';
                                    }
                                ?>
                                @endforeach

                            </select>

                            <script>
                                function tamanioSoda(){
            
                                    var buscar = document.querySelector("#sodas").value;
            
                                    @foreach ($productos as $item)
                                        // document.querySelector("#precioAgua").value = '<?php
                                        //     echo $item->nombre;?>';
            
                                        if (buscar == {!! $item->id_producto !!}) {
                                            document.querySelector('#precioSoda').value = {!! $item->precio !!};                                        
                                        }
                                        
                                    @endforeach
                                }
                            </script>
                        </div>

                        
                        <div class="w-25 ms-1">
                            <label for="hola">Precio:</label>
                            <input type="text" class="form-control mb-4" id="precioSoda" placeholder="" readonly>
                        </div> 
                        
                        
                    </div>

                    <div class="ms-1 w-25">
                        <label for="hola">Cantidad:</label>
                        <input type="number" class="form-control mb-4" name="cantidadAguas" id="nameAgua" placeholder="1" min="1">
                    </div>

                    <button type="submit" class="btn mb-3" style="background-color: #E7B411;">Añadir al carrito</button>

                </form>
            </div>
        </div>

    </div>

</div>
{{-- FIN DEL APARTADO BEBIDAS --}}

{{-- INICIO DEL APARTADO GOLOSINAS --}}
<div class="container text-light mt-5">
    <h2>Golosinas</h2>

    <div class="d-flex"> 
        
        <?php
            $i = 1;

            foreach ($productos as $item) 
            { 
                if ($item->id_tipo_producto == 1 && $i < 5) {
                    echo '
                        <div class="card me-5" style="width: 25rem; background-color: #E8E8E8;">
                            <form action="';?> {{ route('carritoCompras') }} <?php echo '" method="post">
                                ';?> {{ csrf_field() }} <?php echo '
                                <img src="'. $item->imagen .'" class="card-img-top bg-light" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">'. $item->nombre .'</h5>
                                    
                                    <div class="d-flex">
                                        <input type="hidden" value="'. $item->id_producto .'" name="aguasId" id="aguasId">

                                        <div class="ms-1 w-100">
                                            <label for="hola">Precio:</label>
                                            <input type="text" class="form-control mb-4" id="nameAgua" placeholder="" value="'. $item->precio .'" readonly>
                                        </div>
                                        
                                    </div>

                                    <div class="ms-1 w-100">
                                        <label for="hola">Cantidad:</label>
                                        <input type="text" class="form-control mb-4" id="cantidadAguas" name="cantidadAguas" placeholder="">
                                    </div>

                                    <button type="submit" class="btn mb-3" style="background-color: #E7B411;">Añadir al carrito</button>
                                </div>
                            </form>
                        </div>
                    ';

                    $i++;
                }
            }
        ?>
    </div>
</div>
{{-- FIN DEL APARTADO GOLOSINAS --}}

{{-- INICIO DEL APARTADO APERITIVOS --}}
<div class="container text-light mt-5 mb-5">
    <h2>Aperitivos</h2>

    <div class="d-flex"> 
    
        <?php
            $i = 1;

            foreach ($productos as $item) 
            { 
                if ($item->id_tipo_producto == 2 && $i < 5) {
                    echo '
                        <div class="card me-5" style="width: 25rem; background-color: #E8E8E8;">
                            <form action="';?> {{ route('carritoCompras') }} <?php echo '" method="post">
                                ';?> {{ csrf_field() }} <?php echo '
                                <img src="'. $item->imagen .'" class="card-img-top bg-light" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">'. $item->nombre .'</h5>
                                    
                                    <div class="d-flex">
                                        <input type="hidden" value="'. $item->id_producto .'" name="aguasId" id="aguasId">

                                        <div class="ms-1 w-100">
                                            <label for="hola">Precio:</label>
                                            <input type="text" class="form-control mb-4" id="nameAgua" placeholder="" value="'. $item->precio .'" readonly>
                                        </div>
                                        
                                    </div>

                                    <div class="ms-1 w-100">
                                        <label for="hola">Cantidad:</label>
                                        <input type="text" class="form-control mb-4" id="cantidadAguas" name="cantidadAguas" placeholder="">
                                    </div>

                                    <button type="submit" class="btn mb-3" style="background-color: #E7B411;">Añadir al carrito</button>
                                </div>
                            </form>
                        </div>
                    ';

                    $i++;
                }
            }
        ?>

    </div>

</div>
{{-- FIN DEL APARTADO APERITIVOS --}}

@stop