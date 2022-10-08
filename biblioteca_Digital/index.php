
<link rel="icon" href="recursos/logo.jpg" >

<?php include "incluides/header.php"; ?>

<body>
    <section class="bg-grey">
        <!-- Navbar content -->
        <nav class="navbar navbar-expand-lg navbar-dark container">
            <div class="container-fluid">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 15rem; height:55px">Tématica</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" type="button" href="#literatura">Literatura</a>
                    <a class="dropdown-item" type="button">Cómic y fantasía</a>
                    <a class="dropdown-item" type="button">Infantil</a>
                    <a class="dropdown-item" type="button">Juvenil</a>
                    <a class="dropdown-item" type="button">Tecnología y ciencia</a>
                    <a class="dropdown-item" type="button">Programación</a>
                    <a class="dropdown-item" type="button">Conocimiento general</a>
                </div>
                </div>
            </div>
                <form action="" class="d-flex" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Escribe aquí el título o autor"   style="width: 35rem;" id="search" name="busqueda">
                    <button class="btn ml-1 btn-azul" type="submit" name="enviar">Buscar</button>
                </form>
            </div>
        </nav>
    </section>

    <style>
            .bg-grey{
                background-color: #ededed;
            }
            .container{
                width: 84%;
            }
            .btn-azul{
                background-color: #278dcd;
                color: #ffffff;
            }
            .btn-azul:hover{
                background-color: #2b6cd9;
                font-weight: 700;
                color: #ffffff;
            }
        </style>




    <main class="principal-center">
           <h2 class="mb-4"style="color:#298ccf; font-weight:bold" id="literatura">Literatura</h2>         

            <div class="grid-col-4">
                <table class="table table-striped table_id" id="tblDatos">
                    <thead class="table-dark text-center">

                    </thead>
                        <tbody id="content"> 
                        <?php
                            include "db.php";

                            $where = '';

                            if (isset($_GET['enviar'])){
                                $busqueda = $_GET['busqueda'];
                    
                                if (isset($_GET['busqueda'])){
                                    $where = "WHERE libro.titulo LIKE '%".$busqueda."%' OR autor LIKE'%".$busqueda."%'";
                                }
                            }                    

                            $sql = "SELECT * FROM `libro` $where";
                            $resultado = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($resultado)){
                                ?>
                                <div class="grid-col-4">                 
                                    <div class="m-auto">
                                        <p class="sombra"><?php echo '<img src="'.$row['imagen'].'">' ?></p>
                                        <p class="titulo-libro"><?php echo $row['titulo'] ?></p>
                                        <h6 class="titulo-autor"><?php echo $row['autor'] ?></h6>
                                        <a href="<?php echo $row['url'] ?>" class="btn btn-success mb-5 p-1 pl-2 pr-2" style="width:100%">Leer</a>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>  
                    </tbody>

                    <style>
                        .grid-col-4{
                            display: grid;
                            grid-template-columns: repeat(4, 1fr);   
                        }
                        .principal-center{
                            margin-top: 5rem;
                            margin-left: 10rem;
                        }
                        .sombra{
                            -webkit-box-shadow: 13px 13px 10px -4px rgba(184,178,184,1);
                            -moz-box-shadow: 13px 13px 10px -4px rgba(184,178,184,1);
                            box-shadow: 13px 13px 10px -4px rgba(184,178,184,1);
                            margin: auto 0 1rem;
                        }
                        .sombra:hover{
                            cursor: pointer;
                        }
                        .titulo-libro{
                            font-weight: bold;

                        }
                        .titulo-autor{
                            margin-top: -.75rem;
                            margin-bottom: 1rem;
                            font-weight: bolder;
                            color: #0d6efd;
                        }
                        .titulo-autor:hover{
                            color: red;
                            cursor: pointer;
                        }

                    </style>

            </table>
        </div>

    </main>

    <?php include "incluides/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>


























