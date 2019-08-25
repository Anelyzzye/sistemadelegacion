<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Documentos Anexos</h6>
        </div>
        <div class="input-group">
            <form action="<?= base_url() ?>index.php/Anexo/registranexo" method="post">
                <?php echo validation_errors();?>
            <?php echo form_open(base_url() . 'index.php/Anexo/index');?>
                
                <input type="text" name="documento_anexo" placeholder="Nombre del documento">
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