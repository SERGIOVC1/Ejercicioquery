<?php


function connection(){
    $host = "localhost:3306";  
    $user = "root";          
    $pass = "root";            
    $bd = "northwind";         

   
    $connect = mysqli_connect($host, $user, $pass, $bd);

  
    if (!$connect) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    return $connect;
}


$con = connection();

$sql = "SELECT ProductID, ProductName, UnitsInStock FROM Products";
$query = mysqli_query($con, $sql);


if (!$query) {
    die("Error en la consulta: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos - Northwind</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

<h1>Lista de Productos - Northwind</h1>


<table>
    <thead>
        <tr>
            <th>ID Producto</th>
            <th>Nombre del Producto</th>
            <th>Unidades en Stock</th>
        </tr>
    </thead>
    <tbody>
       
        <?php while ($row = mysqli_fetch_array($query)): ?>
            <tr>
                <td><?= $row['ProductID'] ?></td>
                <td><?= $row['ProductName'] ?></td>
                <td><?= $row['UnitsInStock'] ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>

<?php

mysqli_close($con);
?>
