<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Tipo de Orden</h6>
        </div>
            <div class="input-group">
                <form action="<?= base_url() ?>index.php/Tipo/registrotumba" method="POST">
                    <?php echo validation_errors();?>

                    <?php echo form_open(base_url() . 'index.php/Tipo/index');?>
                    <input type="text" name="tipo_orden" placeholder="Tipo de Orden">
                    <p>Descripción:</p>
                        <textarea name="descripcion">
                        </textarea>
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
                    </div>c
                </div>
                <br>
                <br>
            </div>