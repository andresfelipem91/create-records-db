<?php
 //echo $name;
  // conectar base de datos
  $host="localhost";
  $dbname="ecoinova_bd";
  $username="root";
  $password="";

  $cnx=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
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
   //var_dump($students)
  /* if($result){
       echo "enrollment created succesgully";
   }else{
    echo "there was an error creating the enrollment";
   }*/
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
                <?php
                 for($i=0;$i<count($atributo);$i++){
                ?>
                <option value="<?php echo $atributo[$i]["id"]?>"><?php echo $atributo[$i]["name"]?></option>
                <?php
                 }
                ?>
            </select> <br>
            Descuento:
            <input type="text" name="descuento"> <br>
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