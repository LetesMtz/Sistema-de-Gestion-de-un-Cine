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

                    <script>
                        function precioAgua(){

                            var buscar = document.querySelector("#aguasId").value;
        
                                @foreach ($productos as $item)
                                    // document.querySelector("#precioAgua").value = '<?php
                                    //     echo $item->nombre;?>';
        
                                    if (buscar == {!! $item->id_producto !!}) {
                                        document.querySelector('#precioAgua').value = {!! $item->precio !!};                                        
                                    }
                                    
                                @endforeach
                        }
                    </script>

                    <form action="{{ route('carritoCompras') }}" method="post">
                        {{ csrf_field() }}
                        
                        <div class="w-100">
                            

                            <label for="aguas">Tamaño:</label>
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
                        </div>

                        <div class="ms-1 w-25">
                            <label for="hola">Precio:</label>
                            <input type="text" class="form-control mb-4" id="precioAgua" placeholder="" readonly>
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

        <div class="card me-5" style="width: 25rem; background-color: #E8E8E8;">
            <img src="./img/bebidas/varios_vasos.png" class="card-img-top bg-light" alt="...">
            <div class="card-body">
                <h5 class="card-title">Vaso de Soda</h5>
                
                <div class="d-flex">
                    <?php
                        $carrito = [];


                    ?>

                    <div class="w-75">
                        <label for="aguas">Soda:</label>
                        <select class="form-select" name="aguas" id="sodas" aria-label="Default select example" onchange="tamanioSoda()">
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
                    <input type="number" class="form-control mb-4" id="nameAgua" placeholder="1" min="1">
                </div>

                <a href="{{ route('tienda') }}" class="btn" style="background-color: #E7B411;">Añadir al carrito</a>
            </div>
        </div>

    </div>

</div>
{{-- FIN DEL APARTADO BEBIDAS --}}

{{-- INICIO DEL APARTADO GOLOSINAS --}}
<div class="container text-light mt-5">
    <h2>Golosinas</h2>

    <div class="d-flex"> 
    
        <div class="card me-5" style="width: 25rem; background-color: #E8E8E8;">
            <img src="./img/golosinas/varias_palomitas_acarameladas.png" class="card-img-top bg-light" alt="...">
            <div class="card-body">
                <h5 class="card-title">Palomitas de Maíz Acarameladas</h5>
                
                <div class="d-flex">
                    <?php
                        $carrito = [];


                    ?>

                    <div class="w-100">
                        <label for="aguas">Choose a car:</label>
                        @foreach ($productos as $item)
                        <?php
                            
                        ?>
                        @endforeach
                        <select class="form-select" name="aguas" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="ms-1 w-25">
                        <label for="hola">Precio:</label>
                        <input type="text" class="form-control mb-4" id="nameAgua" placeholder="" readonly>
                    </div>
                    
                </div>

                <a href="{{ route('tienda') }}" class="btn" style="background-color: #E7B411;">Añadir al carrito</a>
            </div>
        </div>

        <div class="card me-5" style="width: 25rem; background-color: #E8E8E8;">
            <img src="./img/golosinas/m&m_chocolate.png" class="card-img-top bg-light" alt="...">
            <div class="card-body">
                <h5 class="card-title">Chocolate M&M</h5>
                
                <div class="d-flex">
                    <?php
                        $carrito = [];


                    ?>

                    <div class="w-100">
                        <label for="aguas">Choose a car:</label>
                        @foreach ($productos as $item)
                        <?php
                            
                        ?>
                        @endforeach
                        <select class="form-select" name="aguas" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="ms-1 w-25">
                        <label for="hola">Precio:</label>
                        <input type="text" class="form-control mb-4" id="nameAgua" placeholder="" readonly>
                    </div>
                    
                </div>

                <a href="{{ route('tienda') }}" class="btn" style="background-color: #E7B411;">Añadir al carrito</a>
            </div>
        </div>

        <div class="card me-5" style="width: 25rem; background-color: #E8E8E8;">
            <img src="./img/golosinas/georgalos_chocolate_con_mani.png" class="card-img-top bg-light" alt="...">
            <div class="card-body">
                <h5 class="card-title">Chocolate con Maní Georgalos</h5>
                
                <div class="d-flex">
                    <?php
                        $carrito = [];


                    ?>

                    <div class="w-100">
                        <label for="aguas">Choose a car:</label>
                        @foreach ($productos as $item)
                        <?php
                            
                        ?>
                        @endforeach
                        <select class="form-select" name="aguas" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="ms-1 w-25">
                        <label for="hola">Precio:</label>
                        <input type="text" class="form-control mb-4" id="nameAgua" placeholder="" readonly>
                    </div>
                    
                </div>

                <a href="{{ route('tienda') }}" class="btn" style="background-color: #E7B411;">Añadir al carrito</a>
            </div>
        </div>

        <div class="card me-5" style="width: 25rem; background-color: #E8E8E8;">
            <img src="./img/golosinas/pretzel.webp" class="card-img-top bg-light" alt="...">
            <div class="card-body">
                <h5 class="card-title">Pretzel</h5>
                
                <div class="d-flex">
                    <?php
                        $carrito = [];


                    ?>

                    <div class="w-100">
                        <label for="aguas">Choose a car:</label>
                        @foreach ($productos as $item)
                        <?php
                            
                        ?>
                        @endforeach
                        <select class="form-select" name="aguas" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="ms-1 w-25">
                        <label for="hola">Precio:</label>
                        <input type="text" class="form-control mb-4" id="nameAgua" placeholder="" readonly>
                    </div>
                    
                </div>

                <a href="{{ route('tienda') }}" class="btn" style="background-color: #E7B411;">Añadir al carrito</a>
            </div>
        </div>

    </div>

</div>
{{-- FIN DEL APARTADO GOLOSINAS --}}

{{-- INICIO DEL APARTADO APERITIVOS --}}
<div class="container text-light mt-5 mb-5">
    <h2>Aperitivos</h2>

    <div class="d-flex"> 
    
        <div class="card me-5" style="width: 25rem; background-color: #E8E8E8;">
            <img src="./img/aperitivos/varias_palomitas_de_maiz.png" class="card-img-top bg-light" alt="...">
            <div class="card-body">
                <h5 class="card-title">Palomitas de Maíz</h5>
                
                <div class="d-flex">
                    <?php
                        $carrito = [];


                    ?>

                    <div class="w-100">
                        <label for="aguas">Choose a car:</label>
                        @foreach ($productos as $item)
                        <?php
                            
                        ?>
                        @endforeach
                        <select class="form-select" name="aguas" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="ms-1 w-25">
                        <label for="hola">Precio:</label>
                        <input type="text" class="form-control mb-4" id="nameAgua" placeholder="" readonly>
                    </div>
                    
                </div>

                <a href="{{ route('tienda') }}" class="btn" style="background-color: #E7B411;">Añadir al carrito</a>
            </div>
        </div>

        <div class="card me-5" style="width: 25rem; background-color: #E8E8E8;">
            <img src="./img/aperitivos/nachos.png" class="card-img-top bg-light" alt="...">
            <div class="card-body">
                <h5 class="card-title">Nachos</h5>
                
                <div class="d-flex">
                    <?php
                        $carrito = [];


                    ?>

                    <div class="w-100">
                        <label for="aguas">Choose a car:</label>
                        @foreach ($productos as $item)
                        <?php
                            
                        ?>
                        @endforeach
                        <select class="form-select" name="aguas" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="ms-1 w-25">
                        <label for="hola">Precio:</label>
                        <input type="text" class="form-control mb-4" id="nameAgua" placeholder="" readonly>
                    </div>
                    
                </div>

                <a href="{{ route('tienda') }}" class="btn" style="background-color: #E7B411;">Añadir al carrito</a>
            </div>
        </div>

        <div class="card me-5" style="width: 25rem; background-color: #E8E8E8;">
            <img src="./img/aperitivos/hot_dog.png" class="card-img-top bg-light" alt="...">
            <div class="card-body">
                <h5 class="card-title">Hot Dogs</h5>
                
                <div class="d-flex">
                    <?php
                        $carrito = [];


                    ?>

                    <div class="w-100">
                        <label for="aguas">Choose a car:</label>
                        @foreach ($productos as $item)
                        <?php
                            
                        ?>
                        @endforeach
                        <select class="form-select" name="aguas" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="ms-1 w-25">
                        <label for="hola">Precio:</label>
                        <input type="text" class="form-control mb-4" id="nameAgua" placeholder="" readonly>
                    </div>
                    
                </div>

                <a href="{{ route('tienda') }}" class="btn" style="background-color: #E7B411;">Añadir al carrito</a>
            </div>
        </div>

        <div class="card me-5" style="width: 25rem; background-color: #E8E8E8;">
            <img src="./img/aperitivos/pizza.png" class="card-img-top bg-light" alt="...">
            <div class="card-body">
                <h5 class="card-title">Porción de Pizza</h5>
                
                <div class="d-flex">
                    <?php
                        $carrito = [];


                    ?>

                    <div class="w-100">
                        <label for="aguas">Choose a car:</label>
                        @foreach ($productos as $item)
                        <?php
                            
                        ?>
                        @endforeach
                        <select class="form-select" name="aguas" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="ms-1 w-25">
                        <label for="hola">Precio:</label>
                        <input type="text" class="form-control mb-4" id="nameAgua" placeholder="" readonly>
                    </div>
                    
                </div>

                <a href="{{ route('tienda') }}" class="btn" style="background-color: #E7B411;">Añadir al carrito</a>
            </div>
        </div>

    </div>

</div>
{{-- FIN DEL APARTADO APERITIVOS --}}

@stop