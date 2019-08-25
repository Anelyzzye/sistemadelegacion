<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro datos solicitante </h6>
        </div>
            <div class="input-group">
                <form action="<?= base_url() ?>index.php/Solicitante/registrosolicitante" method="post">
                    <?php echo validation_errors();?>

                    <?php echo form_open(base_url() . 'index.php/Solicitante/index');?>
                    <input type="text" name="nombre_solicitante" placeholder="Nombre solicitante">
                    <input type="text" name="nombre_segundo" placeholder="Segundo nombre solicitante">
                    <input type="text" name="apellidopat_solicitante" placeholder="Apellido paterno solicitante">
                    <input type="text" name="apellidomat_solicitante" placeholder="Apellido materno solicitante">
                    <input type="text" name="calle_solicitante" placeholder="Calle solicitante">
                    <input type="number" step="1" name="numint_solicitate" placeholder="Número Interior">
                    <input type="nunber" step="1" name="numext_solicitante" placeholder="Número Exterior">
                    <input type="number" step="1" name="cp_solicitante" placeholder="Código Postal">
                    <input type="text" name="telefono_solicitante" placeholder="Telefono">
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
        