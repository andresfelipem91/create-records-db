<?php
$name= $_REQUEST["name"];
$code= $_REQUEST["code"];
$price= $_REQUEST["price"];
$state= $_REQUEST["state"];
$stock= $_REQUEST["stock"];

$host="localhost";
  $dbname="ecoinova_bd";
  $username="root";
  $password="";

  $cnx=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
  //construir sql sentence
   $sql="INSERT INTO producto(id,name,code,price,state,stock)value(NULL,'$name','$code','$price','$state','$stock');";
 //preparar  Sql sentence
   $q=$cnx->prepare($sql);

   // ejecutar sentencia
   $result=$q->execute();
   //if($result){
       //echo "etudiante se gusrdo bien";
   //}else{
    //echo "hubo un error al crear el estudianete";
   //}
   
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
         <a href="crear-marca.php"class="menu" >Marca</a>
         <a href="" class="menu">Electrodomesticos</a>    
     </nav>  
     <header >
        <h1 class="title">Producto</h1>
    </header>

   
    <div class="contacto">
      
        <form action="save-producto.php" method="POST">
            Nombre*: <br>
            <input type="text" name="name" value="<?php echo $name ?>"><br>
            codigo*: <br>
            <input type="text" name="code" value="<?php echo $code ?>"><br>
             precio*: <br>
            <input type="number" name="price" value="<?php echo $price ?>"><br>
             Estado*: <br>
            <select name="state" >
            <option value="<?php echo $state ?>"><?php echo $state ?></option>
                <option value="activado">activado</option>
                <option value="ocupado">ocupado</option>
                <option value="agotado">agotado</option>
                <option value="contra-pedido">contra-pedido</option>
                <option value="en stock">en stock</option>
                <option value="preventa">preventa</option>
            </select> <br>
           stock <br>
           <input type="number" name="stock" value="<?php echo $stock?>"> <br>

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