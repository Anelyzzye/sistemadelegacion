<div class="col-lg-9 col-sm-8">
    <aside class="f_widget f_subs_widget">
        <div class="f_title">
            <h6>Registro Datos del Contrato</h6>
        </div>
        <div class="input-group">
            <form action="<?= base_url() ?>index.php/Contrato/registrocontrato" method="post">
                <?php echo validation_errors();?>
            <?php echo form_open(base_url() . 'index.php/Contrato/index');?>
                <label>Comprador:</label>
                <select name="idciudadano">
                    <?php
                        foreach ($resultcomprador as $obj) {
                            $idc = $obj->idciud;
                            $comprador = $obj->Ciudadano;
                            echo "<option value='$idc'> $comprador</option>";
                        }
                    ?>
                </select>
                <label>Vendedor:</label>
                <select name="idvendedor">
                    <?php
                        foreach ($resultvendedor as $obj) {
                            $idv = $obj->idciud;
                            $vendedor = $obj->Ciudadano;
                            echo "<option value='$idv'> $vendedor</option>";
                        }
                    ?>
                    
                </select>
                
                <label>Fecha del contrato:</label>
                <input type="date" name="fecha_contrato" placeholder="Fecha del Contrato DD/MM/AAAA">
                <label>Direccion Terreno:</label>
                <select name="idterreno">
                    <?php
                        foreach ($resulterreno as $obj) {
                            $dni = $obj->dni;
                            $dom = $obj->domicilio;
                            echo "<option value='$dni'>$dom</option>";
                        }
                    ?>
                    
                    
                </select>

                <input type="number" name="cantidad_precio" min="0.00" max="9999999999.99" placeholder="Precio Ejemplo 99999.00">
                <input type="text" name="cantidad_letra" placeholder="Cantidad en letra">
                <label>Testigo Comprador:</label>
                <select name="testigocompra">
                    <?php
                        foreach ($resulttestigo as $obj) {
                            $test = $obj->idciud;
                            $nombre = $obj->Ciudadano;
                            echo "<option value='$test'> $nombre</option>";
                        }
                    ?>
                    
                </select>

                <label>Testigo Vendedor:</label>
                <select name="testigovende">
                    <?php
                        foreach ($resulttesdos as $obj) {
                            $testt = $obj->idciud;
                            $elnombre = $obj->Ciudadano;
                            echo "<option value='$testt'>$elnombre</option>";
                        }
                    ?>
                   
                    
                </select>

                <label>Documento Anexo</label>
                <select name="idanexo">
                        <?php
                        foreach ($resultanexo as $obj) {
                            $danex = $obj->idanexo;
                            $doc = $obj->documento_anexo;
                            echo "<option value='$danex'>$doc</option>";
                        }
                    ?>
                    
                </select>



                
                    
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