<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Agregar Servicio</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-xs-6">
              <div class="row">
                <div class="col-xs-7" style="margin-top: 7px;">
                  <strong>Datos del Vehículo</strong>
                </div> 
                <div class="col-xs-2" style="margin-top: 7px;">
                  <i>Patente:</i>
                </div>
                <div class="col-xs-3">
                  <input type="text" class="form-control" id="patente">
                </div>
              </div>
              <hr>
            </div>

            <div class="col-xs-6">
              <div class="row">
                <div class="col-xs-7" style="margin-top: 7px;">
                  <strong>Datos del Cliente</strong>
                </div> 
                <div class="col-xs-2" style="margin-top: 7px;">
                  <i>DNI:</i>
                </div>
                <div class="col-xs-3">
                  <input type="text" class="form-control" id="dni">
                </div>
              </div>
              <hr>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="row">
                <div class="col-xs-2" style="margin-top: 7px;">
                  Patente:
                  <input type="hidden" id="idVehicle">
                </div> 
                <div class="col-xs-4" style="margin-top: 7px;">
                  <label id="lblPatente">-- ---- --</label>
                </div>
                <div class="col-xs-2" style="margin-top: 7px;">
                  Marca:
                </div> 
                <div class="col-xs-4" style="margin-top: 7px;">
                  <label id="lblMarca">-----------</label>
                </div>
              </div>
            </div>

            <div class="col-xs-6">
              <div class="row">
                <div class="col-xs-2" style="margin-top: 7px;">
                  DNI: 
                  <input type="hidden" id="idCliente">
                </div> 
                <div class="col-xs-2" style="margin-top: 7px;">
                  <label id="lblDni">-----------</label>
                </div>
                <div class="col-xs-2" style="margin-top: 7px;">
                  Cliente: 
                </div> 
                <div class="col-xs-6" style="margin-top: 7px;">
                  <label id="lblCliente">-----------</label>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="row">
                <div class="col-xs-2" style="margin-top: 7px;">
                  Modelo: 
                </div> 
                <div class="col-xs-4" style="margin-top: 7px;">
                  <label id="lblModelo">-----------</label>
                </div>
                <div class="col-xs-2" style="margin-top: 7px;">
                  Tipo: 
                </div> 
                <div class="col-xs-4" style="margin-top: 7px;">
                  <label id="lblTipo">-----------</label>
                </div>
              </div>
            </div>

            <div class="col-xs-6">
              <div class="row">
                <div class="col-xs-2" style="margin-top: 7px;">
                  Teléfono: 
                </div> 
                <div class="col-xs-4" style="margin-top: 7px;">
                  <label id="lblTelefono">-----------</label>
                </div>
                <div class="col-xs-2">
                  <button class="btn btn-block btn-info" disabled="disabled" id="btnHistorial"> <i class="fa fa-fw fa-calendar"></i></button>
                </div>
                <div class="col-xs-2">
                   <button class="btn btn-block btn-success" disabled="disabled" id="btnArticles"><i class="fa fa-fw fa-shopping-cart"></i></button> 
                </div>
              </div>
            </div>

            </div>
            <hr>

            <div class="row">
                <div class="col-xs-1">
                  <!--<button class="btn btn-block btn-info" disabled="disabled" id="btnHistorial"> <i class="fa fa-fw fa-calendar"></i></button>-->
                </div>
                <div class="col-xs-1">
                   <button class="btn btn-block btn-warning" disabled="disabled" id="btnManualArt"><i class="fa fa-fw fa-hand-paper-o"></i></button> 
                </div>
                <div class="col-xs-2" style="margin-top: 7px;">
                    <label style="text-decoration: underline">Detalle de Servicio</label>
                </div>
                <div class="col-xs-1" style="margin-top: 7px; text-align: right;">
                    <label>Producto</label>
                </div>
                <div class="col-xs-4">
                    <input type="hidden" class="form-control" id="prodId">
                    <input type="text" class="form-control" id="lblProducto">
                </div>
                <div class="col-xs-2">
                    <input type="text" class="form-control" placeholder="Cantidad" id="prodCant">
                </div>
                <div class="col-xs-1">
                  <button class="btn btn-block btn-success" id="btnAddArticles">  <i class="fa fa-fw fa-check"></i></button>
                </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-xs-12">
                <table id="tableService" style="display: table;" class="table table-bordered" width="100%">
                  <thead>
                    <th style="width: 5%"></th>
                    <th style="width: 15%">Código</th>
                    <th>Descripción</th>
                    <th style="width: 10%">Cantidad</th>
                    <th style="width: 10%">Precio</th>
                    <th style="width: 10%">Total</th>
                  </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                    <th colspan="5" style="text-align: right; padding-top: 15px;">
                      <button type="button" class="btn btn-info" style="float: left" id="btnSrvTkt"><i class="fa fa-fw fa-list"></i></button>
                      Total: 
                    </th>
                    <th style="font-size:20px; text-align: right;">$ <label id="lblTotal">0.00</label></th>
                  </tfoot>
                </table>

              </div>
            </div>

            <div class="row">
              <div class="col-xs-6">
                <label>Mecánica Ligera:</label><br>
                <textarea id="srvObservacion" class="form-control"></textarea>
              </div>
              <div class="col-xs-6">
                <div class="row">
                  <div class="col-xs-9" style="text-align: right; margin-top: 7px;">
                    <label>Kilometros al momento del Servicio: </label>
                  </div>
                  <div class="col-xs-3">
                    <input type="number" class="form-control" id="srvKilometros"><br>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-9" style="text-align: right; margin-top: 7px;">
                    <label>Próximo Servicio: </label>
                  </div>
                  <div class="col-xs-3">
                    <input type="number" class="form-control" id="srvKmProxService"><br>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" style="float: left" id="btnClean"><i class="fa fa-fw fa-trash"></i></button>
                      <button type="button" class="btn btn-default" id="btnCancelService">Cancelar</button>
                      <button type="button" class="btn btn-primary" id="btnSave">Aceptar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="modalCar" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id="modalAction"> </span> Vehiculo</h4> 
      </div>
      <div class="modal-body" id="modalBodyCar">
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
              <div class="alert alert-danger alert-dismissable" id="errorCar" style="display: none">
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    Revise que todos los campos esten completos
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-3">
              <label style="margin-top: 7px;">Patente <strong style="color: #dd4b39">*</strong>: </label>
            </div>
            <div class="col-xs-8">
              <input type="text" class="form-control" id="carPatente" value="" >
            </div>
          </div><br>
          <div class="row">
            <div class="col-xs-3">
              <label style="margin-top: 7px;">Marca <strong style="color: #dd4b39">*</strong>: </label>
            </div>
            <div class="col-xs-8">
              <select class="form-control select2" id="carMarca" style="width: 100%;" >
                <option value="-1" selected="selected"></option>
                <?php 
                foreach ($crud['brand'] as $b) {
                  echo '<option value="'.$b['marId'].'">'.$b['marDescripcion'].'</option>';
                  }
                ?>
              </select>
            </div>
          </div><br>
          <div class="row">
            <div class="col-xs-3">
              <label style="margin-top: 7px;">Modelo <strong style="color: #dd4b39">*</strong>: </label>
            </div>
            <div class="col-xs-9">
              <input type="text" class="form-control" id="carModelo" value="" maxlength="50">
            </div>
          </div><br>
          <div class="row">
            <div class="col-xs-3">
              <label style="margin-top: 7px;">Tipo <strong style="color: #dd4b39">*</strong>: </label>
            </div>
            <div class="col-xs-8">
              <select class="form-control select2" id="carTipo" style="width: 100%;">
                <option value="-1" selected="selected"></option>
                <?php 
                foreach ($crud['types'] as $t) {
                  echo '<option value="'.$t['tpvId'].'">'.$t['tpvDescripcion'].'</option>';
                  }
                ?>
              </select>
            </div>
          </div><br>
          <div class="row">
            <div class="col-xs-3">
              <label style="margin-top: 7px;">Movil: </label>
            </div>
            <div class="col-xs-9">
              <input type="text" class="form-control" id="carMovil" value="" maxlength="50">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btnSaveCar">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalArt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:80%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id="modalAction_"> </span> Artículos</h4> 
      </div>
      <div class="modal-body" id="modalBodyArt">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabelCli"><span id="modalActionCli"> </span> Cliente</h4> 
      </div>
      <div class="modal-body" id="modalBodyCli">
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
              <div class="alert alert-danger alert-dismissable" id="errorCli" style="display: none">
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    Revise que todos los campos esten completos
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-3">
              <label style="margin-top: 7px;">Nombre <strong style="color: #dd4b39">*</strong>: </label>
            </div>
            <div class="col-xs-8">
              <input type="text" class="form-control" id="cliNombre" value="" >
            </div>
          </div><br>
          <div class="row">
            <div class="col-xs-3">
              <label style="margin-top: 7px;">Apellido <strong style="color: #dd4b39">*</strong>: </label>
            </div>
            <div class="col-xs-8">
              <input type="text" class="form-control" id="cliApellido" value="" >
            </div>
          </div><br>
          <div class="row">
            <div class="col-xs-3">
              <label style="margin-top: 7px;">DNI <strong style="color: #dd4b39">*</strong>: </label>
            </div>
            <div class="col-xs-8">
              <input type="text" class="form-control" id="cliDni" value="" >
            </div>
          </div><br>
          <div class="row">
            <div class="col-xs-3">
              <label style="margin-top: 7px;">Teléfono <strong style="color: #dd4b39">*</strong>: </label>
            </div>
            <div class="col-xs-8">
              <input type="text" class="form-control" id="cliTelefono" value="" >
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btnSaveCustomer">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalArtManual" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id="modalActionManual"> </span> Artículo Manual</h4> 
      </div>
      <div class="modal-body" id="modalBodyArtManual">
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
              <div class="alert alert-danger alert-dismissable" id="errorManual" style="display: none">
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    Revise que todos los campos esten completos
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-3">
              <label style="margin-top: 7px;">Artículo <strong style="color: #dd4b39">*</strong>: </label>
            </div>
            <div class="col-xs-8">
              <input type="text" class="form-control" maxlength="100" id="artMdescripcion" value="" >
            </div>
          </div><br>
          <div class="row">
            <div class="col-xs-3">
              <label style="margin-top: 7px;">Precio <strong style="color: #dd4b39">*</strong>: </label>
            </div>
            <div class="col-xs-8">
              <input type="text" class="form-control" id="artMprecio" value="" >
            </div>
          </div><br>
          <div class="row">
            <div class="col-xs-3">
              <label style="margin-top: 7px;">Cantidad <strong style="color: #dd4b39">*</strong>: </label>
            </div>
            <div class="col-xs-8">
              <input type="text" class="form-control" id="artMcantidad" value="" >
            </div>
          </div><br>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnAddManualArt">Agregar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalErrorService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" ><span><i class="fa fa-fw fa-exclamation-circle" style="color: #dd4b39 ;"></i> </span> Error</h4> 
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12">
            <div class="alert alert-danger alert-dismissable" id="errorService">
                  
            </div>
          </div>
        </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalHistorial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" ><span><i class="fa fa-fw fa-history"></i> </span> Historial de Servicios</h4> 
      </div>
      <div class="modal-body" id="modalBodyHistorial">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
$("#artMprecio").maskMoney({allowNegative: false, thousands:'', decimal:'.'});
$("#artMcantidad").maskMoney({allowNegative: false, thousands:'', decimal:'.'});
$("#prodCant").maskMoney({allowNegative: false, thousands:'', decimal:'.'}); 

$('#patente').focus();
$('#patente').keypress(function(e){
    var code = e.which; 
      if(code==13){
        BuscarVehiculo();
      }   
});

function BuscarVehiculo(){
  if($('#patente').val()) {
    //Buscar datos por patente
    LoadIconAction('modalAction','Add');
    WaitingOpen('Buscando Auto');
    $.ajax({
          type: 'POST',
          data: { patente : $('#patente').val() },
      url: 'index.php/car/findCar', 
      success: function(result){
                    WaitingClose();
                    if(!result){
                      $('#lblPatente').html('-------');
                      $('#lblMarca').html('-------');
                      $('#lblTipo').html('-------');
                      $('#lblModelo').html('-------');
                      $('#lblCliente').html('-------');
                      $('#lblDni').html('-------');
                      $('#lblTelefono').html('-------');
                      $('#btnHistorial').prop("disabled", true);
                      $('#btnArticles').prop("disabled", true);
                      $('#btnManualArt').prop("disabled", true);
                      $('#idVehicle').val(-1);
                      $('#idCliente').val(-1);
                      $(".select2").select2();
                      $('#carPatente').val($('#patente').val());
                      setTimeout("$('#modalCar').modal('show');",1000);
                    } else {
                      if(result.vehiculo.vehMovil != '' && result.vehiculo.vehMovil != null){
                        $('#lblPatente').html(result.vehiculo.vehPatente + '(Mov:' + result.vehiculo.vehMovil + ')');
                      } else {
                        $('#lblPatente').html(result.vehiculo.vehPatente);
                      }
                      $('#lblMarca').html(result.vehiculo.marDescripcion);
                      $('#lblTipo').html(result.vehiculo.tpvDescripcion);
                      $('#lblModelo').html(result.vehiculo.vehModelo);
                      if(result.vehiculo.cliente != undefined){
                        $('#lblCliente').html(result.vehiculo.cliente.cliApellido +  ' ' + result.vehiculo.cliente.cliNombre);
                        $('#lblDni').html(result.vehiculo.cliente.cliDocumento);
                        $('#lblTelefono').html(result.vehiculo.cliente.cliTelefono);  
                        $('#idCliente').val(result.vehiculo.cliente.cliId);
                      }else{
                        $('#lblCliente').html('-------');
                        $('#lblDni').html('-------');
                        $('#lblTelefono').html('-------');
                        $('#idCliente').val(-1);
                      }
                      
                      if(result.vehiculo.servicesCount > 0){
                        $('#btnHistorial').prop("disabled", false);
                      }else{
                        $('#btnHistorial').prop("disabled", true);
                      }
                      $('#btnArticles').prop("disabled", false);
                      $('#btnManualArt').prop("disabled", false);
                      $('#idVehicle').val(result.vehiculo.vehId);
                      $('#patente').val('');
                      $('#dni').val('');
                    }
            },
      error: function(result){
            WaitingClose();
            ProcesarError(result.responseText, 'modalBrand');
          },
          dataType: 'json'
      });
  }
}

$('#btnArticles').click(function(){
    LoadArticlesAsociates();
});

$('#lblProducto').keyup(function(e){
  var code = e.which; 
  if(code==13){
    e.preventDefault();
    BuscarCompleto();
  }
});

function BuscarCompleto(){
   buscadorArticlesPrice($('#lblProducto').val(), $('#prodId'), $('#lblProducto'), $('#prodCant'));
}

function BuscarCompletoAsoc(){
  buscadorArticlesPrice($('#lblProductoAsoc').val(), $('#prodIdAsoc'), $('#lblProductoAsoc'), $('#prodCantAsoc'));
}

$('#prodCant').keyup(function(e) {
  var code = e.which; 
  if(code==13){
    if(parseFloat($('#prodCant').val()) > 0){
      $('#btnAddArticles').focus();
    }
  }
});

var rowY = 8000;
var pVenta;

$('#btnAddArticles').click(function(){
  AgregaraOrden();
});

function AddToAsociateArticles(){
  if(
    $('#prodIdAsoc').val() != '' &&
    parseFloat($('#prodCantAsoc').val()) > 0
    ) {
    WaitingOpen('Agregando producto');
    $.ajax({
          type: 'POST',
          data: { 
                  artId: $('#prodIdAsoc').val(),
                  carId: $('#idVehicle').val(),
                  cant:  $('#prodCantAsoc').val(),
                },
          url: 'index.php/car/asociateArticleCar', 
          success: function(result){
                        $('#prodIdAsoc').val(-1);
                        $('#prodCantAsoc').val('');
                        $('#lblProductoAsoc').val('');
                        LoadArticlesAsociates();
                },
          error: function(result){
                WaitingClose();
                ProcesarError(result.responseText, 'modalArt');
              },
              dataType: 'json'
          });
  }
}

function AgregaraOrden(){
    if(
    $('#prodId').val() != '' &&
    parseFloat($('#prodCant').val()) > 0
    ) {
    WaitingOpen('Agregando producto');
    $.ajax({
          type: 'POST',
          data: { 
                  id : $('#prodId').val()
                },
          url: 'index.php/article/getArticleJson', 
          success: function(result){
                        pVenta = (result.article.artMarginIsPorcent == 1 ? parseFloat((1 + (result.article.artMargin /100)) * parseFloat(result.article.artCoste)).toFixed(2) : parseFloat((parseFloat(result.article.artCoste) + parseFloat(result.article.artMargin))).toFixed(2));
                        html = '<tr id="'+rowY+'">';
                        html+= '<td style="text-align: center; cursor: pointer;" onclick="delete_('+rowY+')"><i class="fa fa-fw fa-close" style="color: #dd4b39"></i></td>';
                        html+= '<td>'+result.article.artBarCode+'</td>';
                        html+= '<td>'+result.article.artDescription+'</td>';
                        html+= '<td style="text-align: right">'+parseFloat($('#prodCant').val()).toFixed(2)+'</td>';
                        html+= '<td style="text-align: right">'+pVenta+'</td>';
                        html+= '<td style="text-align: right">'+parseFloat(pVenta * $('#prodCant').val()).toFixed(2)+'</td>';
                        html+= '<td style="display: none">'+result.article.artId+'</td>';
                        html+= '<td style="display: none">'+result.article.artCoste+'</td>';
                        html+= '</tr>';
                        rowY++;
                        $('#tableService > tbody').prepend(html);
                        $('#prodId').val('');
                        $('#prodCant').val('1');
                        $('#lblProducto').val('');
                        $('#lblProducto').focus();
                        Calcular();
                        WaitingClose();
                },
          error: function(result){
                WaitingClose();
                ProcesarError(result.responseText, 'modalArt');
              },
              dataType: 'json'
          });
  }
}

function delete_(id){
  $('#'+id).remove();
  Calcular();
  $('#lblProducto').focus();
}

 function Calcular(){
    var table = $('#tableService > tbody> tr');
    var total = 0;
    table.each(function(r) {
      total += parseFloat(this.children[5].textContent);
    });

    $('#lblTotal').html(parseFloat(total).toFixed(2));
  }

//Buscador de cliente
function BuscarCliente(){
  if($('#dni').val()) {
    //Buscar datos por dni
    LoadIconAction('modalActionCli','Add');
    WaitingOpen('Buscando Cliente');
    $.ajax({
          type: 'POST',
          data: { dni : $('#dni').val() },
      url: 'index.php/customer/findCustomer', 
      success: function(result){
                    WaitingClose();
                    if(!result){
                      $('#lblCliente').html('-------');
                      $('#lblDni').html('-------');
                      $('#lblTelefono').html('-------');
                      $('#idCliente').val(-1);
                      LimpiarCliente();
                      $('#cliDni').val($('#dni').val());
                      setTimeout("$('#modalCli').modal('show');",1000);
                    } else {
                      $('#lblCliente').html(result.cliente.cliApellido +  ' ' + result.cliente.cliNombre);
                      $('#lblDni').html(result.cliente.cliDocumento);
                      $('#lblTelefono').html(result.cliente.cliTelefono);
                      $('#idCliente').val(result.cliente.cliId);
                      $('#dni').val('');
                      console.log(result);
                    }
            },
      error: function(result){
            WaitingClose();
            ProcesarError(result.responseText, 'modalCli');
          },
          dataType: 'json'
      });
  }
}

$('#dni').keypress(function(e){
    var code = e.which; 
      if(code==13){
        BuscarCliente();
      }   
});

function LimpiarCliente(){
  $('#cliNombre').val('');
  $('#cliApellido').val('');
  $('#cliDni').val('');
  $('#cliTelefono').val('');
}

$('#btnSaveCustomer').click(function(){
  var hayError = false;
    if($('#cliNombre').val() == '')
    {
      hayError = true;
    }

    if($('#cliApellido').val() == '')
    {
      hayError = true;
    }

    if($('#cliDni').val() == '')
    {
      hayError = true;
    }

    if($('#cliTelefono').val() == '')
    {
      hayError = true;
    }

  
    if(hayError == true){
      $('#errorCli').fadeIn('slow');
      return;
    }

    $('#errorCli').fadeOut('slow');
    WaitingOpen('Guardando cambios');
      $.ajax({
            type: 'POST',
            data: { 
                    id : -1, 
                    act: 'Add', 
                    nro: '',
                    name: $('#cliNombre').val(),
                    lnam: $('#cliApellido').val(),
                    doc: 1,
                    dni: $('#cliDni').val(),
                    obs: '',
                    dom: '',
                    tel: $('#cliTelefono').val(),
                    est: 'AC'
                  },
        url: 'index.php/customer/setCustomer', 
        success: function(result){
                      WaitingClose();
                      $('#modalCli').modal('hide');
                      BuscarCliente();
              },
        error: function(result){
              WaitingClose();
              ProcesarError(result.responseText, 'modalCli');
            },
            dataType: 'json'
        });
});

$('#btnSaveCar').click(function(){
  var hayError = false;
  if($('#carPatente').val() == '')
  {
    hayError = true;
  }

  if($('#carMarca').val() == '' || $('#carMarca').val() == '-1')
  {
    hayError = true;
  }

  if($('#carModelo').val() == '')
  {
    hayError = true;
  }

  if($('#carTipo').val() == '' || $('#carTipo').val() == '-1')
  {
    hayError = true;
  }


  if(hayError == true){
    $('#errorCar').fadeIn('slow');
    return;
  }

  $('#errorCar').fadeOut('slow');
  WaitingOpen('Guardando cambios');
    $.ajax({
          type: 'POST',
          data: { 
                  patente:  $('#carPatente').val(),
                  marca:    $('#carMarca').val(),
                  modelo:   $('#carModelo').val(),
                  tipo:     $('#carTipo').val(),
                  movil:    $('#carMovil').val()
                },
      url: 'index.php/car/setCar', 
      success: function(result){
                    WaitingClose();
                    $('#modalCar').modal('hide');
                    BuscarVehiculo();
            },
      error: function(result){
            WaitingClose();
            ProcesarError(result.responseText, 'modalCar');
          },
          dataType: 'json'
      });
});

function addRelationalArticle(id, desc, cant){
  $('#prodId').val(id);
  $('#lblProducto').val(desc);
  $('#prodCant').val(cant);
  AgregaraOrden();
}

function LoadArticlesAsociates(){
  WaitingOpen('Cargando Artículos');
  LoadIconAction('modalAction_','Add');
  $.ajax({
      type: 'POST',
      data: { id : $('#idVehicle').val() },
  url: 'index.php/car/findCarArticles', 
  success: function(result){
                WaitingClose();
                $("#modalBodyArt").html(result.html);
                setTimeout("$('#modalArt').modal('show')",800);
                setTimeout("$('#lblProductoAsoc').focus()",1200);
        },
  error: function(result){
        WaitingClose();
        ProcesarError(result.responseText, 'modalBrand');
      },
      dataType: 'json'
  });
}

function removeRelationalArticle(artId){
  WaitingOpen('Eliminando Artículo');
  $.ajax({
      type: 'POST',
      data: { 
              vehId: $('#idVehicle').val(),
              artId: artId,
            },
  url: 'index.php/car/removeRelationalArticle', 
  success: function(result){
            LoadArticlesAsociates();
        },
  error: function(result){
        WaitingClose();
        ProcesarError(result.responseText, 'modalBrand');
      },
      dataType: 'json'
  });
}

$('#btnManualArt').click(function(){
  LoadIconAction('modalActionManual','Add');
  $('#artMdescripcion').val('');
  $('#artMprecio').val('');
  $('#artMcantidad').val('');
  $('#modalArtManual').modal('show');
});

$('#btnAddManualArt').click(function(){
  var pVenta = parseFloat($('#artMprecio').val()).toFixed(2);
  html = '<tr id="'+rowY+'">';
  html+= '<td style="text-align: center; cursor: pointer;" onclick="delete_('+rowY+')"><i class="fa fa-fw fa-close" style="color: #dd4b39"></i></td>';
  html+= '<td>-</td>';
  html+= '<td>'+$('#artMdescripcion').val()+'</td>';
  html+= '<td style="text-align: right">'+$('#artMcantidad').val()+'</td>';
  html+= '<td style="text-align: right">'+pVenta+'</td>';
  html+= '<td style="text-align: right">'+parseFloat(pVenta * $('#artMcantidad').val()).toFixed(2)+'</td>';
  html+= '<td style="display: none">'+-1+'</td>';
  html+= '<td style="display: none">'+pVenta+'</td>';
  html+= '</tr>';
  rowY++;
  $('#tableService > tbody').prepend(html);
  $('#lblProducto').focus();
  Calcular();
  $('#modalArtManual').modal('hide');
});

$('#btnSave').click(function(){
  var error = false;
  var erroMsj = '<strong>Es obligatorio : <br>';
  //Vehículo
  if(parseInt($('#idVehicle').val()) == 0 || parseInt($('#idVehicle').val()) == -1 || $('#idVehicle').val() == ''){
    error = true;
    erroMsj += '  * Elegir un vehículo. <br>';
  }

  //Cliente
  if(parseInt($('#idCliente').val()) == 0 || parseInt($('#idCliente').val()) == -1 || $('#idCliente').val() == ''){
    error = true;
    erroMsj += '  * Elegir un cliente. <br>';
  }

  //Artículos
  var table = $('#tableService > tbody> tr');
  var detalle = [];
  table.each(function(r) {
    var object = {
      artId:          parseInt(this.children[6].textContent),
      srvdCant:       parseFloat(this.children[3].textContent),
      artDescripcion: this.children[2].textContent, 
      artCosto:       parseFloat(this.children[7].textContent),
      artventa:       parseFloat(this.children[4].textContent)
    };

    detalle.push(object);
  });

  if(detalle.length <= 0)
  {
    error = true;
    erroMsj += '  * Elegir uno o mas artículos. <br>';
  }

  //Kilometros
  if($('#srvKilometros').val() == ''){
    error = true;
    erroMsj += '  * Indicar los kilometros del vehículo.';
  }

  if(error){
    $('#errorService').html(erroMsj +'</strong>');
    $('#modalErrorService').modal('show');
    return;
  }

  var ticket = {
            acMotor:              $('#acMotor').prop('checked'),
            acNombre:             $('#acNombre').val(),
            acLitros:             $('#acLitros').val(),
            fAire:                $('#fAire').prop('checked'),
            fAceite:              $('#fAceite').prop('checked'),
            fCombustible:         $('#fCombustible').prop('checked'),
            fHabitaculo:          $('#fHabitaculo').prop('checked'),
            agAgua:               $('#agAgua').prop('checked'),
            cAgua:                $('#cAgua').prop('checked'),
            aLiquiFre:            $('#aLiquiFre').prop('checked'),
            aditivoAceite:        $('#aditivoAceite').prop('checked'),
            aHidraulico:          $('#aHidraulico').prop('checked'),
            aLiquidoParabrisa:    $('#aLiquidoParabrisa').prop('checked'),
            cAceiteHidraulico:    $('#cAceiteHidraulico').prop('checked'),
            aTransCaja:           $('#aTransCaja').prop('checked'),
            aTransCajaLitros:     $('#aTransCajaLitros').val(),
            aDifer:               $('#aDifer').prop('checked'),
            aDiferLitros:         $('#aDiferLitros').val(),
            lavado:               $('#lavado').prop('checked'),
            lavadoCmotor:         $('#lavadoCmotor').prop('checked'),
            lavadoMotor:          $('#lavadoMotor').prop('checked'),
            pulido:               $('#pulido').prop('checked'),
            otros:                $('#otros').val()
  };

  WaitingOpen('Registrando Servicio');
  $.ajax({
      type: 'POST',
      data: { 
              vehId: $('#idVehicle').val(),
              cliId: $('#idCliente').val(),
              kmSrv: $('#srvKilometros').val(),
              proxS: $('#srvKmProxService').val(),
              comen: $('#srvObservacion').val(),
              detal: detalle, 
              tickt: ticket
            },
  url: 'index.php/service/setService', 
  success: function(result){
            cargarView('service', 'crear', '');
        },
  error: function(result){
        WaitingClose();
        ProcesarError(result.responseText, 'modal');
      },
      dataType: 'json'
  });
});

$('#btnCancelService').click(function(){
  cargarView('dash', 'accesosdirectos', '');
  //cargarView('services', 'crear', '');
});

$('#btnClean').click(function(){
  cargarView('service', 'crear', '');
});

$('#btnHistorial').click(function(){
  WaitingOpen('Cargando Servicios');
    $.ajax({
          type: 'POST',
          data: { id : $('#idVehicle').val() },
      url: 'index.php/service/getServices', 
      success: function(result){
                    WaitingClose();
                    $("#modalBodyHistorial").html(result.html);
                    setTimeout("$('#modalHistorial').modal('show');",800);
            },
      error: function(result){
            WaitingClose();
            ProcesarError(result.responseText, 'modalHistorial');
          },
          dataType: 'json'
      });
});

$('#btnSrvTkt').click(function(){
  $("#modalSrvTkt").modal('show');
});
</script>

<!-- Modal -->
<div class="modal fade" id="modalViewSrv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 70%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" ><span><i class="fa fa-fw fa-search" style="color: #3c8dbc;"></i> </span> Consulta de Servicio</h4> 
      </div>
      <div class="modal-body" id="modalBodyViewSrv">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="closeView()">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalSrvTkt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" ><span><i class="fa fa-fw fa-list" style="color: #3c8dbc;"></i> </span> Servicio Detallado</h4> 
      </div>
      <div class="modal-body" id="modalBodySrvTkt">
        <div class="row">
          <div class="col-xs-6">
            <!--Lubricentro -->
            <label>Lubricentro</label><br>
            <table style="display: table;" class="table table-bordered" width="100%">
              <tr>
                <td width="50%" style="vertical-align:middle">Aceite/Motor</td>
                <td style="vertical-align:middle">
                  <div class="row">
                    <div class="col-xs-1" >
                      <input type="checkbox" id="acMotor" style="margin-top: 12px">
                    </div>
                    <div class="col-xs-6">
                      <input type="text" id="acNombre" placeholder="Nombre" class="form-control">
                    </div>
                    <div class="col-xs-4">
                      <input type="text" id="acLitros" placeholder="Litros" class="form-control">
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Filtro/Aire</td>
                <td><input type="checkbox" id="fAire"></td>
              </tr>
              <tr>
                <td>Filtro/Aceite</td>
                <td><input type="checkbox" id="fAceite"></td>
              </tr>
              <tr>
                <td>Filtro/Combustible</td>
                <td><input type="checkbox" id="fCombustible"></td>
              </tr>
              <tr>
                <td>Filtro/Habitáculo</td>
                <td><input type="checkbox" id="fHabitaculo"></td>
              </tr>
              <tr>
                <td>Agregado de Agua</td>
                <td><input type="checkbox" id="agAgua"></td>
              </tr>
              <tr>
                <td>Cambio/Agua y Aditivo</td>
                <td><input type="checkbox" id="cAgua"></td>
              </tr>
              <tr>
                <td>Agregado/Liquido de Freno</td>
                <td><input type="checkbox" id="aLiquiFre"></td>
              </tr>
              <tr>
                <td>Aditivo de Aceite</td>
                <td><input type="checkbox" id="aditivoAceite"></td>
              </tr>
              <tr>
                <td>Agregado/Aceite Hidráulico</td>
                <td><input type="checkbox" id="aHidraulico"></td>
              </tr>
              <tr>
                <td>Agregado Liquido Limpia Parabrisas</td>
                <td><input type="checkbox" id="aLiquidoParabrisa"></td>
              </tr>
              <tr>
                <td>Cambio/Aceite Hiráulico</td>
                <td><input type="checkbox" id="cAceiteHidraulico"></td>
              </tr>
              <tr>
                <td style="vertical-align:middle">Aceite/Transmisión</td>
                <td>
                  <table style="display: table;" class="table table-bordered" width="100%">
                    <tr>
                      <td style="vertical-align:middle">Caja</td>
                      <td style="vertical-align:middle"><input type="checkbox" id="aTransCaja"></td>
                      <td><input type="text" id="aTransCajaLitros" placeholder="Litros" class="form-control"></td>
                    </tr>
                    <tr>
                      <td style="vertical-align:middle">Diferencial</td>
                      <td style="vertical-align:middle"><input type="checkbox" id="aDifer"></td>
                      <td><input type="text" id="aDiferLitros" placeholder="Litros" class="form-control"></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

          </div>

          <!--Lavadero -->
          <div class="col-xs-6">
            <label>Lavadero</label>
            <table style="display: table;" class="table table-bordered" width="100%">
              <tr>
                <td width="50%">Lavado</td>
                <td><input type="checkbox" id="lavado"></td>
              </tr>
              <tr>
                <td>Lavado con Motor</td>
                <td><input type="checkbox" id="lavadoCmotor"></td>
              </tr>
              <tr>
                <td>Lavado Motor</td>
                <td><input type="checkbox" id="lavadoMotor"></td>
              </tr>
              <tr>
                <td>Pulido</td>
                <td><input type="checkbox" id="pulido"></td>
              </tr>
            </table> <br>

            <label>Mecanica</label><br>

            Otros<br>
            <textarea class="form-control" id="otros"></textarea>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>