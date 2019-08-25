
<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Comprador</h6>
        </div>
        <div class="input-group">
            <form action="<?= base_url() ?>index.php/Comprador/registrocomprador" method="post">
                <?php echo validation_errors();?>

                <?php echo form_open(base_url() . 'index.php/Comprador/index');?>
                <input type="text" name="nombre_comprador" placeholder="Nombre Comprador">
                <input type="text" name="segundo_nombrecomprador" placeholder="Segundo Nombre Comprador">
                <input type="text" name="apellidopat_comprador" placeholder="Apellido Paterno Comprador">
                <input type="text" name="apellidomat_comprador" placeholder="Apellido Materno Comprador">
                <input type="text" name="calle_comprador" placeholder="Domicio Comprador">
                <input type="number" name="numint_comprador" placeholder="Número Externo">
                <input type="number" name="numext_comprador" placeholder="Número Interno">
                <input type="number" name="cp_comprador" min="5" placeholder="Código Postal">
                <input type="text" name="colonia_comprador" placeholder="Colonia">
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
        
              
        <!--================End Portfolio Area =================-->