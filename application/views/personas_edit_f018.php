<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= NOMBRE_SISTEMA ?></title>

        <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" 
              rel="stylesheet">

        <link href="<?= base_url() ?>assets/bootstrap/css/dataTables.bootstrap.min.css" 
              rel="stylesheet">

        <style type="text/css">
            .shadow-gris{
                box-shadow: 1px 1px 6px #333;
            }
        </style>
    </head>
    <body>
        <?php $this->load->view('partes/menu'); ?>
        <div class="container-fluid">    
            <form name="sistema_editar" method="post" 
                  action="<?= site_url() ?>/procesos/guardarFormulario" >
                <input type="hidden" name="existe" value="<?= $EXISTE ?>"/>
                <input type="hidden" name="id_persona" value="<?= $ID_PERSONA ?>"/>
                <div class="panel panel-default shadow-gris">
                    <div class="panel-heading"> 
                        <span class="glyphicon glyphicon-check"></span> <?= $TITULO_PAGINA ?>  </div>
                    <div class="panel-body" >

                        <h3> 
                            <span class="glyphicon glyphicon-edit"></span><b>Datos de:</b><?= $ACTUAL->NOMBRES . ' ' . $ACTUAL->APELLIDOS ?>
                        </h3>
                        <!-- +++++++++++++CODIGO INTERNO+++++++++++++++ -->

                        <div class="panel panel-primary">
                            <div class="panel-heading">Datos de identificación de cargo</div>
                            <div class="panel-body">

                                <table class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th style="width: 280px">Item Verificado</th>
                                            <th>Descripción</th>
                                            <th style="width: 120px">Cumple</th>
                                            <th>Observación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!------------------------->
                                        <tr>
                                            <td>Denominación del cargo:
                                                <input type="hidden" name="fila_1_1" 
                                                       value="Denominación del cargo:"/>
                                            </td>
                                            <td> <input type="text" name="fila_1_2" 
                                                        class="form-control  input-sm" 
                                                        value="<?= $F18[0][1] ?>"
                                                        required="required"/>  </td>
                                            <td>

                                                <input type="radio" name="fila_1_3" <?= $F18[0][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                                <input type="radio" name="fila_1_3" <?= $F18[0][2] == "NO" ? "checked" : "" ?> value="NO"> NO
                                            </td>
                                            <td><input type="text" name="fila_1_4" 
                                                       class="form-control  input-sm" 
                                                       value="<?= $F18[0][3] ?>"
                                                       required="required"/>  </td>
                                        </tr>
                                        <!------------------------->
                                        <tr>
                                            <td>Nivel:
                                                <input type="hidden" name="fila_2_1" 
                                                       value="Nivel:"/>
                                            </td>
                                            <td> <input type="text" name="fila_2_2" 
                                                        class="form-control  input-sm" 
                                                        value="<?= $F18[1][1] ?>"
                                                        required="required"/>  </td>
                                            <td>
                                                <input type="radio" name="fila_2_3" <?= $F18[1][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                                <input type="radio" name="fila_2_3" <?= $F18[1][2] == "NO" ? "checked" : "" ?> value="NO"> NO
                                            </td>
                                            <td><input type="text" name="fila_2_4" 
                                                       class="form-control  input-sm" 
                                                       value="<?= $F18[1][3] ?>"
                                                       required="required"/>  </td>
                                        </tr>
                                        <!------------------------->
                                        <tr>
                                            <td>Responsabilidad principal:
                                                <input type="hidden" name="fila_3_1" 
                                                       value="Responsabilidad principal:"/>
                                            </td>
                                            <td> <input type="text" name="fila_3_2" 
                                                        class="form-control  input-sm" 
                                                        value="<?= $F18[2][1] ?>"
                                                        required="required"/>  </td>
                                            <td>
                                                <input type="radio" name="fila_3_3" <?= $F18[2][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                                <input type="radio" name="fila_3_3" <?= $F18[2][2] == "NO" ? "checked" : "" ?> value="NO"> NO
                                            </td>
                                            <td><input type="text" name="fila_3_4" 
                                                       class="form-control  input-sm" 
                                                       value="<?= $F18[2][3] ?>"
                                                       required="required"/>  </td>
                                        </tr>
                                        <!------------------------->
                                        <tr>
                                            <td>Rol:
                                                <input type="hidden" name="fila_4_1" 
                                                       value="Rol:"/>
                                            </td>
                                            <td> <input type="text" name="fila_4_2" 
                                                        class="form-control  input-sm" 
                                                        value="<?= $F18[3][1] ?>"
                                                        required="required"/>  </td>
                                            <td>
                                                <input type="radio" name="fila_4_3" <?= $F18[3][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                                <input type="radio" name="fila_4_3" <?= $F18[3][2] == "NO" ? "checked" : "" ?> value="NO"> NO
                                            </td>
                                            <td><input type="text" name="fila_4_4" 
                                                       class="form-control  input-sm" 
                                                       value="<?= $F18[3][3] ?>"
                                                       required="required"/>  </td>
                                        </tr>
                                        <!------------------------->
                                        <tr>
                                            <td>Grupo ocupacional:
                                                <input type="hidden" name="fila_5_1" 
                                                       value="Grupo ocupacional:"/>
                                            </td>
                                            <td> <input type="text" name="fila_5_2" 
                                                        class="form-control  input-sm" 
                                                        value="<?= $F18[4][1] ?>"
                                                        required="required"/>  </td>
                                            <td>
                                                <input type="radio" name="fila_5_3" <?= $F18[4][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                                <input type="radio" name="fila_5_3" <?= $F18[4][2] == "NO" ? "checked" : "" ?> value="NO"> NO
                                            </td>
                                            <td><input type="text" name="fila_5_4" 
                                                       class="form-control  input-sm" 
                                                       value="<?= $F18[4][3] ?>"
                                                       required="required"/>  </td>
                                        </tr>

                                        <!------------------------->
                                        <tr>
                                            <td>Ámbito de actuación:
                                                <input type="hidden" name="fila_6_1" 
                                                       value="Ámbito de actuación:"/>
                                            </td>
                                            <td> <input type="text" name="fila_6_2" 
                                                        class="form-control  input-sm" 
                                                        value="<?= $F18[5][1] ?>"
                                                        required="required"/>  </td>
                                            <td>
                                                <input type="radio" name="fila_6_3" <?= $F18[5][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                                <input type="radio" name="fila_6_3" <?= $F18[5][2] == "NO" ? "checked" : "" ?> value="NO"> NO
                                            </td>
                                            <td><input type="text" name="fila_6_4" 
                                                       class="form-control  input-sm" 
                                                       value="<?= $F18[5][3] ?>"
                                                       required="required"/>  </td>
                                        </tr>

                                        <!------------------------->
                                        <tr>
                                            <td>Contrato/nombramiento último
                                                <input type="hidden" name="fila_7_1" 
                                                       value="Contrato/nombramiento último:"/>
                                            </td>
                                            <td> <input type="text" name="fila_7_2" 
                                                        class="form-control  input-sm" 
                                                        value="<?= $F18[6][1] ?>"
                                                        required="required"/>  </td>
                                            <td>
                                                <input type="radio" name="fila_7_3" <?= $F18[6][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                                <input type="radio" name="fila_7_3" <?= $F18[6][2] == "NO" ? "checked" : "" ?> value="NO"> NO
                                            </td>
                                            <td><input type="text" name="fila_7_4" 
                                                       class="form-control  input-sm" 
                                                       value="<?= $F18[6][3] ?>"
                                                       required="required"/>  </td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">Formación Requerida</div>
                            <div class="panel-body">

                                <table class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th style="width: 280px">Item Verificado</th>
                                            <th>Descripción</th>
                                            <th style="width: 120px">Cumple</th>
                                            <th>Observación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!------------------------->
                                        <tr>
                                            <td>Titulo Requerido:
                                                <input type="hidden" name="fila_8_1" 
                                                       value="Titulo Requerido"/>
                                            </td>
                                            <td> <input type="text" name="fila_8_2" 
                                                        class="form-control  input-sm" 
                                                        value="<?= $F18[7][1] ?>"
                                                        required="required"/>  </td>
                                            <td>
                                                <input type="radio" name="fila_8_3" <?= $F18[7][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                                <input type="radio" name="fila_8_3" <?= $F18[7][2] == "NO" ? "checked" : "" ?> value="NO"> NO
                                            </td>
                                            <td><input type="text" name="fila_8_4" 
                                                       class="form-control  input-sm" 
                                                       value="<?= $F18[7][3] ?>"
                                                       required="required"/>  </td>
                                        </tr>
                                        <!------------------------->
                                        <tr>
                                            <td>Área de Conocimiento /experiencia:
                                                <input type="hidden" name="fila_9_1" 
                                                       value="Área de Conocimiento /experiencia:"/>
                                            </td>
                                            <td> <input type="text" name="fila_9_2" 
                                                        class="form-control  input-sm" 
                                                        value="<?= $F18[9][1] ?>"
                                                        required="required"/>  </td>
                                            <td>
                                                <input type="radio" name="fila_9_3" <?= $F18[8][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                                <input type="radio" name="fila_9_3" <?= $F18[8][2] == "NO" ? "checked" : "" ?> value="NO"> NO
                                            </td>
                                            <td><input type="text" name="fila_9_4" 
                                                       class="form-control  input-sm" 
                                                       value="<?= $F18[8][3] ?>"
                                                       required="required"/>  </td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>


                        <div class="panel panel-primary">
                            <div class="panel-heading">Experiencia Laboral Requerida</div>
                            <div class="panel-body">

                                <table class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th style="width: 280px">Item Verificado</th>
                                            <th>Descripción</th>
                                            <th style="width: 120px">Cumple</th>
                                            <th>Observación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!------------------------->
                                        <tr>
                                            <td>Tiempo de Experiencia en años:
                                                <input type="hidden" name="fila_10_1" 
                                                       value="Tiempo de Experiencia en años:"/>
                                            </td>
                                            <td> <input type="text" name="fila_10_2" 
                                                        class="form-control  input-sm" 
                                                        value="<?= $F18[9][1] ?>"
                                                        required="required"/>  </td>
                                            <td>
                                                <input type="radio" name="fila_10_3" <?= $F18[9][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                                <input type="radio" name="fila_10_3" <?= $F18[9][2] == "NO" ? "checked" : "" ?> value="NO"> NO
                                            </td>
                                            <td><input type="text" name="fila_10_4" 
                                                       class="form-control  input-sm" 
                                                       value="<?= $F18[9][3] ?>"
                                                       required="required"/>  </td>
                                        </tr>
                                        <!------------------------->
                                        <tr>
                                            <td colspan="4">                                        
                                                <table id='detalles' class="table table-bordered table-striped" >
                                                    <thead>
                                                        <tr>
                                                            <th>Empresa y Puesto</th>
                                                            <th style="width: 140px">Años Laborados</th>
                                                            <th>Actividades Realizadas</th>                                                            
                                                            <th style='width: 60px'>
                                                                <button id="agregar" class="btn btn-warning"  >
                                                                    <samp class="glyphicon glyphicon-plus"></samp>
                                                                </button>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($experiencia as $value) {
                                                            ?>
                                                            <tr>
                                                                <td><input type='hidden' value="<?= $value[0] ?>" name='codigo[]'/>
                                                                    <input type='text' name='empresa[]' class='form-control  input-sm' value="<?= $value[1] ?>" required='required' /></td>
                                                                <td><input type='text' name='anios[]' class='form-control  input-sm' value="<?= $value[2] ?>" required='required'/></td>
                                                                <td colspan='2'><input type='text' name='actividades[]' class='form-control  input-sm' value="<?= $value[3] ?>" required='required' /></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">Conocimientos Específicos</div>
                            <div class="panel-body">

                                <table class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th >Conocimientos Específicos</th>
                                            <th style="width: 120px">Cumple</th>
                                            <th>Observación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!------------------------->
                                        <tr>
                                            <td>Normas, Planificación, Normativa de la  Instituto Tecnológico Superior José Chiriboga Grijalva
                                                <input type="hidden" name="fila_11_1" 
                                                       value="Normas, Planificación, Normativa de la  Instituto Tecnológico Superior José Chiriboga Grijalva"/>
                                                <input type="hidden" name="fila_11_2" 
                                                       value="null"/> 

                                            </td>                                  
                                            <td>
                                                <input type="radio" name="fila_11_3" <?= $F18[10][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                                <input type="radio" name="fila_11_3" <?= $F18[10][2] == "NO" ? "checked" : "" ?> value="NO"> NO
                                            </td>
                                            <td><input type="text" name="fila_11_4" 
                                                       class="form-control  input-sm" 
                                                       value="<?= $F18[10][3] ?>"
                                                       required="required"/>  </td>
                                        </tr>

                                        <!------------------------->
                                        <tr>
                                            <td>Planificación Estratégica, Trabajo en equipo,  Técnicas de Investigación Operativa.
                                                <input type="hidden" name="fila_12_1" 
                                                       value="Planificación Estratégica, Trabajo en equipo,  Técnicas de Investigación Operativa."/>
                                                <input type="hidden" name="fila_12_2" 
                                                       value="null"/> 
                                            </td>                                  
                                            <td>
                                                <input type="radio" name="fila_12_3" <?= $F18[11][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                                <input type="radio" name="fila_12_3" <?= $F18[11][2] == "NO" ? "checked" : "" ?> value="NO"> NO
                                            </td>
                                            <td><input type="text" name="fila_12_4" 
                                                       class="form-control  input-sm" 
                                                       value="<?= $F18[11][3] ?>"
                                                       required="required"/>  </td>
                                        </tr>
                                        <!------------------------->
                                        <tr>
                                            <td>Normativa Interna, Relaciones Interpersonales, Elaboraciones de Informes Técnicos.
                                                <input type="hidden" name="fila_13_1" 
                                                       value="Normativa Interna, Relaciones Interpersonales, Elaboraciones de Informes Técnicos."/>
                                                <input type="hidden" name="fila_13_2" 
                                                       value="null"/> 
                                            </td>                                  
                                            <td>
                                                <input type="radio" name="fila_13_3" <?= $F18[12][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                                <input type="radio" name="fila_13_3" <?= $F18[12][2] == "NO" ? "checked" : "" ?> value="NO"> NO
                                            </td>
                                            <td><input type="text" name="fila_13_4" 
                                                       class="form-control  input-sm" 
                                                       value="<?= $F18[12][3] ?>"
                                                       required="required" />  </td>
                                        </tr>

                                        <!------------------------->
                                        <tr>
                                            <td>Planificación, procesos, competencias laborables.
                                                <input type="hidden" name="fila_14_1" 
                                                       value="Planificación, procesos, competencias laborables."/>
                                                <input type="hidden" name="fila_14_2" 
                                                       value="null"/> 
                                            </td>                                  
                                            <td>
                                                <input type="radio" name="fila_14_3" <?= $F18[13][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                                <input type="radio" name="fila_14_3" <?= $F18[13][2] == "NO" ? "checked" : "" ?> value="NO"> NO
                                            </td>
                                            <td><input type="text" name="fila_14_4" 
                                                       class="form-control  input-sm" 
                                                       value="<?= $F18[13][3] ?>"
                                                       required="required"/>  </td>
                                        </tr>

                                        <!------------------------->
                                        <tr>
                                            <td>Reglamento, Elaboración de Informes Técnicos.
                                                <input type="hidden" name="fila_15_1" 
                                                       value="Reglamento, Elaboración de Informes Técnicos."/>
                                                <input type="hidden" name="fila_15_2" 
                                                       value="null"/> 
                                            </td>                                  
                                            <td>
                                                <input type="radio" name="fila_15_3" <?= $F18[14][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                                <input type="radio" name="fila_15_3" <?= $F18[14][2] == "NO" ? "checked" : "" ?> value="NO"> NO
                                            </td>
                                            <td><input type="text" name="fila_15_4" 
                                                       class="form-control  input-sm" 
                                                       value="<?= $F18[14][3] ?>"
                                                       required="required"/>  </td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group form-group-sm">
                                <label for="verificado_por" class="label label-primary" style="font-weight: 12px">Verificado por</label>
                                <select class="form-control  input-sm input-sm"
                                        id="verificado_por"
                                        name="verificado_por"
                                        required="required">
                                    <option value="" selected hidden>Seleccione...</option>
                                    <?php
                                    foreach ($PERSONAS as $per) {
                                        ?>
                                        <option
                                        <?= $F18[14][4] == $per->ID_PERSONA ? "selected" : "" ?>
                                            value="<?= $per->ID_PERSONA ?>"><?= $per->APELLIDOS . ' ' . $per->NOMBRES . ' - ' . $per->CARGO ?></option>
                                            <?php
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>

                        <!-- +++++++++++FIN CODIGO INTERNO+++++++++++++ -->
                    </div>
                    <div class="panel-footer">                    
                        <div class="pull-left">  
                            <button type="submit" id="sistema_boton_guardar" class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-save"></span>
                                GUARDAR
                            </button>
                            <a href="<?= site_url() ?>/procesos/formulario018" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-remove"></span>
                                CANCELAR
                            </a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </form>
        </div>
        <br/>

        <script src="<?= base_url() ?>assets/bootstrap/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

        <script>

            $("#agregar").click(function () {
//                var codigo = $("#producto").val();
//                var nombreProducto = $("#producto option:selected").text();
//                var precio = parseFloat($("#precio").val()).toFixed(2);
//                var cantidad = $("#cantidad").val();
//                var total = parseFloat(precio * cantidad).toFixed(2);
                var texto = "<tr><td>" +
                        "<input type='hidden' value='NUEVO' name='codigo[]'/>" +
                        "<input type='text' name='empresa[]' class='form-control  input-sm' required='required' /></td><td>" +
                        "<input type='text' name='anios[]' class='form-control  input-sm' required='required'/></td><td>" +
                        "<input type='text' name='actividades[]' class='form-control  input-sm' required='required' /></td>"+
                        "<td><button class='btnDelete glyphicon glyphicon-trash'></button></td></tr>";
                $('#detalles').append(texto);
                return false;
            });

            $("#detalles").on('click', '.btnDelete', function () {
                $(this).closest('tr').remove();
            });
        </script>
    </body>
</html>