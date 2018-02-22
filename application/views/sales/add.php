<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Nueva Venta</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
        	<div class="row">
        		<!-- Lista de Precios y Cliente -->
        		<div class="col-xs-6">
        			<!-- Listas de Precios -->
        			<div class="row">
        				<div class="col-xs-4">
	        				<label style="margin-top: 7px">Lista de Precios</label>
		        		</div>
		        		<div class="col-xs-8">
		        			<select class="form-control" id="lpId">
						      <?php foreach ($lists as $key => $item):?>
						        <option value="<?php echo $item['lpId'];?>" data-porcent="<?php echo $item['lpMargen'];?>" <?php echo $item['lpDefault'] == true ?'selected':''?> ><?php echo $item['lpDescripcion'];?> </option>
						      <?php endforeach;?>
						    </select>
		        		</div>
        			</div><br>
        			<!-- Cliente -->
        			<div class="row">
        				<div class="col-xs-4">
	        				<label style="margin-top: 7px">Cliente</label>
		        		</div>
		        		<div class="col-xs-8">
		        			<select class="form-control select2" id="cliId">
						      <?php foreach ($customers as $key => $item):?>
						        <option value="<?php echo $item['cliId'];?>" <?php echo $item['cliDefault'] == true ?'selected':''?> ><?php echo $item['cliDocumento'] . ' ' . $item['cliNombre'] . ' ' . $item['cliApellido'];?> </option>
						      <?php endforeach;?>
						    </select>
		        		</div>
        			</div> <br>
	        	</div>
        	</div>
        	<!-- Buscador -->
        	<div class="row">
        		<div class="col-xs-12">
        			<div class="box box-default box-solid">
			            <div class="box-header with-border">
			              <h3 class="box-title">Buscador de Artículos</h3>
			              <!-- /.box-tools -->
			            </div>
			            <!-- /.box-header -->
			            <div class="box-body">
			            	<div class="row">
				                <div class="col-xs-1">
				                  <!--<button class="btn btn-block btn-info" disabled="disabled" id="btnHistorial"> <i class="fa fa-fw fa-calendar"></i></button>-->
				                </div>
				                <div class="col-xs-1">
				                   <button class="btn btn-block btn-warning" id="btnManualArt"><i class="fa fa-fw fa-hand-paper-o"></i></button> 
				                </div>
				                <div class="col-xs-1" style="margin-top: 7px; text-align: right;">
				                    <label>Producto</label>
				                </div>
				                <div class="col-xs-5">
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
			            </div>
			        </div>
        		</div>
        	</div>
        	<!-- Detalle y Total -->
        	<div class="row">
        		<div class="col-xs-8">
        			<div class="box box-warning box-solid">
			            <div class="box-header with-border">
			              <h3 class="box-title">Detalle</h3>
			              <!-- /.box-tools -->
			            </div>
			            <!-- /.box-header -->
			            <div class="box-body">
			            	<table class="table table-bordered table-hover" id="detailSale">
			            		<thead>
				            		<tr>
				            			<th style="width: 5%"></th>
				            			<th style="width: 10%">Código</th>
				            			<th>Descripción</th>
				            			<th style="width: 5%; text-align: center;">Cantidad</th>
				            			<th style="width: 10%; text-align: center;">Precio</th>
				            			<th style="width: 15%; text-align: center;">Total</th>
				            		</tr>
				            	</thead>
				            	<tbody>
				            		
								</tbody>
			            	</table>
			            </div>
			        </div>
        		</div>
        		<div class="col-xs-4">
        			<div class="box box-success box-solid">
			            <div class="box-header with-border">
			              <h3 class="box-title">Total $:</h3>
			              <!-- /.box-tools -->
			            </div>
			            <!-- /.box-header -->
			            <div class="box-body" style="text-align: center">
			            	<strong class="text-green"><h1 id="totalSale">0,00</h1></strong>
			            </div>
			        </div>
			        <br>
			        <div style="text-align: right">
				        <button type="button" class="btn btn-default pull-left" onclick="cargarView('dash', 'accesosdirectos', '')">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnServiceEfectivo">Efectivo</button>
				        <button type="button" class="btn btn-success" id="btnServiceBuy">Cobrar</button>
				    </div>
        		</div>
        	</div>
        </div>
      </div>
    </div>
  </div>
</section>

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

<!-- Modal Medios de Pago -->
<div class="modal fade" id="modalMedios" tabindex="3000" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 50%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><span> <i class="fa fa-fw fa-money" style="color: #00a65a;"> </i> </span> Medios de Pago</h4> 
      </div>
      <div class="modal-body" id="modalBodyMedios">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btnPago">Aceptar</button>
      </div>
    </div>
  </div>
</div>


<script>
$("#artMprecio").maskMoney({allowNegative: false, thousands:'', decimal:'.'});
$("#artMcantidad").maskMoney({allowNegative: false, thousands:'', decimal:'.'});
$("#prodCant").maskMoney({allowNegative: false, thousands:'', decimal:'.'}); 
$(".select2").select2();


Calcular();

function Calcular(){
	var table = $('#detailSale > tbody> tr');
	var total = 0;
	table.each(function(r) {
	  total += parseFloat(this.children[5].textContent);
	});

	$('#totalSale').html(parseFloat(total).toFixed(2));
}

var rowY = 8000;
var pagos = [];
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
  html+= '<td style="text-align: right">'+parseFloat(pVenta).toFixed(2)+'</td>';
  html+= '<td style="text-align: right">'+parseFloat(pVenta * $('#artMcantidad').val()).toFixed(2)+'</td>';
  html+= '<td style="display: none">-</td>';
  html+= '<td style="display: none">'+pVenta+'</td>';
  html+= '<td style="display: none">0</td>';
  html+= '<td style="display: none">'+pVenta+'</td>';
  html+= '</tr>';
  rowY++;
  $('#detailSale > tbody').prepend(html);
  $('#lblProducto').focus();
  Calcular();
  $('#modalArtManual').modal('hide');
});

function delete_(id){
  $('#'+id).remove();
  Calcular();
  $('#lblProducto').focus();
}

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

$('#prodCant').keyup(function(e) {
  var code = e.which; 
  if(code==13){
    if(parseFloat($('#prodCant').val()) > 0){
      $('#btnAddArticles').focus();
    }
  }
});

$('#btnAddArticles').click(function(){
  AgregaraOrden();
});

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
                        html+= '<td>'+result.article.artProvCode+'</td>';
                        html+= '<td>'+result.article.artDescription+'</td>';
                        html+= '<td style="text-align: right">'+parseFloat($('#prodCant').val()).toFixed(2)+'</td>';
                        html+= '<td style="text-align: right">'+pVenta+'</td>';
                        html+= '<td style="text-align: right">'+parseFloat(pVenta * $('#prodCant').val()).toFixed(2)+'</td>';
                        html+= '<td style="display: none">'+result.article.artId+'</td>';
                        html+= '<td style="display: none">'+result.article.artCoste+'</td>';
                        html+= '<td style="display: none">1</td>';
                        html+= '<td style="display: none">'+pVenta+'</td>';
                        html+= '</tr>';
                        rowY++;
                        $('#detailSale > tbody').prepend(html);
                        $('#prodId').val('');
                        $('#prodCant').val('1');
                        $('#lblProducto').val('');
                        $('#lblProducto').focus();
                        Calcular();
                        WaitingClose();
                },
          error: function(result){
                WaitingClose();
                ProcesarError(result.responseText, 'modalNo');
              },
              dataType: 'json'
          });
  }
}

$('#btnServiceBuy').click(function(){
  var importeVenta = parseFloat($('#totalSale').html());
  if(importeVenta > 0){
	  pagos = [];
	  WaitingOpen('Cargando medios...');
	      $.ajax({
	            type: 'POST',
	            data: { 
	                    id : -1,
	                    to : $('#totalSale').html()
	                  },
	        url: 'index.php/sale/getMPagos', 
	        success: function(result){
	                      WaitingClose();
	                      $('#modalBodyMedios').html(result.html);
	                      setTimeout("$('#modalMedios').modal('show');",800);
	              },
	        error: function(result){
	              WaitingClose();
	              ProcesarError(result.responseText, 'modalMedios');
	            },
	            dataType: 'json'
	        });
  }
});

function addItem(medId, tmpId, tipo){
  //Buscar si ya esta el tmpId en el array y eliminar
  pagos = pagos.filter(function( obj ) {
    return obj.tmp !== tmpId;
  });
  
  if(medId == -1){
    //Medio multiple (tarjeta)
    if($('#'+tmpId+'_medId').val() == -1 || $('#'+tmpId+'_importe').val() == ''){
      alert('Completa el valor');
    }else{
      var object = {
        mId:      $('#'+tmpId+'_medId').val(),
        imp:      $('#'+tmpId+'_importe').val(),
        tmp:      tmpId,
        de1:      $('#'+tmpId+'_des1').val(),
        de2:      $('#'+tmpId+'_des2').val(),
        de3:      $('#'+tmpId+'_des3').val(),
      };
      pagos.push(object);
      var div = '#'+tmpId+'_load';
      $(div).hide();
    }
  } else {
    //Medio simple (efectivo / cta cte / etc)
    if($('#'+medId+'_importe').val() == ''){
      alert('Completa el valor');
    }else{
      var object = {
        mId:      medId,
        imp:      $('#'+medId+'_importe').val(),
        tmp:      tmpId,
        de1:      null,
        de2:      null,
        de3:      null
      };
      pagos.push(object);
      var div = '#'+tmpId+'_load';
      $(div).hide();
    }
  }
  CargarImportes();
}

function CargarImportes(){
  var pag = 0;
  $.each(pagos, function(index, result){
      $('#'+result.tmp+'_total').html(parseFloat(result.imp).toFixed(2));
      pag += parseFloat(result.imp);
  });

  $('#pagos_suma').html(parseFloat(pag).toFixed(2));
}

$('#btnPago').click(function(){
  var importeAPagar = parseFloat($('#totalSale').html().replace(',',''));
  var importePagado = parseFloat($('#pagos_suma').html());

  if(importeAPagar == importePagado){
    //Barrer articulos.-
    var table = $('#detailSale > tbody> tr');
    var detalle = [];
    table.each(function(r) {
      var object = {
        artId:          parseInt(this.children[6].textContent),
        srvdCant:       parseFloat(this.children[3].textContent),
        artDescripcion: this.children[2].textContent, 
        artCosto:       parseFloat(this.children[7].textContent),
        artventa:       parseFloat(this.children[4].textContent),
        artProvCode:    this.children[1].textContent,
        actualizaStock: parseInt(this.children[8].textContent)
      };

      detalle.push(object);
    });
    //------------------
    WaitingOpen('Cobrando...');
    $.ajax({
          type: 'POST',
          data: { 
                  id : -1,
                  pa : pagos,
                  dt : detalle, 
                  cl : $('#cliId').val()
                },
      url: 'index.php/sale/setSale', 
      success: function(result){
                    WaitingClose();
                    if(result == true){
                      $('#modalMedios').modal('hide');
                      setTimeout("cargarView('dash', 'accesosdirectos', '');",800);
                    } else {
                      alert('Error');
                    }
            },
      error: function(result){
            WaitingClose();
            ProcesarError(result.responseText, 'modalMedios');
          },
          dataType: 'json'
      }); 
  }else{
    alert('el pago no es igual');
  }
});

$('#btnServiceEfectivo').click(function(){
  var importeVenta = parseFloat($('#totalSale').html());
  if(importeVenta > 0){
    //Barrer articulos.-
    var table = $('#detailSale > tbody> tr');
    var detalle = [];
    table.each(function(r) {
      var object = {
        artId:          parseInt(this.children[6].textContent),
        srvdCant:       parseFloat(this.children[3].textContent),
        artDescripcion: this.children[2].textContent, 
        artCosto:       parseFloat(this.children[7].textContent),
        artventa:       parseFloat(this.children[4].textContent),
        artProvCode:    this.children[1].textContent,
        actualizaStock: parseInt(this.children[8].textContent)
      };

      detalle.push(object);
    });
    //------------------
    WaitingOpen('Cobrando...');
    $.ajax({
          type: 'POST',
          data: { 
                  id : -1,
                  dt : detalle, 
                  cl : $('#cliId').val(),
                  im : importeVenta
                },
      url: 'index.php/sale/setSaleEfectivo', 
      success: function(result){
                    WaitingClose();
                    if(result == true){
                      setTimeout("cargarView('dash', 'accesosdirectos', '');",800);
                    } else {
                      alert('Error');
                    }
            },
      error: function(result){
            WaitingClose();
            ProcesarError(result.responseText, 'modal__');
          },
          dataType: 'json'
      }); 
  }else{
    
  }
});

  $(function(){
    $('#lpId').on('change',function(){
      //debugger;
      var selected = $('#lpId').find('option:selected');
      var margin = parseFloat(selected.data('porcent'));

      var table = $('#detailSale > tbody> tr');
      var detalle = [];
      table.each(function(r) {
        
          var srvdCant=       parseFloat(this.children[3].textContent);
          var artCosto=       parseFloat(this.children[7].textContent);
          var artventa=       parseFloat(this.children[9].textContent);
          //artventa:       parseFloat(this.children[4].textContent),
          if(margin > 0){
            artventa += artventa * (margin / 100);
          }

          if(margin <0){
            margin  *= -1;
            artventa -= artventa * (margin / 100);
          }

          this.children[4].textContent = parseFloat(artventa).toFixed(2);
          this.children[5].textContent = parseFloat(parseFloat(artventa).toFixed(2) * srvdCant).toFixed(2);
      });

      Calcular();
    });


    $("#lpId").trigger("change");

  });
</script>