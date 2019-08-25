 <div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Acta de defunsión y orden inhumación</h6>
        </div>
            <div class="input-group">
                <form action="<?= base_url() ?>index.php/Reaperturas/cambiosacta" method="POST">
                    <?php echo validation_errors();?>
                    <?php echo form_open(base_url() . 'index.php/Reaperturas/index');?>
                    <input type="text" name="idacta" value="<?php echo $resultfinados[0]->dni?>" hidden="">
                    <label><STRONG>Nombre del Finado:</label></STRONG>
                        <select name="idciudadano">
                    <?php
                        $cnid= $resultfinados[0]->cnid;
                        $nom= $resultfinados[0]->nom;
                        $sgciu= $resultfinados[0]->sgciu;
                        $pat= $resultfinados[0]->pat;
                        $mat= $resultfinados[0]->mat;
                        echo "<option value = '$cnid'>$nom $sgciu $pat $mat</option>";
                        foreach ($resultfinado as $obj) {
                            $idc = $obj->idciud;
                            $delega =$obj->Ciudadano;
                            if ($cnid != $idc)
                                {
                                    echo "<option value='$idc'>$delega</option>";
                                } 
                        
                        }
                    ?>
                            
                        </select><BR>

                    <label><strong>Fecha acta defunsión:</label></strong>
                        <input type="date" name="fecha_registro" value="<?php echo $resultfinados[0]->fecha?>">
                        <input type="text" name="curp" placeholder="Curp" value="<?php echo $resultfinados[0]->curp?>"><br>
                    <LABEL><strong>Fecha defunsión:</LABEL></strong>        
                        <input type="date" name="fecha_defun" value="<?php echo $resultfinados[0]->defun?>"><br>
                    <label><strong>Hora defunción:</label></strong>  
                        <input type="time" name="hora_defun" placeholder="Hora defunción" value="<?php echo $resultfinados[0]->hora?>"><br>
                    <label><strong>Causas de muerte:</label></strong>   
                        <textarea name="causas_muerte" value="<?php echo $resultfinados[0]->causas?>">
                        </textarea>
                        <input type="text" name="folio_certificado" placeholder="Folio Certificado Defunsión" value="<?php echo $resultfinados[0]->certi?>"><br>
                    <label><strong>Fecha inhumacion:</label></strong>     
                        <input type="date" name="fecha_inhumacion" value="<?php echo $resultfinados[0]->inhu?>">
                        <input type="text" name="folio_inhumacion" placeholder="Folio Inhumación" value="<?php echo $resultfinados[0]->finhu?>"><br>
                    <label><strong>Tipo de orden inhumación:</label></strong>
                        <select name="idtipo_orden">
                            <?php
                                $tto = $resultfinados[0]->tporden;
                                $nrdn = $resultfinados[0]->orden;
                                echo "<option value = '$tto'>$nrdn</option>";
                        foreach ($resultorden as $obj) {
                            $ito = $obj->idtipo_orden;
                            $nodn =$obj->nombre_orden;
                            if ($tto != $ito)
                                {
                                    echo "<option value='$ito'>$nodn</option>";
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
            </aside>
                        </div>
                    </div>
                </div>
                <br>
                <br>
            </div>
        