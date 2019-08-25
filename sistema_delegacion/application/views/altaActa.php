 <div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Acta de defunsión y orden inhumación</h6>
        </div>
            <div class="input-group">
                <form action="<?= base_url() ?>index.php/Reaperturas/registracta" method="POST">
                    <?php echo validation_errors();?>
                    <?php echo form_open(base_url() . 'index.php/Reaperturas/index');?>
                    <label><STRONG>Nombre del Finado:</label></STRONG>
                        <select name="idciudadano">
                    <?php
                        foreach ($resultfinado as $obj) {
                            $idc = $obj->idciud;
                            $delega =$obj->Ciudadano;
                            echo "<option value='$idc'>$delega</option>";
                        
                        }
                    ?>
                            
                        </select><BR>

                    <label><strong>Fecha acta defunsión:</label></strong>
                        <input type="date" name="fecha_registro">
                        <input type="text" name="curp" placeholder="Curp"><br>
                    <LABEL><strong>Fecha defunsión:</LABEL></strong>        
                        <input type="date" name="fecha_defun"><br>
                    <label><strong>Hora defunción:</label></strong>  
                        <input type="time" name="hora_defun" placeholder="Hora defunción"><br>
                    <label><strong>Causas de muerte:</label></strong>   
                        <textarea name="causas_muerte">
                        </textarea>
                        <input type="text" name="folio_certificado" placeholder="Folio Certificado Defunsión"><br>
                    <label><strong>Fecha inhumacion:</label></strong>     
                        <input type="date" name="fecha_inhumacion">
                        <input type="text" name="folio_inhumacion" placeholder="Folio Inhumación"><br>
                    <label><strong>Tipo de orden inhumación:</label></strong>
                        <select name="idtipo_orden">
                             <?php
                        foreach ($resultorden as $obj) {
                            $ito = $obj->idtipo_orden;
                            $nodn =$obj->nombre_orden;
                            echo "<option value='$ito'>$nodn</option>";
                        
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
        