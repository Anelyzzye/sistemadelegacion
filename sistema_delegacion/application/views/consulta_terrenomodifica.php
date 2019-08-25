<div class="col-lg-8 col-sm-12 container">
                          
                            <div>
                                <table class="table table-responsive table-hover table-bordered">
                                    <?php
                                    echo "<tr>";
                                    echo "<th>Dirección Terreno</th>";
                                    echo "<th>Al norte medida y colindancia</th>";
                                    echo "<th>Al sur medida y colindancia</th>";
                                    echo "<th>Al oriente medida y colindancia</th>";
                                    echo "<th>Al poniente medida y colinda</th>";
                                    echo "<th>Acción a realiar</th>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    foreach ($resultadomod as $object) {
                                        $dni=$object->idnt;
                                        $superficie=$object->superficie;
                                        $calle=$object->calle;
                                        $nterr=$object->nterr;
                                        $niterr=$object->niterr;
                                        $cp=$object->cp;
                                        $colonia=$object->colonia;
                                        $nortem=$object->nortem;
                                        $nortec=$object->nortec;
                                        $surm=$object->surm;
                                        $surc=$object->surc;
                                        $orientem=$object->orientem;
                                        $orientec=$object->orientec;
                                        $ponientem=$object->ponientem;
                                        $ponientec=$object->ponientec;
                                      
                                    echo "<td> $calle $nterr $niterr $cp $colonia </td>";    
                                    echo "<td> $nortem  - $nortec</td>";
                                    echo "<td> $surm  - $surc</td>";
                                    echo "<td>$orientem  - $orientec</td>";
                                    echo "<td> $ponientem  - $ponientec</td>"; 
                                    echo "<td>
                                        <a href='http://localhost/sistema_delegacion/index.php/Terreno/modificaterreno/$dni'>Modificar</a><td>";
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