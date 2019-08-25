<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Delegados</h6>
        </div>
        <div class="input-group">
            <form action="<?= base_url() ?>index.php/Usuario/registrauser" method="post">
                <?php echo validation_errors();?>
                <?php echo form_open(base_url() . 'index.php/Usuario/index');?>                
                <label>Delegado:</label>
                <select name="idciudadano">
                    <?php
                        foreach ($resultdelega as $obj) {
                            $idc = $obj->idciud;
                            $delega =$obj->Ciudadano;
                            echo "<option value='$idc'>$delega</option>";
                        
                        }
                    ?>
                   
                </select>
                <input type="text" name="username" placeholder="Nombre usuario">
                <input type="password" name="pass_usuario" placeholder="Contraseña">
              <label>Función Delegado</label>
              <select name="idfuncion">
                 <?php
                        foreach ($resultfuncion as $obj) {
                            $idfn = $obj->idfuncion;
                            $nomfun =$obj->nombre_funcion;
                            echo "<option value='$idfn'>$nomfun</option>";
                        
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
        