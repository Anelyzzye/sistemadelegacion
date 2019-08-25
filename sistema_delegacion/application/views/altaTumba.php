<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Datos tumba</h6>
        </div>
        <div class="input-group">
            <form action="<?= base_url() ?>index.php/Tumba/registrotumba" method="post">
                <?php echo validation_errors();?>
                <?php echo form_open(base_url() . 'index.php/Tumba/index');?>
                <label>Nombre persona sepultada</label>
                <select name="idciudadano">
                    <?php
                        foreach ($resultsepultado as $obj) {
                            $ids = $obj->idciud;
                            $sepultado =$obj->Ciudadano;
                            echo "<option value='$ids'>$sepultado</option>";
                        
                        }
                    ?>
                    
                </select>
                <input type="text" name="tiempo_defunsion" placeholder="Tiempo Defunsión">
                <input type="number"  name="largo_metros" step="any" placeholder="Medida en metros(Alto)">
                <input type="number"  name="ancho_medida" step="any" placeholder="Medida en metros(Ancho)">
                <input type="number"  name="centimetros_separacion" step="any" placeholder="Separación Tumbas Centimetros">
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