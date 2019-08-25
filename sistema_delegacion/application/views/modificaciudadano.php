<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro datos ciudadano </h6>
        </div>
            <div class="input-group">
                <form action="<?= base_url() ?>index.php/Ciudadano/cambiosciudadano" method="post">
                    <?php echo validation_errors();?>

                    <?php echo form_open(base_url() . 'index.php/Ciudadano/index');?>
                    <input type="text" name="idciudadano" value="<?php echo $result[0]->id?>" hidden="">
                    <input type="text" name="nombre_ciudadano" placeholder="Nombre ciudadano" value="<?php echo $result[0]->nombre?>">
                    <input type="text" name="nombre_segundociudadano" placeholder="Segundo nombre ciudadano" value="<?php echo $result[0]->segundo?>">
                    <input type="text" name="apellidopat_ciudadano" placeholder="Apellido paterno ciudadano" value="<?php echo $result[0]->pat?>">
                    <input type="text" name="apellidomat_ciudadano" placeholder="Apellido materno ciudadano" value="<?php echo $result[0]->mat?>">
                    <input type="text" name="calle_ciudadano" placeholder="Calle ciudadano" value="<?php echo $result[0]->calle?>">
                    <input type="text"  name="numext_ciudadano" placeholder="Número Exterior" value="<?php echo $result[0]->ext?>">
                    <input type="text"  name="numint_ciudadano" placeholder="Número Interior" value="<?php echo $result[0]->inte?>">
                    <input type="text"  name="codp" placeholder="Código Postal" value="<?php echo $result[0]->cp?>">
                    <input type="text" name="colonia" placeholder="Colonia" value="<?php echo $result[0]->col?>">
                    <label> Género</label>
                    <select name="idgenero">

                       <?php
                        $igen= $result[0]->idg;
                        $tipog= $result[0]->genero;
                        echo "<option value = '$igen'>$tipog</option>";
                            foreach($resultgenero as $obj)
                            {
                                $idg =$obj->idgenero;
                                $ng =$obj->nombre_genero;
                                if ($igen != $idg)
                                {
                                    echo "<option value='$idg'>$ng</option>";
                                }
                                
                            }
                        ?>  
                    </select>

                    <label>Tipo Ciudadano</label>
                    <select name="idtipo_ciudadano">
                        <?php
                        $itpo= $result[0]->idt;
                        $ntipo= $result[0]->tipo;
                         echo "<option value = '$itpo'>$ntipo</option>";
                            foreach ($resultciuda as $obj) {
                                $idc=$obj->idtipo_ciudadano;
                                $nbt=$obj->nombretipo;
                                if ($itpo != $idc)
                                {
                                    echo "<option value='$idc'>$nbt</option>";
                                }
                                
                            }
                        ?>
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
        