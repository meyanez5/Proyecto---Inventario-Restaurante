<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Orden Compra</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.css">


</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #EBEBEB;">

  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="https://www.pngall.com/wp-content/uploads/8/Restaurant-Logo-PNG-Free-Download.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      Restaurante
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Inventario Materia Prima</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inventariopt.php">Inventario Producto terminado</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="clientes.php">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="proveedores.php">Provedores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Orden Compra</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.html">Salir</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br><br>
<div class="container">
    <h1 class="page-header text-center">Inventario Platillos</h1>
    <div class="row">
        <div class="col-12">
            <a href="addo.php" class="btn btn-primary addx">Añadir Platillo</a>
            <button  class="btn btn-primary reporte5" onclick="printReport()">Imprimir Reporte</button>
            <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead>
                    <th>Codigo</th>
                    <th>Nombre Platillo</th>
                    <th>Costo</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                </thead>
                <tbody>
                    <?php
                        //fetch data from json
                        $data = file_get_contents('ordenot.json');
                        //decode into php array
                        $data = json_decode($data);
 
                        $index = 0;
                        foreach($data as $row){
                            echo "
                                <tr>
                                    <td>".$row->codigo."</td>
                                    <td>".$row->nplatillo."</td>
                                    <td>".$row->costo."</td>
                                    <td>".$row->desc."</td>
                                    <td>".$row->cantidad."</td>
                                        <a href='editt.php?index=".$index."' class='btn btn-success btn-sm'>Editar&nbsp&nbsp&nbsp</a>
                                        <a href='deletet.php?index=".$index."' class='btn btn-danger btn-sm'>Eliminar</a>
                                    </td>
                                </tr>
                            ";
 
                            $index++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="script_imprimir.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>