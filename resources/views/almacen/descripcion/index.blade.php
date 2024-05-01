@extends ('layouts.admin')
@section ('contenido')

{{-- INICIO DEL APARTADO INFORMACION IMPORTANTE --}}
<?php
    $peli = [];

    $peli[0] = $peliculaDetalle->first()->titulo;
    $peli[1] = $peliculaDetalle->first()->portada;
    $peli[2] = $peliculaDetalle->first()->clasificacion;
    $peli[3] = $peliculaDetalle->first()->duracion;
    $peli[4] = $peliculaDetalle->first()->sala;
    $peli[5] = $peliculaDetalle->first()->trailer;
    $peli[6] = $peliculaDetalle->first()->sinopsis;
    $peli[7] = $peliculaDetalle->first()->id_pelicula;
?>   


    <div class="container text-light mt-5">
        <div>
            <h2>Informacion de la cartelera</h2>
            <h3 class="mt-3"><?= $peli[0] ?></h3>
        </div>

        <div class="d-flex">
            <div>
                <img src="{!! asset(@$peli[1]) !!}" style="width: 450px;" alt="">
            </div>

            <div class="ms-5">
                <div class="d-flex">
                    <div>
                        <h4>Clasificación:</h4>
                        <h4><?= $peli[2] ?></h4>
                    </div>

                    <div class="ms-5">
                        <h4>Duración:</h4>
                        <h4><?= $peli[3] ?> Minutos</h4>
                    </div>

                    <div class="ms-5">
                        <h4>Sala:</h4>
                        <h4>#<?= $peli[4] ?></h4>
                    </div>

                    <div class="ms-5">
                        <a href="<?= $peli[5] ?>" class="btn" style="background-color: #E7B411; width: 150%; font-weight: bold;">Ver trailer</a>
                    </div>
                </div>

                <div class="mt-5">
                    <h4>Horarios</h4>
                    <hr style="color: white;">

                    <div class="ps-3 pe-3 pt-2 pb-3 overflow-auto" style="background-color: #393939; height: 379px;">
                        @foreach ($peliculaDetalle as $horario)
                        <form action="{{ route('aPagar', $peli[7]) }}" method="post">
                            {{ csrf_field() }}

                            <div class="mt-3">
                                <h5><?= $horario->dia ?></h5>
                                <hr>

                                <div>
                                    <?php

                                        $horas = explode(",", $horario->hora_inicio);
                                        
                                        for ($i=0; $i < count($horas); $i++) {
                                            echo '
                                                <input type="hidden" id="hora_inicio" name="hora_inicio" value="<?= $horas[$i] ?>">
                                                <input type="submit" class="btn mb-1 ms-1" value="'. $horas[$i] .'" style="background-color: #E7B411; width: 20%; font-weight: bold;">
                                            ';
                                        }
                                    ?>
                                </div>
                            </div>
                        </form>

                        @endforeach
                        
                        

                        {{-- <div class="mt-3">
                            <h5>Martes</h5>
                            <hr>

                            <div >
                                <a href="#" class="btn" style="background-color: #E7B411; width: 20%; font-weight: bold;">00:00</a>
                                <a href="#" class="btn" style="background-color: #E7B411; width: 20%; font-weight: bold;">00:00</a>
                                <a href="#" class="btn" style="background-color: #E7B411; width: 20%; font-weight: bold;">00:00</a>
                                <a href="#" class="btn" style="background-color: #E7B411; width: 20%; font-weight: bold;">00:00</a>
                                <a href="#" class="btn" style="background-color: #E7B411; width: 20%; font-weight: bold;">00:00</a>
                                <a href="#" class="btn" style="background-color: #E7B411; width: 20%; font-weight: bold;">00:00</a>
                            </div>
                        </div>

                        <div class="mt-3">
                            <h5>Miercoles</h5>
                            <hr>

                            <div >
                                <a href="#" class="btn" style="background-color: #E7B411; width: 20%; font-weight: bold;">00:00</a>
                                <a href="#" class="btn" style="background-color: #E7B411; width: 20%; font-weight: bold;">00:00</a>
                                <a href="#" class="btn" style="background-color: #E7B411; width: 20%; font-weight: bold;">00:00</a>
                                <a href="#" class="btn" style="background-color: #E7B411; width: 20%; font-weight: bold;">00:00</a>
                                <a href="#" class="btn" style="background-color: #E7B411; width: 20%; font-weight: bold;">00:00</a>
                                <a href="#" class="btn" style="background-color: #E7B411; width: 20%; font-weight: bold;">00:00</a>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-5">
            <div>
                <h4>Sinopsis</h4>
                <hr>
            </div>

            <div>
                <p><?= $peli[6] ?></p>
            </div>

            <div>
                <h4>Más información</h4>
                <hr>
            </div>

            <div class="container">
                <div class="row align-items-start">
                    <div class="col-2">
                        <h4>Escritores:</h4>
                    </div>
                    <div class="col">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa quo recusandae eius aut dolore dolores exercitationem commodi 
                            pariatur, similique quasi porro dolorum! Eius tempore minus unde minima ex numquam placeat.</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-start">
                    <div class="col-2">
                        <h4>Elenco:</h4>
                    </div>
                    <div class="col">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa quo recusandae eius aut dolore dolores exercitationem commodi 
                            pariatur, similique quasi porro dolorum! Eius tempore minus unde minima ex numquam placeat.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
{{-- FIN DEL APARTADO INFORMACION IMPORTANTE --}}

@stop