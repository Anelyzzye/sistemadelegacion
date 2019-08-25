<div class="col-lg-8 col-sm-12 container">
                            <aside class="r_widget search_widget">
                                
                            </aside>
                            <div>
                                <table class="table table-responsive table-hover table-bordered">
                                    <?php
                                    echo "<tr>";
                                    echo "<th>Nombre Usuario</th>";
                                    echo "<th>Nombre de usuario</th>";
                                    echo "<th>Función</th>";
                                   
                                    echo "<th>Acción a Realizar</th>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    foreach ($resultuser as $object) {
                                        $dni=$object->iduser;
                                        $dniciud=$object->dnic;
                                        $nbre=$object->nomcid;
                                        $seg=$object->segundo;
                                        $patc=$object->patciud;
                                        $matc=$object->matciud;
                                        $username=$object->usr;
                                        $idfuncion=$object->idfunc;
                                        $namefunc=$object->namefun;
                                    echo "<td> $nbre $seg $patc $matc </td>";  
                                    echo "<td> $username </td>";  
                                    echo "<td> $namefunc </td>";
                                   
                                    
                                    echo "<td>
                                        <a href='http://localhost/sistema_delegacion/index.php/Usuario/modificauser/$dni'>Modificar</a><td>";
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