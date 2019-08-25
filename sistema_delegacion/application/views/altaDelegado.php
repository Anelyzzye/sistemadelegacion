<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Delegados</h6>
        </div>
        <div class="input-group">
            <form action="<?= base_url() ?>index.php/Delegado/registrodelegado" method="post">
                <?php echo validation_errors();?>

                <?php echo form_open(base_url() . 'index.php/Delegado/index');?>
                <input type="text" name="nombre_delegado" placeholder="Nombre Delegado">
                <input type="text" name="segundonombre_delegado" placeholder="Segundo Nombre Delegado">
                <input type="text" name="apellidopat_delegado" placeholder="Apellido Paterno Delegado">
                <input type="text" name="apellidomat_delegado" placeholder="Apellido Materno Delegado">
                <LABEL>Nombre del delegado:</LABEL>
                <select name="idpuesto">
                <?php
                foreach($resultado as $object){
                    $idp=$object->idpuesto;
                    $np=$object->nombre_puesto;
                echo "<option value='$idp'>$np</option>";
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
        