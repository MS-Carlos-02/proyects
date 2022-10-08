<?php include "incluides/header.php"; ?>

<body>

    <div class="container card-body shadow mt-4" >
        <h2 class="text-center mb-4 font-weight-bold text-primary">Registro de libros</h2>
        <div class="d-flex mb-3" style="width: 20%; float:right">
            <label>Buscar:</label>
            <input class="form-control form-control-sm light-table-filter ml-2 " data-table="table_id" type="text" style="border-bottom: solid 5px #ededed; border-left: solid 5px #ededed; height: 10px" id="search" name="search">
        </div>
    
    
        <table class="table table-hover table-striped table_id" id="tblDatos">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">Año</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Título</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">URL</th>
                        <th scope="col">Especialidad</th> 
                        <th scope="col">Editorial</th>
                        <th scope="col">Acciones</th> 
                    </tr>
                </thead>
                    <tbody id="content"> 
                     <?php
                        include "db.php";

                        $sql = "SELECT * FROM `libro`";
                        $resultado = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($resultado)){
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $row['anio'] ?></td>
                                <td class="text-center"><?php echo $row['autor'] ?></td>
                                <td class="text-center"><?php echo $row['titulo'] ?></td>
                                <td class="text-center"><?php echo '<img src="'.$row['imagen'].'" width=40px height=auto>' ?></td>
                                <td><?php echo $row['url'] ?></td>
                                <td class="text-center"><?php echo $row['especialidad'] ?></td>
                                <td class="text-center"><?php echo $row['editorial'] ?></td>
                                <td class="text-center">
                                    <a href="editar.php?id=<?php echo $row['id'] ?>" class="link-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg></a>
                                    <a href="eliminar.php?id=<?php echo $row['id'] ?>" class="link-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg></a>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>  
                </tbody>
        </table>

        <div class="mt-5"id="paginador" style="margin: auto">

        </div>

    </div>   

    <?php include "incluides/footer.php"; ?>

    <script src="js/buscador.js"></script>
    <script src="js/page.js"></script>

</body>
</html>







