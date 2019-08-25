<div class="col-lg-8 col-sm-12 container">
                          
                            <div>
                                <table class="table table-responsive table-hover table-bordered">
                                    <?php
                                    echo "<tr>";
                                    echo "<th>Nombre Persona Enterrada</th>";
                                    echo "<th>Tiempo</th>";
                                    echo "<th>Largo en Metros</th>";
                                    echo "<th>Ancho en Mtrs</th>";
                                    echo "<th>Separación en Cm</th>";
                                    echo "<th>Acción a realiar</th>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    foreach ($resultadomodific as $object) {
                                        $dni=$object->dni;
                                        $idc=$object->idc;
                                        $nombre=$object->nombre;
                                        $segundo=$object->segundo;
                                        $pater=$object->pater;
                                        $mater=$object->mater;
                                        $tiemp=$object->tiemp;
                                        $mts=$object->mts;
                                        $med=$object->med;
                                        $sep=$object->sep;
                                    echo "<td> $nombre $segundo $pater $mater </td>";    
                                    echo "<td> $tiemp </td>";
                                    echo "<td> $mts</td>";
                                    echo "<td>$med</td>";
                                    echo "<td> $sep </td>"; 
                                    echo "<td>
                                        <a href='http://localhost/sistema_delegacion/index.php/Tumba/modificatumba/$dni'>Modificar</a><td>";
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