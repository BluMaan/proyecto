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
            <div class="panel panel-default shadow-gris">
                <div class="panel-heading"> <span class="glyphicon glyphicon-check"></span> <?= $TITULO_PAGINA ?>  </div>
                <div class="panel-body">

                    <!-- +++++++++++++CODIGO INTERNO+++++++++++++++ -->



                    <table id="mi_tablita" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                               
                                <th style="width: 160px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contar = 0;
                            foreach ($PERSONAS as $per) {
                                ?>
                                <tr>
                                    <td><?= $per->CEDULA ?></td>
                                    <td><?= $per->NOMBRES ?></td>
                                    <td><?= $per->APELLIDOS ?></td>
                                    
                                    <td>
                                        <input type="radio" name="fila"  value="1" >SI 
                                         <input type="radio" name="fila" checked  value="0" >NO
                                         </td>
                                       
                                        
<!--                                        <input type="radio" name="fila_1_3" <?= $F18[0][2] == "SI" ? "checked" : "" ?> value="SI"> SI
                                        <input type="radio" name="fila_1_3" "checked" : " value="NO"> NO-->
                                    
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- +++++++++++FIN CODIGO INTERNO+++++++++++++ -->
                </div>
            </div>
        </div>
        <br/>

        <script src="<?= base_url() ?>assets/bootstrap/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

        <script src="<?= base_url() ?>assets/bootstrap/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/bootstrap/js/dataTables.bootstrap.min.js"></script>	
        <script>
                                        $(document).ready(function () {
                                            $('#mi_tablita').DataTable();
                                        });
        </script>

    </body>
</html>