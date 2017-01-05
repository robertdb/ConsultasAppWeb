<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of administradorLogin
 *
 * @author robert
 */
require_once 'sistema.php';

class AdministradorLogin {
    //put your code here
    private $system;
    private $datosUsuario;


    public function accederAlsistema($sistema) {
        $this->system= $sistema;
    }
    
    public function iniciarSesion() {
        return session_start();
    }
    
    public function verificarLogin($usuario,$password) {
        $resultado;
        $autorizacion = $this->system->validarUsuario($usuario,$password,$resultado);
        $this->datosUsuario = $resultado;
        return $autorizacion;
    }
    
    public function getIdAdminWeb() {
        return $this->datosUsuario["id_admin"];
    }
    
    
    public function cerraraSesion() {
        // Retomamos la sesión.
        session_start();
        
        // Eliminamos las variables de sesión y sus valores.
        $_SESSION = array();
        
        // Eliminamos la cookie del usuario que identificaba a esa sesión,
        // verificando "si existía".
        if (ini_get("session.use_cookies") == True){
            $parametros = session_get_cookie_params();
            setcookie(session_name(),'', time()-99999,$parametros["path"],
            $parametros["domain"],$parametros["secure"],$parametros["httponly"]);
        }
        
        //// ELiminamos el archivo de sesión del servidor.
        session_destroy();
    }
    
    public function verificarEstadoDeSesion() {
        
        // Retomamos la sesión
        session_start();

        //Se comprueba si inició sessión algun administrador web
        if(isset($_SESSION['idAdminWeb'])){
            return True;
        }
        return False;
    }
}
