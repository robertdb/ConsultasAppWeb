<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2 align="center">Realizar consulta</h2>  

        <form method="POST" action="/proyectoWeb/consultas-pyme/admin/agregarConsulta.php" enctype="multipart/form-data">
  
        <label for="nombre">Nombre Completo:</label>&nbsp;<br>
        <input type="text" name="nombre" id="nombre"  autofocus required/><br><br>    
       
        <label for="mail">Mail:</label>&nbsp;<br>
        <input type="text" name="mail" id="mail"  autofocus required/><br><br>
         
        
        <label for="telefono">Teléfono:</label>&nbsp;<br>
        <input type="text" name="telefono" id="telefono"  autofocus required/><br><br>

        
          
        <label for="consulta">Consulta:</label>&nbsp;<br>
        <textarea name=consulta rows="4" cols="50"></textarea><br><br>

        <input type="submit" name="enviarr" value="enviar">

        </form>

        <p>&nbsp;</p>
    </body>
</html>
