<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sistema
 *
 * @author robert
 */
class Sistema {
    
    private $baseDeDatos;
    
    private function conectarBaseDeDatos() {

      $this->baseDeDatos = new mysqli("localhost","root","","consultaOnline");
        // Check connection
      if ($this->baseDeDatos->connect_error) {
        die("Connection failed: " . $this->baseDeDatoss->connect_error);
      }  
    }


    private function desconectarBaseDeDatos() {
        $this->baseDeDatos->close();
    }
    
    public function ingresarConsulta($nombre,$mail,$tel,$consulta) {
        
        $this->conectarBaseDeDatos();
        
        $sql = "INSERT INTO consultaWeb VALUES ('', '$nombre', "
                . "'$mail','$tel','$consulta')";

	if ($this->baseDeDatos->query($sql) === False) {
        echo "ERROR MANUAL";
	
 
	} else {
            echo "Error: " . $sql . "<br>" . $this->baseDeDatos->error;
        }

        $this->desconectarBaseDeDatos();
        
    }

    public function obtenerCantidadDeRegistros(){
        # code...
        $this->conectarBaseDeDatos();

        // total de consultas en la base de datos.
        $sqlTabla = $this->baseDeDatos->query("SELECT * FROM consultaWeb ");   
        $totalDeRegistros = $sqlTabla ->num_rows;

        $this->desconectarBaseDeDatos();

        return $totalDeRegistros;

    }
    
    public function graficarConsultasLimitadas($offset,$rowsPerPage,$VarHtmlIni,$VarHtmlFin) {
     

            $this->conectarBaseDeDatos();

            $resultado = $this->baseDeDatos->query("SELECT * FROM consultaWeb ORDER BY id DESC LIMIT $offset, $rowsPerPage");
        
           

            while ( $row = $resultado->fetch_array(MYSQLI_BOTH)) {
            
                echo '<tr>';      
                echo $VarHtmlIni.$row['nombre'].$VarHtmlFin;
                echo '<td>2004-07-06</td>';
                echo $VarHtmlIni.$row['mail'].$VarHtmlFin;
                echo '<td>Buenos Aires</td>';
                echo $VarHtmlIni.$row['tel'].$VarHtmlFin;
                echo $VarHtmlIni.$row['consulta'].$VarHtmlFin;
                echo '<td>
                        <a href="../admin/consultaParticular.php?id='.$row['id'].'&nombre='.$row['nombre'].'&mail='.$row['mail'].'&consulta='.$row['consulta'].'&tel='.$row['tel'].'" ><img  src="../admin/img/buscar-incidencias.png" title="+info">&nbsp;&nbsp;<img  src="../admin/img/info.png" title="visto por Robert">&nbsp;&nbsp;<img  src="../admin/img/eliminar.png" title="eliminar consulta"
                        </a>  
                      </td>';
                       
                echo '</tr>';
            }
            
            $this->desconectarBaseDeDatos();
    }      
       
    
    
    function validarUsuario($usuario,$password,&$resultado) {
        
        $this->conectarBaseDeDatos(); 
        
        $res = $this->baseDeDatos->query("SELECT * FROM administradorWeb WHERE usuario = '$usuario' and password = '$password'");
        
        if($res->num_rows > 0)
        {
            $resultado = $res->fetch_array(MYSQLI_ASSOC);//solo se espera un registro
            $this->desconectarBaseDeDatos();
            return true;
        }
        else
        {   
            $this->desconectarBaseDeDatos();
            return false;
        } 
    }
}