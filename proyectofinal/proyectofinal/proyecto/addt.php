<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Añadir Platillo</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">Añadir Platillo</h1>
    <div class="row">
        <div class="col-1"></div>
        
        <form method="POST">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Codigo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="codigo" name="codigo">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nombre del Platillo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nplatillo" name="nplatillo">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Costo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="costo" name="costo">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="desc" name="desc">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Cantidad</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cantidad" name="cantidad">
                </div>  
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Fecha Caducidad</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fechacaducidad" name="fechacaducidad">
                </div>      
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Fecha Elaboracion</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fechaelaboracion" name="fechaelaboracion">
                </div>
            </div>
            <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Receta</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="receta">
                            <?php
                            $recetas = json_decode(file_get_contents('recetas.json'));
                            foreach ($recetas as $receta) {
                                echo '<option value="' . $receta->id . '">' . $receta->nombrereceta . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            <input type="submit" name="save" value="Guardar" class="btn btn-primary">
            <div style="margin-left: 20px;display:inline;"><a href="inventariopt.php">Back</a>
        </form>
        </div>
        <div class="col-5"></div>
    </div>
</div>  
<?php
if(isset($_POST['save'])){
    //open the json file
    $data = file_get_contents('productot.json');
    $data = json_decode($data);
 
    //data in our POST
    $input = array(
        'codigo' => $_POST['codigo'],
        'nplatillo' => $_POST['nplatillo'],
        'costo' => $_POST['costo'],
        'desc' => $_POST['desc'],
        'cantidad' => $_POST['cantidad'],
        'fechacaducidad' => $_POST['fechacaducidad'],
        'fechaelaboracion' => $_POST['fechaelaboracion']
    );
 
    //append the input to our array
    $data[] = $input;
    //encode back to json
    $data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('productot.json', $data);
 
    //open the json files
    $recetas = file_get_contents('recetas.json');
    $productos = file_get_contents('productosmp.json');
    $recetas = json_decode($recetas, true);
    $productos = json_decode($productos, true);

    //get the selected recipe from the ID in the select input
    $selected_recipe = $recetas[$_POST['receta']-1];

    //iterate through the ingredients of the selected recipe
    foreach($selected_recipe['ingredientes'] as $ingrediente){
        $producto = $ingrediente['producto'];
        $cantidad_necesaria = $ingrediente['cantidad'] * $_POST['cantidad'];

        //find the product in the products array
        $key = array_search($producto, array_column($productos, 'nproducto'));
        if($key !== false){
            //subtract the necessary amount from the product quantity
            if($productos[$key]['cantidad'] < $cantidad_necesaria){
                //not enough quantity
                echo "<script>alert('No hay suficiente cantidad del producto ".$producto."');</script>";
                die();
            }
            else{
                $productos[$key]['cantidad'] -= $cantidad_necesaria;
            }
        }
        else{
            //product not found
            echo "<script>alert('El producto ".$producto." no existe en el inventario');</script>";
            die();
        }
    }

    //encode back to json and save the file
    $productos = json_encode($productos, JSON_PRETTY_PRINT);
    file_put_contents('productosmp.json', $productos);

    header('location: inventariopt.php');
}
?>


</body>
</html>