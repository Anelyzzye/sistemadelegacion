<div class="col-lg-8 col-sm-12 container">
     <big><big>
     <a href="http://localhost/sistema_delegacion/index.php/ExportaHistorial_terreno/exportaPDF/<?= $criterio  ?>"><button class="btn btn-default"> Descargar Reporte PDF</button></a>
       </big></big>
                          
                            <div>
                                <table class="table table-responsive table-hover table-bordered">
                                    <?php
                                    echo "<tr>";
                                    echo "<th>Dueño Actual</th>";
                                    echo "<th>Dirección principal</th>";
                                    echo "<th>Superficie Medida</th>";
                                   
                                    echo "<th>Al norte calle y medida</th>";
                                    echo "<th>Al sur calle y medida</th>";
                                    echo "<th>Al oriente calle y medida</th>";
                                    echo "<th>Al poniente calle y medida</th>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    foreach ($resultadoterreno as $object) {
                                        $super=$object->superficie;
                                        $comprar=$object->comprador;
                                        $calle=$object->principal;
                                        $nt=$object->norte;
                                        $sur=$object->sur;
                                        $ote=$object->oriente;
                                        $pte=$object->poniente;
                                    echo "<td> $comprar </td>";    
                                    echo "<td> $calle </td>";
                                    echo "<td> $super m<sup>2</sup></td>";
                                    
                                    echo "<td> $nt m<sup>2</sup></td>";
                                    echo "<td> $sur m<sup>2</sup></td>";
                                    echo "<td> $ote m<sup>2</sup></td>";
                                    echo "<td> $pte m<sup>2</sup></td>";
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