@extends ('layouts.admin')
@section ('contenido')

<div class="container botonesPestania mt-4 ">
    <button type="button" class="btn btn-primary" onclick="mostrarBoleto()">Boletos</button>
    <button type="button" class="btn btn-primary" onclick="mostrarPagar()">Pagar</button>
    <hr style="border-color: #E7B411; border-width: 5px; opacity: 1;">
</div>

<div class="pestanias container mt-5 d-flex ">
    <div class="divBoletos text-light mb-5 w-50 " style="display: flex; text-align: center; justify-content: center;">
        <div>
            <div style="width: 300px">
                <form action="{{ route('agregarBoleto', $id_pelicula) }}" method="post">
                    {{ csrf_field() }}

                    <span>Elija los boletos:</span>
                    <select class="form-select w-100" id="id_boleto" name="id_boleto">
                        <option selected>Seleccione...</option>
                        @foreach ($boletos as $item)
                            @if ($pelicula->first()->id_clasificacion == 1)
                                <option value="<?= $item->id_producto ?>"><?= $item->nombre ?></option>
                            @endif

                            @if ($pelicula->first()->id_clasificacion > 1 && $item->nombre_producto <> 'Niños')
                                <option value="<?= $item->id_producto ?>"><?= $item->nombre ?></option>
                            @endif
                        @endforeach
                    </select>

                    <span>Elija el asiento:</span>
                    <select class="form-select w-100" name="id_asiento" id="id_asiento">
                        <option selected>Seleccione...</option>
                        @foreach ($asientos as $item)
                            @if ($item->id_estado == 2)
                                <option value="<?= $item->id_asiento ?>" disabled><?= $item->nombre ?>, Ocupado</option>
                            @endif

                            @if ($item->id_estado == 1)
                                <option value="<?= $item->id_asiento ?>"><?= $item->nombre ?></option>
                            @endif
                        @endforeach
                    </select>
                    
                    <button type="submit" class="w-75 form-control mt-3 ">Agregar boletos</button>
                </form>
            </div>

            <div>

            </div>
        </div>
    </div>

    <form action="{{ route('agregarVenta') }}" method="post">
        {{ csrf_field() }}

        <input type="hidden" name="id_pelicula" id="id_pelicula" value="<?= $id_pelicula ?>">
        
        <div class="divPagar w-100" style="display: none;">
            <div class="d-flex ">
                <div class="w-100 me-5 text-light">
                    <h2 class="text-light">Información necesaria:</h2>
                    
                    <div class="d-flex justify-content-between">
                    
                        <div class="mt-3 me-5 w-50">
                            <span>Nombre:</span>
                            <br>
                            <input type="text" class="w-100 form-control" id="nombre_cliente" name="nombre_cliente">
                        </div>
    
                        <div class="mt-3 w-50">
                            <span>Apellido:</span>
                            <br>
                            <input type="text" class="w-100 form-control" id="apellido_cliente" name="apellido_cliente">
                        </div>
                        
                    </div>
            
                    <div class="mt-3 ">
                        <span>Correo electrónico:</span>
                        <br>
                        <input type="text" class="w-100 form-control" id="email" name="email">
                    </div>
            
                    <div class="mt-3 ">
                        <span>Hora:</span>
                        <br>
                        <input type="text" value="<?= $hora_inicio ?>" class="w-100 form-control " id="hora_inicio" name="hora_inicio" readonly>
                    </div>
            
                    <div class="mt-3 ">
                        <span>Día:</span>
                        <br>
                        <input type="text" value="<?= $dia ?>" class="w-100 form-control " id="dia" name="dia" readonly>
                    </div>
            
                    <div class="mt-3 ">
                        <span>Tarjeta:</span>
                        <br>
                        <input type="text" class="w-100 form-control " id="num_tarjeta" name="num_tarjeta">
                    </div>
            
                    <div class="mt-3 ">
                        <span>CCV:</span>
                        <br>
                        <input type="text" class="w-100 form-control " id="ccv" name="ccv">
                    </div>
            
                    <div class="d-flex justify-content-between">
                        <div class="mt-3 me-5 w-50">
                            <span>Mes de vencimiento:</span>
                            <br>
                            <input type="month" class="w-100 form-control" id="mes_vencimiento" name="mes_vencimiento">
                        </div>
            
                        <div class="mt-3 w-50">
                            <span>Año de vencimiento:</span>
                            <br>
                            <input type="text" class="w-100 form-control" id="anio_vencimiento" name="anio_vencimiento">
                        </div>
                    </div>
                </div>
            
                
                
            </div>
            
            <div class="container d-flex justify-content-center mt-4 mb-5">
                <input type="submit" value="Realizar compra" class="form-control" style="width: 13vw;">
            </div>
        </div>
    </form>

    <div class="w-50 mb-5 ms-5 text-light">
        <h2>Información de la compra</h2>
    
        <div>
            <span>Nombre de la película</span>
            <br>
        </div>
    
        <div class="mt-3 me-5 w-100">
            <div class="overflow-auto" style="height: 25.5vw;">
                <table class="table text-light">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Tamaño</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Total</th>
                            <th scope="col">Asiento</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sumaPrecio = 0;
                        ?>
    
                        @foreach ($det_vent_temp as $item)
                        <?php
                            
                            echo '
                                <tr class="table-dark">
                                    <td>'. $item->nombre_producto .'</td>
                                    <td>'. $item->cantidad .'</td>
                                    <td>'. $item->tamanio .'</td>
                                    <td>'. $item->precio .'</td>
                                    <td>'. $item->total .'</td>
                                    <td>'. $item->nombre_asiento .'</td>
                                    <td><a href="';?>{{route('eliminarItemCarrito', $item->id_det_vent_temp)}}<?php echo '">Eliminar</a></td>
                                </tr>
                            ';
    
                            $sumaPrecio += $item->cantidad * $item->precio;
    
                        ?>    
                        @endforeach
    
                        
                      
                    </tbody>
                </table>
            </div>
            <div style="text-align: end;">
                <span>Total: $<?= $sumaPrecio ?></span>
            </div>
        </div>
    </div>
</div>


@stop