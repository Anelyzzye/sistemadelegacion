<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Expediente</h6>
        </div>
    <div class="input-group">
        <form action="<?= base_url() ?>index.php/Permiso/cambiospermiso" method="post">
            <?php echo validation_errors();?>
            <?php echo form_open(base_url() . 'index.php/Permiso/index');?>

            <input type="text" name="idpermiso" value="<?php echo $resultadomodifica[0]->dni?>" hidden="">
            <label><strong>Solicitante Permiso:</label></strong>

                <select name="idciudadano">
                     <?php
                        $idciu= $resultadomodifica[0]->idciu;
                        $nombre= $resultadomodifica[0]->nombre;
                        $segundo= $resultadomodifica[0]->segundo;
                        $pat= $resultadomodifica[0]->pat;
                        $mat= $resultadomodifica[0]->mat;
                      
                        echo "<option value = '$idciu'>$nombre $segundo $pat $mat</option>";
                        foreach ($resultsolicitante as $obj) {
                            $ids = $obj->idciud;
                            $solicitante =$obj->Ciudadano;
                            if ($idciu != $ids)
                                {
                                    echo "<option value='$ids'> $solicitante</option>";
                                }
                            
                        }
                    ?>



                </select>
             <input type="text" name="telefono" placeholder="Telefono Solicitante" value="<?php echo $resultadomodifica[0]->tel?>"><br>
               
            <label><strong> Fecha permiso:</label></strong>                          
                <input type="date" name="fecha_expide" value="<?php echo $resultadomodifica[0]->expide?>"><br>
            <label><strong>Fecha sepultura:</label></strong>   
                <input type="date" name="fecha_sepultura" value="<?php echo $resultadomodifica[0]->fsepul?>"><br>
            <label><strong>Nombre del finado</label></strong>
                <select name="idacta">
                     <?php
                        $idciuf= $resultadomodifica[0]->idciuf;
                        $nombref= $resultadomodifica[0]->nombref;
                        $segundof= $resultadomodifica[0]->segundof;
                        $patf= $resultadomodifica[0]->patf;
                        $matf= $resultadomodifica[0]->matf;
                      
                        echo "<option value = '$idciuf'>$nombref $segundof $patf $matf</option>";
                        foreach ($resultacta as $obj) {
                            $idact = $obj->idciud;
                            $acta =$obj->Ciudadano;
                            if ($idciuf != $idact)
                                {
                                    echo "<option value='$idact'> $acta</option>";
                                }
                            
                        
                        }
                    ?>
                </select><br>
             <label><strong>Permiso para realizar obra sobre lapida:
                </label><strong>
                    <span class="input-group-addon">
                            <input type="radio" value="1" name="obra_autorizada">Si
                            <input type="radio" value="0" name="obra_autorizada">No
                    </span><br>

            <label><strong>Nombre persona sepultada:</label></strong>
                <select name="idtumba">
                     <?php
                        $idciucv= $resultadomodifica[0]->idciucv;
                        $nombrecv= $resultadomodifica[0]->nombrecv;
                        $segundocv= $resultadomodifica[0]->segundocv;
                        $patcv= $resultadomodifica[0]->patcv;
                        $matcv= $resultadomodifica[0]->matcv;
                      
                        echo "<option value = '$idciucv'>$nombrecv $segundocv $patcv $matcv</option>";
                        foreach ($resultsepultada as $obj) {
                            $idsep = $obj->idciud;
                            $sept =$obj->Ciudadano;
                            if ($idciucv != $idsep)
                                {
                                    echo "<option value='$idsep'> $sept</option>";
                                }
                            
                        
                        }
                    ?>
                </select>

                
                                        
                        <span class="buttons_area p_100">
                            <br>
                                <center>
                                    <button class="btn btn-secondary submit_btn" type="submit">Guardar</button>
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