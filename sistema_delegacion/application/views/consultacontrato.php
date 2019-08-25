<div class="col-lg-8 col-sm-12 container">
                          
    <big><big>
     <a href="http://localhost/sistema_delegacion/index.php/ExportaHistorial_contrato/exportaPDF/<?= $criterio  ?>"><button class="btn btn-default"> Descargar Reporte PDF</button></a>
       </big></big>
                            <div>
                                <table class="table table-responsive table-hover table-bordered">
                                    <?php
                                    echo "<tr>";
                                    echo "<th>Comprador</th>";
                                    echo "<th>Vendedor</th>";
                                    echo "<th>Fecha Contrato</th>";
                                    echo "<th>Dirección del Terreno</th>";
                                    echo "<th>Precio</th>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    foreach ($resultadocontrato as $object) {
                                        $compra=$object->comprador;
                                        $vende=$object->vendedor;
                                        $date=$object->fecha;
                                        $direccion=$object->principal;
                                        $valor=$object->precio;
                
                                    
                                    echo "<td> $compra </td>";
                                    echo "<td> $vende</td>";
                                    echo "<td> $date </td>";
                                    echo "<td> $direccion </td>";
                                    echo "<td> $valor</td>";
                        
                                    echo "</tr>";
                                }
                                    
                                    ?>
                                    
                                      
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
            </div>