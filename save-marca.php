<?php
$id_producto= $_REQUEST["id_producto"];
$id_marca= $_REQUEST["id_marca"];
$id_atributo= $_REQUEST["id_atributo"];
$descuento= $_REQUEST["descuento"];


$host="localhost";
  $dbname="ecoinova_bd";
  $username="root";
  $password="";

  $cnx=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
  //construir sql sentence
   $sql="INSERT INTO allocation(id,id_producto,id_marca,id_atributo,descuento)value(NULL,'$id_producto','$id_marca','$id_atributo','$descuento');";
 //preparar  Sql sentence
   $q=$cnx->prepare($sql);

   // ejecutar sentencia
   $result=$q->execute();
   if($result){
     echo "la marca del producto fue guardado";
   }else{
    echo "hubo un error al crear el producto";
   }
   //construir sql sentence
$sql="select id,name from producto";
//preparar  Sql sentence
  $q=$cnx->prepare($sql);

  // ejecutar sentencia
  $result=$q->execute();
  $productos=$q->fetchAll();
  $sql="select id,name from marca";
//preparar  Sql sentence
  $q=$cnx->prepare($sql);

  // ejecutar sentencia
  $result=$q->execute();
  $marca=$q->fetchAll();
  $sql="select id,name from atributos";
//preparar  Sql sentence
  $q=$cnx->prepare($sql);

  // ejecutar sentencia
  $result=$q->execute();
  $atributo=$q->fetchAll();
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagen/logo.png" />
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
    <title>Ecoinova</title>
</head>
<body>
    <nav>
        <img src="imagen/logo.png" alt="" class="logo">
         <a href="crear-productos.php" class="menu">Producto</a>
         <a href=""class="menu" >Marca</a>
         <!--<a href="" class="menu">Electrodomesticos</a>    -->
     </nav>  
     

   
    <div class="contacto">
    <header >
        <h1 class="title">Marca</h1>
    </header>
    <form action="save-marca.php" method="POST">
            Producto: <br>
            <select name="id_producto" id="">
            <option value="<?php echo $id_producto?>"><?php echo $id_producto?></option>
                <?php
                 for($i=0;$i<count($productos);$i++){
                ?>
                <option value="<?php echo $productos[$i]["id"]?>"><?php echo $productos[$i]["name"]?></option>
                <?php
                 }
                ?>
            </select> <br>
             Marca
            <select name="id_marca" id="">
            <option value="<?php echo $id_marca?>"><?php echo $id_marca?></option>
                <?php
                 for($i=0;$i<count($marca);$i++){
                ?>
                <option value="<?php echo $marca[$i]["id"]?>"><?php echo $marca[$i]["name"]?></option>
                <?php
                 }
                ?>
            </select> <br>

            Atributo:
            <select name="id_atributo" id="">
            <option value="<?php echo $id_atributo?>"><?php echo $id_atributo?></option>
                <?php
                 for($i=0;$i<count($atributo);$i++){
                ?>
                <option value="<?php echo $atributo[$i]["id"]?>"><?php echo $atributo[$i]["name"]?></option>
                <?php
                 }
                ?>
            </select> <br>
            Descuento:
            <input type="text" name="descuento" value="<?php echo $descuento?>"> <br>
           <input type="submit" value="Guardar">
        </form>
    </div>
       
    
    
    
    <footer>
       
        <div class="contactenos">
     
         <h3>Contáctenos</h3>
          <h3>ventas@ecoinova.com</h3> 
         <h3>+506 89676096</h3>
        </div>
          <div class="contactenos">
              <h1>Acerca de nuestra tienda</h1>
          <p>Somos una empresa distribuidora de todo tipo de productos, concebida por 
             <br> dos soñadores que buscan satisfacer las necesidades de niños, jóvenes y adultos. </p>
          </div>
          
          <div class="contactenos">
    
         <h1>Secciones</h1>
        <a href="index.html" class="link_pie">Inicio</a> 
         <a href="terminos.html" class="link_pie">TÉRMINOS Y CONDICIONES DE USO</a>
       <a href="contactenos.html" class="link_pie">Contáctenos</a>  
          </div>
     



    </footer>
</body>
</html>