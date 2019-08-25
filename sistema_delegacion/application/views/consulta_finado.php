<div class="col-lg-8 col-sm-12 container">
                            <aside class="r_widget search_widget">
                                
                            </aside>
                            <div>
                                <table class="table table-responsive table-hover table-bordered">
                                    <?php
                                    echo "<tr>";
                                    echo "<th>Nombre Ciudadano</th>";
                                    echo "<th>Curp</th>";
                                    echo "<th>Fecha Defunción</th>";
                                    echo "<th>Hora Defunción</th>";
                                    echo "<th>Acción a Realizar</th>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    foreach ($resultfinados as $object) {
                                        $dni=$object->dni;
                                        $sdni=$object->cnid;
                                        $nbr=$object->nom;
                                        $sgn=$object->sgciu;
                                        $pate=$object->pat;
                                        $mate=$object->mat;
                                        $fch=$object->fecha;
                                        $curp=$object->curp;
                                        $defun=$object->defun;
                                        $hr=$object->hora;
                                        $causas=$object->causas;
                                        $certi=$object->certi;
                                        $inhu=$object->inhu;
                                        $finhu=$object->finhu;
                                        $tporden=$object->tporden;
                                        $orden=$object->orden;
                                        
                
                                    echo "<td> $nbr $sgn $pate $mate </td>";  
                                    echo "<td> $curp </td>";  
                                    echo "<td> $defun</td>";
                                    echo "<td> $hr</td>";
                                    
                                    echo "<td>
                                        <a href='http://localhost/sistema_delegacion/index.php/Reaperturas/modificafinado/$dni'>Modificar</a><td>";
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