<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Vendedor</h6>
        </div>
        <div class="input-group">
            <form action="<?= base_url() ?>index.php/Vendedor/registrovendedor" method="post">
                 <?php echo validation_errors();?>

                <?php echo form_open(base_url() . 'index.php/Vendedor/index');?>
                <input type="text" name="nombre_vendedor" placeholder="Nombre Vendedor">
                <input type="text" name="segundo_nombrevendedor" placeholder="Segundo Nombre Vendedor">
                <input type="text" name="apellidopat_vendedor" placeholder="Apellido Paterno Vendedor">
                <input type="text" name="apellidomat_vendedor" placeholder="Apellido Materno Vendedor">
                <input type="text" name="calle_vendedor" placeholder="Calle">
                <input type="text" name="numint_vendedor" placeholder="Número interior">
                <input type="text" name="numext_vendedor" placeholder="Número exterior">
                <input type="text" name="cp_vendedor" placeholder="Código Postal">
                <input type="text" name="colonia_vendedor" placeholder="Colonia">
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
        
              