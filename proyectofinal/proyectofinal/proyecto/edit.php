<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.css">
</head>
<body>
<?php
    //get id from URL
    $index = $_GET['index'];
 
    //get json data
    $data = file_get_contents('productosmp.json');
    $data_array = json_decode($data);
 
    //assign the data to selected index
    $row = $data_array[$index];
 
    if(isset($_POST['save'])){
        $input = array(
            'codigo' => $_POST['codigo'],
            'nproducto' => $_POST['nproducto'],
            'costo' => $_POST['costo'],
            'nproveedor' => $_POST['nproveedor'],
            'desc' => $_POST['desc'],
            'cantidad' => $_POST['cantidad'],
            'peso' => $_POST['peso'],
            'unidadm' => $_POST['unidadm'],
            'fcaducidad' => $_POST['fcaducidad']
        );
 
        //update the selected index
        $data_array[$index] = $input;
 
        //encode back to json
        $data = json_encode($data_array, JSON_PRETTY_PRINT);
        file_put_contents('productosmp.json', $data);
 
        header('location: index.php');
    }
?>
<div class="container">
    <h1 class="page-header text-center">Editar</h1>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-8"><a href="index.php">Back</a>
        <form method="POST">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Codigo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $row->codigo; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nombre Producto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nproducto" name="nproducto" value="<?php echo $row->nproducto; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Costo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="costo" name="costo" value="<?php echo $row->costo; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nombre Proveedor</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nproveedor" name="nproveedor" value="<?php echo $row->nproveedor; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="desc" name="desc" value="<?php echo $row->desc; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Cantidad</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?php echo $row->cantidad; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Peso</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="peso" name="peso" value="<?php echo $row->peso; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Unidad de Medida</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="unidadm" name="unidadm" value="<?php echo $row->unidadm; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Fecha de Caducidad</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fcaducidad" name="fcaducidad" value="<?php echo $row->fcaducidad; ?>">
                </div>
            </div>
            <input type="submit" name="save" value="Guardar" class="btn btn-primary">
        </form>
        </div>
        <div class="col-5"></div>
    </div>
</div>    
</body>
</html>