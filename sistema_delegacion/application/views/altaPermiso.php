<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Expediente</h6>
        </div>
    <div class="input-group">
        <form action="<?= base_url() ?>index.php/Permiso/registrapermiso" method="post">
            <?php echo validation_errors();?>
            <?php echo form_open(base_url() . 'index.php/Permiso/index');?>

            <label><strong>Solicitante Permiso:</label></strong>

                <select name="idciudadano">
                    <?php
                        foreach ($resultsolicitante as $obj) {
                            $ids = $obj->idciud;
                            $solicitante =$obj->Ciudadano;
                            echo "<option value='$ids'> $solicitante</option>";
                        }
                    ?>



                </select>
             <input type="text" name="telefono" placeholder="Telefono Solicitante"><br>
               
            <label><strong> Fecha permiso:</label></strong>                          
                <input type="date" name="fecha_expide"><br>
            <label><strong>Fecha sepultura:</label></strong>   
                <input type="date" name="fecha_sepultura"><br>
            <label><strong>Nombre del finado</label></strong>
                <select name="idacta">
                     <?php
                        foreach ($resultacta as $obj) {
                            $idact = $obj->idciud;
                            $acta =$obj->Ciudadano;
                            echo "<option value='$idact'> $acta</option>";
                        
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
                        foreach ($resultsepultada as $obj) {
                            $idsep = $obj->idciud;
                            $sept =$obj->Ciudadano;
                            echo "<option value='$idsep'> $sept</option>";
                        
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