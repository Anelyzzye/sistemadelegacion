<div class="col-lg-8 col-sm-12 container">
                          
                            <div>
                                <table class="table table-responsive table-hover table-bordered">
                                    <?php
                                    echo "<tr>";
                                    echo "<th> Nombre del Documento</th>";
                                    echo "<th> Acción</th>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    foreach ($resultadomodd as $object) {
                                        $dni=$object->elid;
                                        $docu=$object->doc;
                             
                                    echo "<td> $docu </td>";     
                                    echo "<td>
                                        <a href='http://localhost/sistema_delegacion/index.php/Anexo/modificanexo/$dni'>Modificar</a><td>";
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