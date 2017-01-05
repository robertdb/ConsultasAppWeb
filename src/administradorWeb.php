<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of administrador
 *
 * @author robert
 */
require_once 'sistema.php';

class AdministradorWeb {
    
    public $system;
    
    public function accederAlSistema($sistema)
    {
        $this->system= $sistema;
    }
   
    
    public function agregarNuevaConsulta($nombre,$mail,$tel,$consulta) {
        $this->system->ingresarConsulta($nombre,$mail,$tel,$consulta);
    }
    
    public function mostrarConsultasAsociadasConHtml($offset,$rowsPerPage,$VarHtmlIni,$VarHtmlFin) {

        $this->system->graficarConsultasLimitadas($offset,$rowsPerPage,$VarHtmlIni,$VarHtmlFin);
    }
    
    public function verificarMailVacio($mail) {
        if (empty($mail)) {
            return True;
        }
        return False;
    }
    public function verificarTelVacio($tel) 
    {
        if (empty($tel)) {
            return True;
        }
        return False;
        
    }

    public function obtenerTotalDeConsultas()
    {
        return ($this->system->obtenerCantidadDeRegistros());
    }
}
