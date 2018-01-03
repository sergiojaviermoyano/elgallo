
<div class="row">
  <div class="col-xs-12">
    <div class="alert alert-danger alert-dismissable" id="error" style="display: none">
          <h4><i class="icon fa fa-ban"></i> Error!</h4>
          Revise que todos los campos esten completos
      </div>
  </div>
</div>
<div class="nav-tabs-custom"> 
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab_1" data-toggle="tab">General</a></li>
    <li id="tabComposicion" <?php echo ($data['article']['artEsSimple'] == true ? 'style="display: none"' : '');?>><a href="#tab_21" data-toggle="tab">Composición</a></li>
    <li><a href="#tab_2" data-toggle="tab">Precio</a></li><!---  > ---->
    <li><a href="#tab_3" data-toggle="tab">Stock</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_1"> <!-- Datos generales del Articulo -->
      
      <!-- Tipo de Articulo -->
      <div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Tipo <strong style="color: #dd4b39">*</strong>: </label>
          </div>
        <div class="col-xs-5">
            <select class="form-control" id="artTipo" <?php echo ($data['read'] == true || $data['article']['action'] != 'Add' ? 'disabled="disabled"' : '');?> >
              <option value="S" <?php echo ($data['article']['artEsSimple'] == true ? 'selected="selected"' : '');?>>Simple</option>
              <option value="C" <?php echo ($data['article']['artEsSimple'] == false ? 'selected="selected"' : '');?>>Compuesto</option>
            </select>
          </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <hr>
        </div>
      </div>

      <!-- Código del Artículo -->
      <div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Código de Barra<strong style="color: #dd4b39">*</strong>: </label>
          </div>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="artBarCode" value="<?php echo $data['article']['artBarCode'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?> >
          </div>
      </div><br>

      <!-- Código del Proveedor -->
      <div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Código de Proveedor: </label>
          </div>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="artProvCode" value="<?php echo $data['article']['artProvCode'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?> >
          </div>
      </div><br>
      
      <!-- Descripción del Artículo -->
      <div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Descripción <strong style="color: #dd4b39">*</strong>: </label>
          </div>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="artDescription" value="<?php echo $data['article']['artDescription'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
          </div>
      </div><br>

      <!-- Marca -->
      <div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Marca : </label>
          </div>
        <div class="col-xs-7">
            <select class="form-control" id="marcId"  <?php echo ($data['read'] == true  ? 'disabled="disabled"' : '');?> >
              <?php 
                foreach ($data['marcas'] as $m) {
                  echo '<option value="'.$m['id'].'"  '.($data['article']['marcId'] == $m['id'] ? 'selected' : '').'>'.$m['descripcion'].'</option>';
                }
              ?>
            </select>
          </div>
      </div><br>

      <!-- Subrubro -->
      <div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Subrubro : </label>
          </div>
        <div class="col-xs-7">
            <select class="form-control" id="subrId"  <?php echo ($data['read'] == true  ? 'disabled="disabled"' : '');?> >
              <?php 
                foreach ($data['subrubros'] as $m) {
                  echo '<option value="'.$m['subrId'].'"  '.($data['article']['subrId'] == $m['subrId'] ? 'selected' : '').'>'.$m['rubDescripcion'] . ' - ' . $m['subrDescripcion'].'</option>';
                }
              ?>
            </select>
          </div>
      </div><br>

      <!-- -->
      <div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Estado: </label>
          </div>
        <div class="col-xs-7">
            <select class="form-control" id="artEstado"  <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?> >
              <?php 
                  echo '<option value="AC" '.($data['article']['artEstado'] == 'AC' ? 'selected' : '').'>Activo</option>';
                  echo '<option value="IN" '.($data['article']['artEstado'] == 'IN' ? 'selected' : '').'>Inactivo</option>';
                  echo '<option value="SU" '.($data['article']['artEstado'] == 'SU' ? 'selected' : '').'>Suspendido</option>';
              ?>
            </select>
          </div>
      </div>
    </div>


    <div class="tab-pane" id="tab_2"> <!-- Imagen del cliente -->
      
      <div class="row">
        <div class="col-xs-12">
          <hr>
        </div>
      </div>
              

      <div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Precio Costo <strong style="color: #dd4b39">*</strong>: </label>
          </div>
        <div class="col-xs-5">
            <input type="text" class="form-control clacularPrecio" id="artCoste" value="<?php echo $data['article']['artCoste'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>>
          </div>
      </div><br>

      <div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Margen : </label>
          </div>
        <div class="col-xs-4">
            <input type="text" class="form-control clacularPrecio" id="artMargin" value="<?php echo $data['article']['artMargin'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
          </div>
        <div class="col-xs-3">
            <label style="margin-top: 7px;">Es Porcentaje : </label>
          </div>
        <div class="col-xs-1">
            <input style="margin-top: 12px;" class="clacularPrecio" type="checkbox" id="artMarginIsPorcent" <?php echo $data['article']['artMarginIsPorcent'] == 1 ? 'checked' : '';?> <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>>
          </div>
      </div><br>

      <div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Precio Venta: </label>
          </div>
        <div class="col-xs-5">
            <input type="text" class="form-control" id="artPrecioVenta" value="" disabled="disabled" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
          </div>
      </div><br>

    </div>  


    <div class="tab-pane" id="tab_3"> <!-- Acerca del cliente -->
       
       <div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Máximo : </label>
          </div>
        <div class="col-xs-5">
            <input type="text" class="form-control" id="artMaximo" value="<?php echo $data['article']['artMaximo'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
          </div>
      </div><br>

      <div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Punto de Pedido : </label>
          </div>
        <div class="col-xs-5">
            <input type="text" class="form-control" id="artMedio" value="<?php echo $data['article']['artMedio'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
          </div>
      </div><br>

      <div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Mínimo : </label>
          </div>
        <div class="col-xs-5">
            <input type="text" class="form-control" id="artMinimo" value="<?php echo $data['article']['artMinimo'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
          </div>
      </div><br>

    </div>

    <div class="tab-pane" id="tab_21"> <!-- Acerca del cliente -->
      
      <div class="row">
        <div class="col-xs-6">
            <label style="margin-top: 7px;">Artículo : </label>
          </div>

        <div class="col-xs-4">
            <label style="margin-top: 7px;">Cantidad : </label>
          </div>

      </div>

      <div>
        <div class="col-xs-6">
            <input type="hidden" id="artBuscadorId">
            <input type="text" class="form-control" id="artBuscador" value="" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
          </div>

        <div class="col-xs-4">
            <input type="text" class="form-control" id="artCantidad" value="" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
          </div>

        <div class="col-xs-2">
            <button class="btn btn-block btn-success"  onclick="" id="btnAgree">
              <i class="fa fa-fw fa-check" ></i>
            </button>
          </div>

      </div>

      <div class="row">
        <div class="col-xs-12">
          <hr>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <table id="articles_" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="5%"></th>
                <th width="15%">Código</th>
                <th>Descripción</th>
                <th>Cantidad</th>
              </tr>
            </thead>
            <tbody>
              <!-- Acá el cuerpo -->
              <?php 
              $row = 1000;
              foreach ($data['article']['detail'] as $item) {
                echo '<tr id="'.$row.'">';
                echo '<td style="text-align: center" onclick="DeleteRow('.$row.')"><i class="fa fa-fw fa-close" style="color: #dd4b39"></i></td>';
                echo '<td>'.$item['artBarCode'].'</td>';
                echo '<td>'.$item['artDescription'].'</td>';
                echo '<td style="text-align: right">'.$item['artDetCantidad'].'</td>';
                echo '<td style="display: none">'.$item['artId_'].'</td>';
                echo '</tr>';
                $row++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div><br>

    </div>

  </div>
</div>

<script>

$('#artTipo').change(function() {
  if( $(this).val() == 'S' ){
    //Simple 
    $('#tabComposicion').hide('slow');
  } else {
    //Compuesto
    $('#tabComposicion').show('slow');
  }
});



function CalcularPrecio(){
  var precioCosto = 0;
  precioCosto = parseFloat($('#artCoste').val() == '' ? 0 : $('#artCoste').val());

  //Calcular el precio de venta 
  var margen = $('#artMargin').val() == '' ? 0 : parseFloat($('#artMargin').val());
  var margenEsPorcentaje = $("#artMarginIsPorcent").is(':checked') == true ? true : false;

  var precioVenta = precioCosto;
  var acumulado = 0;

  //Sumar margen
  if(margenEsPorcentaje == true){
    if(margen > 0)
      acumulado = precioVenta * (margen / 100);
  } else {
    acumulado = margen;
  }
  precioVenta += acumulado;

  //var precioVenta = precioCosto + gasto1 + gasto2;
  $('#artPrecioVenta').val(parseFloat(precioVenta).toFixed(2));
}

$('.clacularPrecio').keyup(function() {
  CalcularPrecio();
});

$('.clacularPrecio').change(function() {
  CalcularPrecio();
});

$('#artBuscador').keyup(function(e) {
    var code = e.which; 
    if(code==13){
      e.preventDefault();
      buscadorArticlesSingles($('#artBuscador').val(), $('#artBuscadorId'), $('#artBuscador'), $('#artCantidad'));
    }
});

$('#artCantidad').keyup(function(e) {
  var code = e.which; 
  if(code==13){
    if(parseFloat($('#artCantidad').val()) > 0){
      $('#btnAgree').focus();
    }
  }
});

var rowX = 7000;
$('#btnAgree').click(function(e){
  if(
      $('#artBuscadorId').val() != '' &&
      parseFloat($('#artCantidad').val()) > 0
    ) {
      WaitingOpen('Agregando producto');
      $.ajax({
            type: 'POST',
            data: { 
                    id :      $('#artBuscadorId').val()
                  },
        url: 'index.php/article/getArticleJson', 
        success: function(result){
                      html = '<tr id="'+rowX+'">';
                      html+= '<td style="text-align: center" onclick="DeleteRow('+rowX+')"><i class="fa fa-fw fa-close" style="color: #dd4b39"></i></td>';
                      html+= '<td>'+result.article.artBarCode+'</td>';
                      html+= '<td>'+result.article.artDescription+'</td>';
                      html+= '<td style="text-align: right">'+$('#artCantidad').val()+'</td>';
                      html+= '<td style="display: none">'+result.article.artId+'</td>'
                      html+= '</tr>';
                      rowX++;
                      $('#articles_ > tbody').prepend(html);
                      $('#artBuscadorId').val('');
                      $('#artCantidad').val('');
                      $('#artBuscador').val('');
                      $('#artBuscador').focus();
                      WaitingClose();
              },
        error: function(result){
              WaitingClose();
              ProcesarError(result.responseText, 'modalArticle');
            },
            dataType: 'json'
        });
  }
});

function DeleteRow(id)
{
  $('#'+id).remove();
}

</script>