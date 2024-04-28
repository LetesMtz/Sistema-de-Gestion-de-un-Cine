@extends ('layouts.admin')
@section ('contenido')

    <!-- INICIO DE CARTELERA SEMANAL -->
    <?php 
        $peli = [[]];
        $prod = [[]];
        $j=0;
        $i=0;
    ?>

    @foreach ($cartelerasEstreno as $item)
        <?php 
            $peli[$j][0]=$item->titulo;
            $peli[$j][1]=$item->sinopsis;
            $peli[$j][2]=$item->duracion;
            $peli[$j][3]=$item->genero;
            $peli[$j][4]=$item->portada;
            $peli[$j][5]=$item->trailer;
            $peli[$j][6]=$item->clasificacion;

            $j=$j+1;
        ?>
    @endforeach

    <div class="container mt-5 mb-5">
        <h2 class="text-light">Cartelera Semanal</h2>
        
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                

                <div class="carousel-item active d-flex">

                    <div class="position-absolute" style="background-color: black; opacity: 0.5; width: 100%; height: 100%;">
                    <!-- Fondo negro con opacidad 0.5 -->
                    </div>

                    <div class="position-absolute text-light d-flex mt-4 ms-5" style="left: 10%;">
                            <div class="" style="width: 20%;">
                                <img src="<?= $peli[0][4] ?>" class="w-100" alt="">
                            </div>
                            
                            <div>
                                <div class="infoPeliCarrusel ms-5" style="width: 720px; height: 95%; margin-bottom: 6%;">
                                    <div>
                                        <h3><?= $peli[0][0] ?></h3>
                                    </div>

                                    <div class="sinopsis p-3" style=" height: 67%;">
                                        <h4>Sinopsis:</h4>
                                        <p><?= $peli[0][1] ?></p>
                                    </div>

                                    <div class="infoPeliInferior d-flex">
                                        <div>
                                            <h6>Clasificación:</h6>
                                            <span><?= $peli[0][6] ?></span>
                                        </div>

                                        <div class="ms-5">
                                            <h6>Duración:</h6>
                                            <span><?= $peli[0][2] ?> Minutos</span>
                                        </div>

                                        <div class="position-absolute" style="right: 22%;">
                                            <a href="#" class="btn" style="background-color: #E7B411; width: 150%; font-weight: bold;">Ver trailer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <img src="./img/Banner.png" class="d-block w-100" alt="...">

                </div>
                
                <div class="carousel-item">

                    <div class="position-absolute" style="background-color: black; opacity: 0.5; width: 100%; height: 100%;">
                        <!-- Fondo negro con opacidad 0.5 -->
                    </div>

                    <div class="position-absolute text-light d-flex mt-4 ms-5" style="left: 10%;">
                        <div class="" style="width: 20%;">
                            <img src="<?= $peli[1][4] ?>" class="w-100" alt="">
                        </div>
                        
                        <div>
                            <div class="infoPeliCarrusel ms-5" style="width: 720px; height: 95%; margin-bottom: 6%;">
                                <div>
                                    <h3><?= $peli[1][0] ?></h3>
                                </div>

                                <div class="sinopsis p-3" style=" height: 67%;">
                                    <h4>Sinopsis:</h4>
                                    <p><?= $peli[1][1] ?></p>
                                </div>

                                <div class="infoPeliInferior d-flex">
                                    <div>
                                        <h6>Clasificación:</h6>
                                        <span><?= $peli[1][6] ?></span>
                                    </div>

                                    <div class="ms-5">
                                        <h6>Duración:</h6>
                                        <span><?= $peli[1][2] ?> Minutos</span>
                                    </div>

                                    <div class="position-absolute" style="right: 22%;">
                                        <a href="#" class="btn" style="background-color: #E7B411; width: 150%; font-weight: bold;">Ver trailer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                    <img src="./img/Banner.png" class="d-block w-100" alt="...">
                </div>

                <div class="carousel-item">
                    <div class="position-absolute" style="background-color: black; opacity: 0.5; width: 100%; height: 100%;">
                        <!-- Fondo negro con opacidad 0.5 -->
                    </div>

                    <div class="position-absolute text-light d-flex mt-4 ms-5" style="left: 10%;">
                        <div class="" style="width: 20%;">
                            <img src="<?= $peli[2][4] ?>" class="w-100" alt="">
                        </div>
                        
                        <div>
                            <div class="infoPeliCarrusel ms-5" style="width: 720px; height: 95%; margin-bottom: 6%;">
                                <div>
                                    <h3><?= $peli[2][0] ?></h3>
                                </div>

                                <div class="sinopsis p-3" style=" height: 67%;">
                                    <h4>Sinopsis:</h4>
                                    <p><?= $peli[2][1] ?></p>
                                </div>

                                <div class="infoPeliInferior d-flex">
                                    <div>
                                        <h6>Clasificación:</h6>
                                        <span><?= $peli[2][6] ?></span>
                                    </div>

                                    <div class="ms-5">
                                        <h6>Duración:</h6>
                                        <span><?= $peli[2][2] ?> Minutos</span>
                                    </div>

                                    <div class="position-absolute" style="right: 22%;">
                                        <a href="#" class="btn" style="background-color: #E7B411; width: 150%; font-weight: bold;">Ver trailer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                    <img src="./img/Banner.png" class="d-block w-100" alt="...">
                </div>
                
                

                
            </div>
            <button class="carousel-control-prev" style="margin-left: -2%;" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" style="margin-right: -2%;" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- FIN DE CARTELERA SEMANAL -->

    <!-- INICIO DE CONFITERIA -->
    <div class="container mb-5">
        <h2 class="text-light">Tienda</h2>

        <div class="d-flex"> 
            @foreach ($productos as $item)
            <?php 
        
                echo '
                <div class="card me-2 w-75" style="width: 25rem; background-color: #E8E8E8;">
                    <img src="'. $item->imagen .'" class="card-img-top bg-light" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">'. $item->nombre_tipo .'</h5>
                        <p class="card-text">'. $item->nombre .'</p>
                        <a href="'; 
            
            //Ruta del controlador tienda. Envia al usuario a la vista index de ese controlador.
            ?>{{ route('tienda') }}
            
            <?php 
                echo '
                        " class="btn" style="background-color: #E7B411;">Ir a la tienda del cine</a>
                    </div>
                </div>
                ';
        
            ?>
            @endforeach
        </div>
    </div>

    {{-- @foreach ($productos as $item)
    <?php 
        $prod[$i][0] = $item->nombre_tipo;
        $prod[$i][1] = $item->nombre;
        $prod[$i][2] = $item->imagen;
        $i=$i+1;
    ?>
    @endforeach --}}

    {{-- <div class="container mb-5">
        <h2 class="text-light">Confitería</h2>

        <div class="d-flex"> 

            <div class="card me-5" style="width: 25rem; background-color: #E8E8E8;">
                <img src="<?= $prod[0][2] ?>" class="card-img-top bg-light" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $prod[0][0] ?></h5>
                    <p class="card-text"><?= $prod[0][1] ?></p>
                    <a href="{{ route('tienda') }}" class="btn" style="background-color: #E7B411;">Ir a la tienda del cine</a>
                </div>
            </div>

            <div class="card me-5" style="width: 25rem; background-color: #E8E8E8;">
                <img src="<?= $prod[1][2] ?>" class="card-img-top bg-light" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $prod[1][0] ?></h5>
                    <p class="card-text"><?= $prod[1][1] ?></p>
                    <a href="{{ route('tienda') }}" class="btn" style="background-color: #E7B411;">Ir a la tienda del cine</a>
                </div>
            </div>

            <div class="card" style="width: 25rem; background-color: #E8E8E8">
                <img src="<?= $prod[2][2] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $prod[2][0] ?></h5>
                    <p class="card-text"><?= $prod[2][1] ?></p>
                    <a href="{{ route('tienda') }}" class="btn" style="background-color: #E7B411;">Ir a la tienda del cine</a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- FIN DE CONFITERIA -->

    <!-- INICIO DE PREVENTAS -->
    <?php
        $j = 0;
    ?>

    <div class="container mb-5">
        <h2 class="text-light">Preventas</h2>

        <div class="d-flex mt-3 justify-content-center">
            @foreach ($cartelerasPrestreno as $item)
            <?php 
                $j+=1;
                echo '<div class="card d-flex mt-5 me-5" id="cardPreventa'. $j .'" style="width: 18rem;">
                    <a href="#" style="text-decoration: none;">
                        <img src="' . $item->portada . '" class="card-img-top"  alt="...">
                        <div class="card-body position-absolute fixed-bottom bg-dark w-100" id="infoPreventa' . $j . '">
                            <p class="card-text" style="color: #E7B411;">Ver más información</p>
                        </div>
                    </a>
                </div>'
            ?>
            @endforeach

        </div>
    </div>

    {{-- 

    @foreach ($cartelerasPrestreno as $item)
        <?php 
            $peli[$j][0]=$item->titulo;
            $peli[$j][1]=$item->sinopsis;
            $peli[$j][2]=$item->duracion;
            $peli[$j][3]=$item->genero;
            $peli[$j][4]=$item->portada;
            $peli[$j][5]=$item->trailer;
            $peli[$j][6]=$item->clasificacion;

            $j=$j+1;
        ?>
    @endforeach
    <div class="container mb-5">
        <h2 class="text-light">Preventas</h2>

        <div class="d-flex mt-3 justify-content-center">
            <div class="card d-flex mt-5 me-5" id="cardPreventa1" style="width: 18rem; transform: rotate(-30deg);">
                <a href="#" style="text-decoration: none;">
                    <img src="<?= $peli[0][4] ?>" class="card-img-top"  alt="...">
                    <div class="card-body position-absolute fixed-bottom bg-dark w-100" id="infoPreventa1">
                        <p class="card-text" style="color: #E7B411;">Ver más información</p>
                    </div>
                </a>
            </div>

            <div class="card d-flex position-absolute" id="cardPreventa2" style="width: 18rem; z-index: 1;">
                <a href="#" style="text-decoration: none;">
                    <img src="<?= $peli[1][4] ?>" class="card-img-top"  alt="...">
                    <div class="card-body position-absolute fixed-bottom bg-dark w-100" id="infoPreventa2">
                        <p class="card-text" style="color: #E7B411;">Ver más información</p>
                    </div>
                </a>
            </div>

            <div class="card d-flex mt-5 ms-5" id="cardPreventa3" style="width: 18rem; transform: rotate(30deg);">
                <a href="#" style="text-decoration: none;">
                    <img src="<?= $peli[2][4] ?>" class="card-img-top"  alt="...">
                    <div class="card-body position-absolute fixed-bottom bg-dark w-100" id="infoPreventa3">
                        <p class="card-text" style="color: #E7B411;">Ver más información</p>
                    </div>
                </a>
            </div>
        </div>
    </div> --}}
    <!-- FIN DE PREVENTAS -->

    <!-- INICIO DE PRODUCTORAS -->
    <div class="container">
        <h2 class="text-light">Principales productoras con nosotros</h2>

        <div class="container d-flex mt-5 mb-5">
            <img src="./img/logos/logo-dreamworks2.png" class="p-1 me-5" style="background-color: #D9D9D9; width:400px; height:400px; border-radius:300px;" alt="">
            <img src="./img/logos/logo_disney_pixar2.png" class="p-1 me-5" style="background-color: #D9D9D9; width:400px; height:400px; border-radius:300px;" alt="">
            <img src="./img/logos/logo_paramount_pictures2.png" class="p-1" style="background-color: #D9D9D9; width:400px; height:400px; border-radius:300px;" alt="">
        </div>
    </div>
    <!-- FIN DE PRODUCTORAS -->

@stop