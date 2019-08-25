<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Datos del Terreno</h6>
        </div>
        <div class="input-group">
            <form action="<?= base_url() ?>index.php/Terreno/cambiosterreno" method="post">
                <?php echo validation_errors();?>
            <?php echo form_open(base_url() . 'index.php/Terreno/index');?>
                
                <input type="text" name="idtumba" value="<?php echo $resultadomod[0]->dni?>" hidden="">
                <input type="number" name="superficie" step="any" placeholder="superficie" value="<?php echo $resultadomod[0]->superficie?>">
                <input type="text" name="calle_terreno" placeholder="Direccion principal" value="<?php echo $resultadomod[0]->calle?>">
                <input type="number" name="numext_terreno" placeholder="Número Exterior" value="<?php echo $resultadomod[0]->nterr?>">
                <input type="number" name="numint_terreno" placeholder="Número Interior" value="<?php echo $resultadomod[0]->niterr?>">
                <input type="number" name="cp_terreno" placeholder="Código Postal" value="<?php echo $resultadomod[0]->cp?>">
                <input type="text" name="colonia_terreno" placeholder="Colonia Terreno" value="<?php echo $resultadomod[0]->colonia?>">
                <input type="number" name="norte_medida" step="any" placeholder="Medida al Norte" value="<?php echo $resultadomod[0]->nortem?>">
                <input type="text" name="norte_colinda" placeholder="Colinda al norte" value="<?php echo $resultadomod[0]->nortec?>">
                <input type="number" name="sur_medida" step="any" placeholder="Medida al sur" value="<?php echo $resultadomod[0]->surm?>">
                <input type="text" name="sur_colinda" placeholder="Colinda al sur" value="<?php echo $resultadomod[0]->surc?>">
                <input type="number" name="oriente_medida" step="any"  value="<?php echo $resultadomod[0]->orientem?>" placeholder="Medida al oriente">
                <input type="text" name="oriente_colinda" placeholder="Colinda al oriente" value="<?php echo $resultadomod[0]->orientec?>">
                <input type="number" name="poniente_medida" step="any" value="<?php echo $resultadomod[0]->ponientem?>" placeholder="Medida al poniente">
                <input type="text" name="poniente_colinda" value="<?php echo $resultadomod[0]->ponientec?>" placeholder="Colinda al poniente">
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