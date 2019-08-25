<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro datos ciudadano </h6>
        </div>
            <div class="input-group">
                <form action="<?= base_url() ?>index.php/Ciudadano/registraciudadano" method="post">
                    <?php echo validation_errors();?>

                    <?php echo form_open(base_url() . 'index.php/Ciudadano/index');?>
                    
                    <input type="text" name="nombre_ciudadano" placeholder="Nombre ciudadano">
                    <input type="text" name="nombre_segundociudadano" placeholder="Segundo nombre ciudadano">
                    <input type="text" name="apellidopat_ciudadano" placeholder="Apellido paterno ciudadano">
                    <input type="text" name="apellidomat_ciudadano" placeholder="Apellido materno ciudadano">
                    <input type="text" name="calle_ciudadano" placeholder="Calle ciudadano">
                    <input type="text"  name="numext_ciudadano" placeholder="Número Exterior">
                    <input type="text"  name="numint_ciudadano" placeholder="Número Interior">
                    <input type="text"  name="codp" placeholder="Código Postal">
                    <input type="text" name="colonia" placeholder="Colonia">
                    <label> Género</label>
                    <select name="idgenero"> 
                        <?php
                            foreach($resultgenero as $obj)
                            {
                                $idg =$obj->idgenero;
                                $ng =$obj->nombre_genero;
                                echo "<option value='$idg'>$ng</option>";
                            }
                        ?>  
                    </select>

                    <label>Tipo Ciudadano</label>
                    <select name="idtipo_ciudadano">
                        <?php
                            foreach ($resultciuda as $obj) {
                                $idc=$obj->idtipo_ciudadano;
                                $nbt=$obj->nombretipo;
                                echo "<option value='$idc'>$nbt</option>";
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
        