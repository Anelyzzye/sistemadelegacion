<div class="col-lg-8 col-sm-12 container">
                          
                            <div>
                                <table class="table table-responsive table-hover table-bordered">
                                    <?php
                                    echo "<tr>";
                                    echo "<th>Fecha expedición permiso</th>";
                                    echo "<th>Solicitante reapertura</th>";
                                    echo "<th>Telefono</th>";
                                    echo "<th>Persona Finada</th>";
                                    echo "<th>Sepultada en la tumba</th>";
                                    echo "<th>Acción a realiar</th>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    foreach ($resultadomodifica as $object) {
                                        $dni=$object->dni;
                                        $idciu=$object->idciu;
                                        $nombre=$object->nombre;
                                        $segundo=$object->segundo;
                                        $pat=$object->pat;
                                        $mat=$object->mat;
                                        $tel=$object->tel;
                                        $expide=$object->expide;
                                        $fsepul=$object->fsepul;
                                        $idciuf=$object->idciuf;
                                        $nombrefr=$object->nombref;
                                        $segundof=$object->segundof;
                                        $patf=$object->patf;
                                        $matf=$object->matf;
                                        $obra=$object->obra;
                                        $idciucv=$object->idciucv;
                                        $nombrecv=$object->nombrecv;
                                        $segundocv=$object->segundocv;
                                        $patcv=$object->patcv;
                                        $matcv=$object->matcv;
                                    echo "<td> $expide </td>";    
                                    echo "<td> $nombre $segundo $pat $mat </td>";
                                    echo "<td> $tel</td>";
                                    echo "<td>$nombrefr $segundof $patf $matf</td>";
                                    echo "<td> $nombrecv $segundocv $patcv $matcv</td>"; 
                                    echo "<td>
                                        <a href='http://localhost/sistema_delegacion/index.php/Permiso/modificapermiso/$dni'>Modificar</a><td>";
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