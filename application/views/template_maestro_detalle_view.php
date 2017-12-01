<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" 
              content="IE=edge">
        <meta name="viewport" 
              content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>MENÚ</title>
        <!-- Bootstrap -->

        <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" 
              rel="stylesheet">      
    </head>
    <body>
        <?php $this->load->view('partes/menu'); ?>

        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Facturacion</b>
                </div>
                <div class="panel-body">

                    <!-- CUERPO INICIA -->

                    <form  method="post"  action="<?= site_url() ?>/facturacion/guardar">

                        <div class="row">

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group form-group-sm">
                                    <label for="cliente_proveedor" >Cliente/Proveedor</label>
                                    <select id="cliente_proveedor" name="cliente_proveedor"
                                            class="form-control" required="required">
                                        <option value="" selected hidden>Seleccione...</option>
                                        <option value="1">José Luis</option>
                                    </select>
                                </div>
                            </div>  

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group form-group-sm">
                                    <label for="fecha_factura" >Fecha Factura</label>
                                    <input type="date" id="fecha_factura" name="fecha_factura" class="form-control" required="required" />
                                </div>
                            </div>  
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Detalles
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <label for="producto" >Producto</label>
                                            <select id="producto" class="form-control" >
                                                <option value="" selected hidden>Seleccione...</option>
                                                <option value="1">Laptop hp 5000</option>
                                                <option value="2">Disco Duro Samsung 2gb</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <label for="precio">Precio</label>
                                            <input type="number" step="0.01" id="precio" name="precio" 
                                                   placeholder="precio"
                                                   class="form-control"/> 
                                        </div>
                                    </div> 
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <label for="cantidad">Cantidad</label>
                                            <input type="number" id="cantidad" name="cantidad" 
                                                   placeholder="cantidad"
                                                   class="form-control"/> 
                                        </div>
                                    </div> 
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <label for="agregar">&nbsp;</label>
                                            <div>
                                                <input type="button" id="agregar" name="agregar" class="btn btn-success" value="Agregar"/>
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                <table id='detalles' class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style='width: 50px'>Cod</th>
                                            <th>Producto</th>
                                            <th style='width: 80px'>Precio</th>
                                            <th style='width: 80px'>Cantidad</th>
                                            <th style='width: 80px'>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                                <div>
                                    <div ALIGN='left'>
                                        <input type="submit" value="Guardar" class="btn btn-primary" id="guardar" name="guardar"/>
                                    </div>
                                    <div ALIGN='right'>
                                        <div class="form-inline" style="margin: 2px">
                                            <div class="form-group">
                                                <label for="subtotal">Sub Total:</label>
                                                <input type="text" class="form-control" id="subtotal" 
                                                       required="required"
                                                       readonly="readonly" style="text-align: right">
                                            </div>
                                        </div>
                                        <div class="form-inline" style="margin: 2px">
                                            <div class="form-group">
                                                <label for="iva">Iva:</label>
                                                <input type="text" class="form-control" id="iva" 
                                                       readonly="readonly" style="text-align: right">
                                            </div>
                                        </div>
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label for="total">Total:</label>
                                                <input type="text" class="form-control" id="total" 
                                                       readonly="readonly" style="text-align: right">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- CUERPO FINALIZA -->
                </div>
            </div>
        </div>

        <script src="<?= base_url() ?>assets/bootstrap/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

        <script>
            $("#agregar").click(function () {
                var codigo = $("#producto").val();
                var nombreProducto = $("#producto option:selected").text();
                var precio = parseFloat($("#precio").val()).toFixed(2);
                var cantidad = $("#cantidad").val();
                var total = parseFloat(precio * cantidad).toFixed(2);

                var texto = "<tr><td>" +
                        "<input type='text' style='width: 50px' name='codigo[]' value='" + codigo + "' readonly='readonly'/></td><td>" + nombreProducto + "</td><td>" +
                        "<input type='text' style='width: 80px' name='precio[]' value='" + precio + "' readonly='readonly'/></td><td>" +
                        "<input type='text' style='width: 80px' name='cantidad[]' value='" + cantidad + "' readonly='readonly'/></td><td>" + total + "</td></tr>";
                $('#detalles').append(texto);
                calcularTotales();
            });

            function calcularTotales() {
                var sumar = 0;
                $('#detalles tbody tr').each(function () {
                    var total = $(this).find("td").eq(4).html();
                    sumar = sumar + parseFloat(total);
                });
                $("#subtotal").val(parseFloat(sumar).toFixed(2));
                var iva = sumar * 0.14;
                $("#iva").val(parseFloat(iva).toFixed(2));
                var totalGeneral = sumar + iva;
                $("#total").val(parseFloat(totalGeneral).toFixed(2));
            }

            $("#guardar").click(function () {
                var nFilas = $("#detalles tbody tr").length;
                if (nFilas === 0) {
                    alert('Ingrese detalles');
                    return false;
                }
                return true;
            });
        </script>
    </body>
</html>
