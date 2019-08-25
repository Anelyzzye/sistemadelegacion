<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Datos tumba</h6>
        </div>
        <div class="input-group">
            <form action="<?= base_url() ?>index.php/Tumba/cambiostumba" method="post">
                <?php echo validation_errors();?>
                <?php echo form_open(base_url() . 'index.php/Tumba/index');?>

                <input type="text" name="idtumba" value="<?php echo $resultadomodific[0]->dni?>" hidden="">
                <label>Nombre persona sepultada</label>
                <select name="idciudadano">
                   <?php
                        $idc= $resultadomodific[0]->idc;
                        $nombre= $resultadomodific[0]->nombre;
                        $segundo= $resultadomodific[0]->segundo;
                        $pater= $resultadomodific[0]->pater;
                        $mater= $resultadomodific[0]->mater;
                      
                        echo "<option value = '$idc'>$nombre $segundo $pater $mater</option>";
                        foreach ($resultsepultado as $obj) {
                            $ids = $obj->idciud;
                            $sepultado =$obj->Ciudadano;
                            if ($idc != $ids)
                                {
                                    echo "<option value='$ids'>$sepultado</option>";
                                } 
                        }
                    ?>
                    
                </select>
                <input type="text" name="tiempo_defunsion" placeholder="Tiempo Defunsión" value="<?php echo $resultadomodific[0]->tiemp?>">
                <input type="number"  name="largo_metros" step="any" placeholder="Medida en metros(Alto)" value="<?php echo $resultadomodific[0]->mts?>">
                <input type="number"  name="ancho_medida" step="any" placeholder="Medida en metros(Ancho)" value="<?php echo $resultadomodific[0]->med?>">
                <input type="number"  name="centimetros_separacion" step="any" placeholder="Separación Tumbas Centimetros" value="<?php echo $resultadomodific[0]->sep?>">
                    <span class="buttons_area p_100">
                        <br>
                            <center>
                                <button class="btn btn-secondary submit_btn" type="submit">Modificar</button>
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