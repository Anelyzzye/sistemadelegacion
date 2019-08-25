<div class="col-lg-8 col-sm-12 container">
                            <aside class="r_widget search_widget">
                                
                            </aside>
                            <div>
                                <table class="table table-responsive table-hover table-bordered">
                                    <?php
                                    echo "<tr>";
                                    echo "<th>Nombre Ciudadano</th>";
                                    echo "<th>Dirección</th>";
                                    echo "<th>Género</th>";
                                    echo "<th>Tipo Ciudadano</th>";
                                    echo "<th>Acción a Realizar</th>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    foreach ($result as $object) {
                                        $dni=$object->id;
                                        $nbr=$object->nombre;
                                        $sgn=$object->segundo;
                                        $pate=$object->pat;
                                        $mate=$object->mat;
                                        $ca=$object->calle;
                                        $ex=$object->ext;
                                        $nt=$object->inte;
                                        $cod=$object->cp;
                                        $colon=$object->col;
                                        $gen=$object->genero;
                                        $tip=$object->tipo;
                                        
                
                                    echo "<td> $nbr $sgn $pate $mate </td>";  
                                    echo "<td> $ca $ex $nt $cod $colon </td>";  
                                    echo "<td> $gen </td>";
                                    echo "<td> $tip</td>";
                                    
                                    echo "<td>
                                        <a href='http://localhost/sistema_delegacion/index.php/Ciudadano/modificaciudadano/$dni'>Modificar</a><td>";
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