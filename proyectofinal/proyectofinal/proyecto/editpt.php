<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Platillo</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.css">
</head>
<body>
<?php
    //get id from URL
    $index = $_GET['index'];
 
    //get json data
    $data = file_get_contents('productotpt.json');
    $data_array = json_decode($data);
 
    //assign the data to selected index
    $row = $data_array[$index];
 
    if(isset($_POST['save'])){
        $input = array(
            'codigo' => $_POST['codigo'],
        'nplatillo' => $_POST['nplatillo'],
        'p1' => $_POST['p1'],
        'cantidad' => $_POST['cantidad'],
        'p2' => $_POST['p2'],
        'cantidad1' => $_POST['cantidad1'],
        'p3' => $_POST['p3'],
		'cantidad2' => $_POST['cantidad1']
        );
 
        //update the selected index
        $data_array[$index] = $input;
 
        //encode back to json
        $data = json_encode($data_array, JSON_PRETTY_PRINT);
        file_put_contents('productotpt.json', $data);
 
        header('location: recetapt.php');
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
                <label class="col-sm-2 col-form-label">Nombre del Platillo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nplatillo" name="nplatillo" value="<?php echo $row->nplatillo; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Producto1</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="p1" name="p1" value="<?php echo $row->p1; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Cantidad</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?php echo $row->cantidad; ?>">
                </div>  
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Producto2</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="p2" name="p2" value="<?php echo $row->p2; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Cantidad</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cantidad1" name="cantidad1" value="<?php echo $row->cantidad1; ?>">
                </div>  
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Producto3</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="p3" name="p3" value="<?php echo $row->p3; ?>">
                </div>      
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Cantidad</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cantidad2" name="cantidad2" value="<?php echo $row->cantidad2; ?>">
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