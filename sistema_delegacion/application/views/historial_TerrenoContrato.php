<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>
                <center>
                    CREAR HISTORIAL COMPRADOR CON TERRENO
                    <br>
                </center>
                    Para realizar esta acción es importante la comprobación de la existencia del registro del terreno, para ello puedes comprobarlo en la sección "Existencia Terreno", caso contrario en el menú lateral, en el apartado de datos opcionales puedes realizar el registro con los datos que se te solicitan.
            </h6>
                </div>
                    <div class="input-group">
                        <form action="<?= base_url() ?>index.php/Historial/registrohistorial" method="post">
                            <?php echo validation_errors();?>

                            <?php echo form_open(base_url() . 'index.php/Historial/index');?>
                            <label>Nombre del Comprador:</label>
                                <select name="idcontrato">
                        
                                    <?php
                                    foreach ($resultadocontrato as $obj){
                                        $idc = $obj['c.idcontrato'];
                                        $nc = $obj['c.nombre_comprador'];
                                        $snc = $obj['c.segundo_nombrecomprador'];
                                        $apc = $obj['c.apellidopat_comprador'];
                                        $apmc = $obj['c.apellidomat_comprador'];
                                        echo "<option value='$idc'> $nc  $snc $apc  $apmc </option>";
                                    }
                                    ?>
                                    </select>
                                    <label>Dirección del terreno:</label>
                                    
                                    <select name="idterreno">
                                        <?php
                                    foreach ($resultadoterreno as $obj){
                                        $it = $obj->idterreno;
                                        $sp =$obj->superficie;
                                        $ct = $obj->calle_terreno;
                                        $nit = $obj->numint_terreno;
                                        $net = $obj->numext_terreno;
                                        $cpt = $obj->cp_terreno;
                                        if($net <= 0){
                                            $net = "-";
                                            
                                        }
                                        echo "<option value='$it'> $ct $nit $net  $cpt </option>";
                                    }
                                    ?>
                                      
                                    </select name="idanexo">

                                    <p>Nombre del Anexo:</p>
                                    <select>
                                        <?php
                                    foreach ($resultadoanexo as $obj){
                                        $ia = $obj->idanexo;
                                        $da = $obj->documento_anexo;
                                        echo "<option value='$ia'> $da </option>";
                                    }
                                    ?>
                                        
                                    </select>

                                    <span class="buttons_area p_100">
                                        <br>
                                         <center><button class="btn btn-secondary submit_btn" type="submit">Guardar</button></center>
                                    </span>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
                <br>
                <br>
            </div>