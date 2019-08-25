<div class="col-lg-8 col-sm-12 container">
    <big><big>
     <a href="http://localhost/sistema_delegacion/index.php/ExportaHistorial_tumba/exportaPDF/<?= $criterio  ?>"><button class="btn btn-default"> Descargar Reporte PDF</button></a>
       </big></big>
                          
                            <div>
                                <table class="table table-responsive table-hover table-bordered">
                                    <?php
                                    echo "<tr>";
                                    echo "<th>Nombre cádaver reapertura</th>";
                                    echo "<th>Tiempo</th>";
                                    echo "<th> Largo tumba</th>";
                                    echo "<th> Ancho tumba</th>";
                                     echo "<th> Separacion entre tumbas</th>";
                                    echo "<th>Nombre persona enterrada</th>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    foreach ($resultadotumba as $object) {
                                        $act=$object->actual;
                                        $tmb=$object->tumba;
                                        $tmp=$object->tiempo;
                                        $large=$object->largo;
                                        $anc=$object->ancho;
                                        $sep=$object->separacion;
                                    echo "<td> $tmb </td>"; 
                                    echo "<td> $tmp</td>";   
                                    echo "<td> $large mts </td>";
                                    echo "<td> $anc mts</td>";
                                    echo "<td> $sep cm</td>";
                                    echo "<td> $act</td>"; 
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