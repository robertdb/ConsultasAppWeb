<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of director
 *
 * @author robert
 */
require_once 'administradorWeb.php';
require_once 'sistema.php';

class Director extends AdministradorWeb{
    //put your code here
    public $sistema;
    
    public function __construct()
    {
        $this->sistema= new Sistema();
    }
    public function administrarSistema($admin) 
    {
        $admin->accederAlSistema($this->sistema);
    }
}
