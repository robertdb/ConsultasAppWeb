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
 require_once '../src/administradorWeb.php';
 require_once '../src/director.php';

$director = new Director();
$admin = new AdministradorWeb();
$director->administrarSistema($admin);

$totalDeRegistros = $admin->obtenerTotalDeConsultas();

if ($totalDeRegistros > 0){
            
            //numero de registros por página
            $rowsPerPage = 10;
        
            //por defecto mostramos la página 1
            $pageNum = 1;
        
            // Compruebo si $_GET['page'] fue seteado, 
            if(isset($_GET['page'])) {
                sleep(1);
                $pageNum = $_GET['page'];
            }

            //contando el desplazamiento
            $offset = ($pageNum - 1) * $rowsPerPage;
            $total_paginas = ceil($totalDeRegistros / $rowsPerPage);



            echo '<table class="table table-striped table-advance table-hover">';

            echo '<tr>
                    <th><i class="icon_profile"></i>&nbsp; Nombre completo </th>
                    <th><i class="icon_calendar"></i>&nbsp;&nbsp;Fecha</th>
                    <th><i class="icon_mail_alt"></i>&nbsp;&nbsp;Email</th>
                    <th><i class="icon_pin_alt"></i>&nbsp;Ciudad</th>
                    <th><i class="icon_mobile"></i>&nbsp;Teléfono</th>
                    <th><i class="icon_mail_alt"></i>&nbsp;Consulta</th>
                    <th><i class="icon_cogs"></i>&nbsp;Action</th>
                  </tr>';

        
                	
            $admin->mostrarConsultasAsociadasConHtml($offset,$rowsPerPage,'<td>','</td>');

                 
            echo "</table>";

            

            if ($total_paginas > 1) {
            
                echo '<div class="pagination">';
                echo '<ul>';
        
                if ($pageNum != 1)
                    echo '<li><a class="paginate" data="'.($pageNum-1).'">Anterior</a></li>';
        
                $paginas = 5;
                $cantidad = 10;


                // Páginas del 1 al 10 como máximo, pueden ser menos si la cantidad total de 
                //páginas no llega a ser 10.
                if ($pageNum <= $paginas){

                    $i = 1;
                    while ($i <= $total_paginas && $i <= $cantidad) {
                
                        if ($pageNum == $i)
                            //si muestro el índice de la página actual, no coloco enlace
                            echo '<li class="active"><a>'.$i.'</a></li>';
                        else
                            //si el índice no corresponde con la página mostrada actualmente,
                            //coloco el enlace para ir a esa página
                            echo '<li><a class="paginate" data="'.$i.'">'.$i.'</a></li>';

                        $i++;
                    }
                }
                else{
                    if ($pageNum + 5 <= $total_paginas) {
                
                        $pagAnteriores = $pageNum - $paginas;
                        $pagSiguientes = $pageNum + $paginas;

                        $i = $pagAnteriores;
                        while ( $i < $pageNum) {
                    
                            //si el índice no corresponde con la página mostrada actualmente,
                            //coloco el enlace para ir a esa página
                            echo '<li><a class="paginate" data="'.$i.'">'.$i.'</a></li>';
                            $i++;
                        }

                        // Muestro el índice de la página actual, no coloco enlace
                        echo '<li class="active"><a>'.$pageNum.'</a></li>';

                        $i = $pageNum + 1;
                        while ($i <= $pagSiguientes) {
                    
                            //si el índice no corresponde con la página mostrada actualmente,
                            //coloco el enlace para ir a esa página
                            echo '<li><a class="paginate" data="'.$i.'">'.$i.'</a></li>';
                            $i++;
                        }
                    }
                    else{
                        if ($pageNum <= $cantidad) {
                    
                            $i = 1;
                            while ($i <= $total_paginas && $i <= $cantidad) {
                
                                if ($pageNum == $i)
                                    //si muestro el índice de la página actual, no coloco 
                                    //enlace
                                    echo '<li class="active"><a>'.$i.'</a></li>';
                                else
                                    // si el índice no corresponde con la página mostrada 
                                    // actualmente, coloco el enlace para ir a esa página
                                    echo '<li><a class="paginate" data="'.$i.'">'.$i.'</a></li>';
                                $i++;
                            }
                        }
                        else{
                    
                            $totalAmostrar = 11;
                            $difEnPaginas = ($total_paginas - $pageNum) + 1;
                            $anteriores = $totalAmostrar - $difEnPaginas;

                            $i = $pageNum - $anteriores;
                            while ($i < $pageNum) {
                        
                                //si el índice no corresponde con la página mostrada
                                // actualmente, coloco el enlace para ir a esa página
                                echo '<li><a class="paginate" data="'.$i.'">'.$i.'</a></li>';
                                $i++;
                            }
                    
                            // Muestro el índice de la página actual, no coloco enlace
                            echo '<li class="active"><a>'.$pageNum.'</a></li>';

                            $i = $pageNum + 1;
                            while ( $i <= $total_paginas) {
                        
                                //si el índice no corresponde con la página mostrada 
                                //actualmente, coloco el enlace para ir a esa página
                                echo '<li><a class="paginate" data="'.$i.'">'.$i.'</a></li>';
                                $i++;
                            }
                        }
                    }
                }
            if ($pageNum != $total_paginas)
                echo '<li><a class="paginate" data="'.($pageNum+1).'">Siguiente</a></li>';
        
            echo '</ul>';
            echo '</div>';
            echo "</td>";
        }
    else{
        
        echo '<h3> No hay consultas en el sistema</h3>';
        
        
    }
    }    
