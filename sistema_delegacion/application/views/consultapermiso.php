<div class="col-lg-8 col-sm-12 container">
    <big><big>
     <a href="http://localhost/sistema_delegacion/index.php/ExportaHistorial_permiso/exportaPDF/<?= $criterio  ?>"><button class="btn btn-default"> Descargar Reporte PDF</button></a>
       </big></big>
                          
                            <div>
                                <table class="table table-responsive table-hover table-bordered">
                                    <?php
                                    echo "<tr>";
                                    echo "<th>Fecha expedición permiso</th>";
                                    echo "<th>Solicitante reapertura</th>";
                                    echo "<th>Telefono</th>";
                                    echo "<th>Persona Finada</th>";
                                    echo "<th>Sepultada en la tumba</th>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    foreach ($resultadopermiso as $object) {
                                        $solicita=$object->solicitante;
                                        $phone=$object->tel;
                                        $finado=$object->finado;
                                        $expide=$object->expide;
                                        $caver=$object->cadaver;
                                    echo "<td> $expide </td>";    
                                    echo "<td> $solicita </td>";
                                    echo "<td> $phone</td>";
                                    echo "<td>$finado</td>";
                                    echo "<td> $caver</td>"; 
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