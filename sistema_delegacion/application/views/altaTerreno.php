<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Datos del Terreno</h6>
        </div>
        <div class="input-group">
            <form action="<?= base_url() ?>index.php/Terreno/registraterreno" method="post">
                <?php echo validation_errors();?>
            <?php echo form_open(base_url() . 'index.php/Terreno/index');?>
                
                <input type="number" name="superficie" step="any" placeholder="superficie">
                <input type="text" name="calle_terreno" placeholder="Direccion principal">
                <input type="text" name="numext_terreno" placeholder="Número Exterior">
                <input type="text" name="numint_terreno" placeholder="Número Interior">
                <input type="text" name="cp_terreno" placeholder="Código Postal">
                <input type="text" name="colonia_terreno" placeholder="Colonia Terreno">
                <input type="number" name="norte_medida" step="any" placeholder="Medida al Norte">
                <input type="text" name="norte_colinda" placeholder="Colinda al norte">
                <input type="number" name="sur_medida" step="any" placeholder="Medida al sur">
                <input type="text" name="sur_colinda" placeholder="Colinda al sur">
                <input type="number" name="oriente_medida" step="any" placeholder="Medida al oriente">
                <input type="text" name="oriente_colinda" placeholder="Colinda al oriente">
                <input type="number" name="poniente_medida" step="any"placeholder="Medida al poniente">
                <input type="text" name="poniente_colinda" placeholder="Colinda al poniente">
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