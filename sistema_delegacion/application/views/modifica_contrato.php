<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Datos del Contrato</h6>
        </div>
        <div class="input-group">
            <form action="<?= base_url() ?>index.php/Contrato/cambioscontrato" method="post">
                <?php echo validation_errors();?>
            <?php echo form_open(base_url() . 'index.php/Contrato/index');?>
             <input type="text" name="idcontrato" value="<?php echo $resultmod[0]->dni?>" hidden="">
                <label>Comprador:</label>
                <select name="idciudadano">
                    <?php
                        $compid= $resultmod[0]->compid;
                        $nomcomp= $resultmod[0]->nomcomp;
                        $segcomp= $resultmod[0]->segcomp;
                        $patcomp= $resultmod[0]->patcomp;
                        $matcomp= $resultmod[0]->matcomp;
                        echo "<option value = '$compid'>$nomcomp $segcomp $patcomp $matcomp</option>";
                        foreach ($resultcomprador as $obj) {
                            $idc = $obj->idciud;
                            $comprador = $obj->Ciudadano;
                            if ($compid != $idc)
                                {
                                   echo "<option value='$idc'> $comprador</option>";
                                } 
                        
                            
                        }
                    ?>
                </select>
                <label>Vendedor:</label>
                <select name="idvendedor">
                   <?php
                        $venid= $resultmod[0]->venid;
                        $nomven= $resultmod[0]->nomven;
                        $segven= $resultmod[0]->segven;
                        $patven= $resultmod[0]->patven;
                        $matven= $resultmod[0]->matven;
                         echo "<option value = '$venid'>$nomven $segven $patven $matven</option>";
                        foreach ($resultvendedor as $obj) {
                            $idv = $obj->idciud;
                            $vendedor = $obj->Ciudadano;
                            if ($venid != $idv)
                                {
                                   echo "<option value='$idv'> $vendedor</option>";
                                }
                            
                        }
                    ?>
                    
                </select>
                
                <label>Fecha del contrato:</label>
                <input type="date" name="fecha_contrato" placeholder="Fecha del Contrato DD/MM/AAAA" value="<?php echo $resultmod[0]->fechc?>">
                <label>Direccion Terreno:</label>
                <select name="idterreno">
                     <?php
                        $teid= $resultmod[0]->teid;
                        $calle= $resultmod[0]->calle;
                        $net= $resultmod[0]->net;
                        $nit= $resultmod[0]->nit;
                        $cp= $resultmod[0]->cp;
                        $col= $resultmod[0]->col;
                         echo "<option value = '$teid'>$calle $net $nit $cp $col</option>";
                        foreach ($resulterreno as $obj) {
                            $dnis = $obj->dni;
                            $dom = $obj->domicilio;
                            if ($dnis != $teid)
                                {
                                echo "<option value='$dni'>$dom</option>";
                            }
                            
                        }
                    ?>
                    
                    
                </select>

                <input type="number" name="cantidad_precio" min="0.00" max="9999999999.99" placeholder="Precio Ejemplo 99999.00" value="<?php echo $resultmod[0]->cant?>">
                <input type="text" name="cantidad_letra" placeholder="Cantidad en letra" value="<?php echo $resultmod[0]->letra?>">
                <label>Testigo Comprador:</label>
                <select name="testigocompra">
                     <?php
                        $testid= $resultmod[0]->testid;
                        $nomtest= $resultmod[0]->nomtest;
                        $segtest= $resultmod[0]->segtest;
                        $pattest= $resultmod[0]->pattest;
                        $mattest= $resultmod[0]->mattest;
                         echo "<option value = '$testid'>$nomtest $segtest $pattest $mattest</option>";
                        foreach ($resulttestigo as $obj) {
                            $test = $obj->idciud;
                            $nombre = $obj->Ciudadano;
                            if ($test != $testid)
                                {
                                    echo "<option value='$test'> $nombre</option>";
                                }
                           
                        }
                    ?>
                    
                </select>

                <label>Testigo Vendedor:</label>
                <select name="testigovende">
                    <?php
                        $dosid= $resultmod[0]->dosid;
                        $dosnom= $resultmod[0]->dosnom;
                        $dosseg= $resultmod[0]->dosseg;
                        $dospat= $resultmod[0]->dospat;
                        $dosmat= $resultmod[0]->dosmat;
                         echo "<option value = '$dosid'>$dosnom $dosseg $dospat $dosmat</option>";
                        foreach ($resulttesdos as $obj) {
                            $testt = $obj->idciud;
                            $elnombre = $obj->Ciudadano;
                            if ($test != $testid)
                                {
                                   echo "<option value='$testt'>$elnombre</option>";
                                }
                            
                        }
                    ?>
                   
                    
                </select>

                <label>Documento Anexo</label>
                <select name="idanexo">
                         <?php
                        $xnid= $resultmod[0]->xnid;
                        $docxn= $resultmod[0]->docxn;
                         echo "<option value = '$xnid'>$docxn</option>";
                        foreach ($resultanexo as $obj) {
                            $danex = $obj->idanexo;
                            $doc = $obj->documento_anexo;
                            if ($xnid != $danex)
                                {
                                   echo "<option value='$'>$doc</option>";
                                }
                            
                        }
                    ?>
                    
                </select>



                
                    
                </select>
                    <span class="buttons_area p_100">
                        <br>
                            <center>
                                <button class="btn btn-secondary submit_btn" type="submit">Modificar</button>
                            </center>
                    </span>
            </form>        
        </div>
    </aside>
</div>
                    </div>
                </div>
                <br>
                <br>
            </div>