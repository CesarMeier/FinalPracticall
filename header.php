<header>
    <div class="banner-image d-flex justify-content-center align-items-center">

        <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
            <div class="container">
                <a class="navbar-brand" href="index.php">Museo</a>
            
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mx-auto"></div>

                    <?php if(!isset($_SESSION['dniadmin']) && !isset($_SESSION['dnigerente'])){ ?>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="listado_piezas.php">Listado De Piezas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="form_login.php">Ingresar</a>
                        </li>
                    </ul> 

                    <?php }else if (isset($_SESSION['dnigerente'])) { ?>

                    <ul class="navbar-nav  ms-auto ">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="pag_gerente.php">Gerente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="listado_piezas.php">Listado Piezas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="form_agregar_pieza.php">Agregar Pieza</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="salir.php">Salir</a>
                        </li>
                    </ul> 

                    <?php }else if (isset($_SESSION['dniadmin'])) { ?>

                    <ul class="navbar-nav  ms-auto ">
                        <li class="nav-item">
                                <a class="nav-link text-white" href="pag_administrador.php">Inicio</a>
                        </li>	
                        <li class="nav-item">
                            <a class="nav-link text-white" href="listado_usuarios.php">Listado de Usuarios</a>
                        </li>	
                        <li class="nav-item">
                            <a class="nav-link text-white" href="listado_piezas.php">Listado Piezas</a>
                        </li>	
                        <li class="nav-item">
                            <a class="nav-link text-white" href="form_agregar_pieza.php">Agregar Pieza</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="form_registro.php">Registrar Usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="salir.php">Salir</a>
                        </li>
                    </ul> 

                    <?php } ?>

                </div>
            </div>
        </nav> 
    

        <!-- Banner Image  -->
        <div class="content text-center">
            <h2 class="text-white titulo-subtitulo">Bienvenidos al museo </h2>
            <h1 class="text-white titulo-principal text-uppercase">Ciencias Naturales</h1>
        </div>

    </div>
</header>
    