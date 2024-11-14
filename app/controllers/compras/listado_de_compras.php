<?php
$sql_compras = "SELECT 
                dc.id as detalle_compra_id, 
                dc.Cantidad, 
                pro.Nombre as nombre_producto, 
                pro.Stock, 
                pro.Precio as precio_producto, 
                pro.Fecha_de_Produccion as fecha_ingreso, 
                cat.Nombre as nombre_categoria, 
                prov.nombre_Proveedor as nombre_proveedor, 
                prov.Celular as celular_proveedor, 
                prov.Direccion as direccion_proveedor
                FROM detalles_de_compras as dc
                INNER JOIN producto as pro ON dc.id_Producto = pro.id
                INNER JOIN categoria as cat ON pro.id_Categoria = cat.id
                INNER JOIN boletas_de_compras as bc ON dc.id_Boletas_de_Compras = bc.id
                INNER JOIN proveedor as prov ON bc.id_Proveedor = prov.id";
                
$query_compras = $pdo->prepare($sql_compras);
$query_compras->execute();
$compras_datos = $query_compras->fetchAll(PDO::FETCH_ASSOC);
?>
