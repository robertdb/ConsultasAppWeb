<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of administradorTest
 *
 * @author robert
 */
require_once '../src/administradorWeb.php';//no me corre esto , tiene q quedar la ruta asi

class administradorTest extends PHPUnit_Framework_TestCase
{
    
    public function testVeririficarTelVacio()
    {
        // Arrange
        $tel = '';
        $a = new AdministradorWeb();

        // Assert
        $this->assertEquals(True, $a->verificarTelVacio($tel));
    }
    
     public function testVeririficarMailVacio()
    {
        // Arrange
        $mail = '';
        $a = new AdministradorWeb();

        // Assert
        $this->assertEquals(True, $a->verificarMailVacio($mail));
    }
}
