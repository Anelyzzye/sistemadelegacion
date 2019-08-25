<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Delegados</h6>
        </div>
        <div class="input-group">
            <form action="<?= base_url() ?>index.php/Usuario/cambiousuario" method="post">
                <?php echo validation_errors();?>
                <?php echo form_open(base_url() . 'index.php/Usuario/index');?>  
                <input type="text" name="idusuario" value="<?php echo $resultuser[0]->iduser?>" hidden="">              
                <label>Delegado:</label>
                <select name="idciudadano">
                    <?php
                        $idcc= $resultuser[0]->dnic;
                        $elnbr= $resultuser[0]->nomcid;
                        $elseg= $resultuser[0]->segundo;
                        $elapep= $resultuser[0]->patciud;
                        $elmate= $resultuser[0]->matciud;

                        echo "<option value = '$idcc'>$elnbr $elseg $elapep $elmate</option>";
                        foreach ($resultdelega as $obj) {
                            $idc = $obj->idciud;
                            $delega =$obj->Ciudadano;
                            if ($idcc != $idc)
                                {
                                    echo "<option value='$idc'>$delega</option>";
                                }
                        }
                    ?>
                   
                </select>
                <input type="text" name="username" placeholder="Nombre usuario" value="<?php echo $resultuser[0]->usr?>">
                <input type="password" name="pass_usuario" placeholder="Contraseña" value="<?php echo $resultuser[0]->pass?>">
              <label>Función Delegado</label>
              <select name="idfuncion">
               <?php
                        $idff= $resultuser[0]->idfunc;
                        $nameff= $resultuser[0]->namefun;

                        echo "<option value = '$idff'>$nameff</option>";
                        foreach ($resultfuncion as $obj) {
                            $idfn = $obj->idfuncion;
                            $nomfun =$obj->nombre_funcion;
                            if ($idff != $idfn)
                                {
                                    echo "<option value='$idfn'>$nomfun</option>";
                                }
                            
                        
                        }
                    ?>
               
                  
              </select>
                
                
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
        