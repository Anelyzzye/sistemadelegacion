<div class="col-lg-8 col-sm-12 container">
                          
                            <div>
                                <table class="table table-responsive table-hover table-bordered">
                                    <?php
                                    echo "<tr>";
                                    echo "<th>Nombre Comprador</th>";
                                    echo "<th>Nombre Vendedor</th>";
                                    echo "<th>Fecha Contrato</th>";
                                    echo "<th>Domicilio</th>";
                                    echo "<th>Cantidad</th>";
                                    echo "<th>Acción a realiar</th>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    foreach ($resultmod as $object) {
                                        $dni=$object->dni;
                                        $compid=$object->compid;
                                        $nomcomp=$object->nomcomp;
                                        $segcomp=$object->segcomp;
                                        $patcomp=$object->patcomp;
                                        $matcomp=$object->matcomp;
                                        $venid=$object->venid;
                                        $nomven=$object->nomven;
                                        $segven=$object->segven;
                                        $patven=$object->patven;
                                        $matven=$object->matven;
                                        $fechc=$object->fechc;
                                        $teid=$object->teid;
                                        $calle=$object->calle;
                                        $net=$object->net;
                                        $nit=$object->nit;
                                        $cp=$object->cp;
                                        $col=$object->col;
                                        $cant=$object->cant;
                                        $letra=$object->letra;
                                        $testid=$object->testid;
                                        $nomtest=$object->nomtest;
                                        $segtest=$object->segtest;
                                        $pattest=$object->pattest;
                                        $mattest=$object->mattest;
                                        $dosid=$object->dosid;
                                        $dosnom=$object->dosnom;
                                        $dosseg=$object->dosseg;
                                        $dospat=$object->dospat;
                                        $dosmat=$object->dosmat;
                                        $xnid=$object->xnid;
                                        $docxn=$object->docxn;

                                      
                                    echo "<td> $nomcomp $segcomp $patcomp $matcomp </td>";    
                                    echo "<td> $nomven $segven $patven $matven </td>";
                                    echo "<td> $fechc</td>";
                                    echo "<td>$calle $net $nit $cp $col</td>";
                                    echo "<td>  $ $cant</td>"; 
                                    echo "<td>
                                        <a href='http://localhost/sistema_delegacion/index.php/Contrato/modificacontrato/$dni'>Modificar</a><td>";
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