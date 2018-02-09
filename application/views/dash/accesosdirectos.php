<section class="content">
  <div class="row">
    <div class="col-xs-3">
      <div class="info-box" style="cursor: pointer" onClick="cargarView('service', 'crear', '')">
        <span class="info-box-icon bg-green"><i class="fa fa-fw fa-wrench"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Agregar</span>
          <span class="info-box-number">Servicio</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <!---_-->
    <div class="col-xs-6">
      <div class="box box-warning direct-chat direct-chat-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Buscador Rápido</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="padding: 15px">
          <div class="row">
            <div class="col-xs-12">
              <input type="text" class="form-control" placeholder="Código" id="artCode" value="" >
            </div>
          </div>
          <div class="row" style="margin-top: 5px;">
            <div class="col-xs-2" style="margin-top: 7px;">
              Artículo:
            </div>
            <div class="col-xs-10">
              <label id="artDescripcion" style="font-size: 22px">--------------</label>
            </div>
          </div>
          <div class="row" style="margin-top: 5px;">
            <div class="col-xs-2" style="margin-top: 7px;">
              Precio: 
            </div>
            <div class="col-xs-10">
              <label id="artPrecio" style="font-size: 22px"> $--,-- </label>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!---_-->

  </div><!-- /.row -->

  <div class="row">
    <div class="col-xs-12">
      <div class="box box-success direct-chat direct-chat-success">
        <div class="box-header with-border">
          <h3 class="box-title">Últimos Servicios</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="padding: 15px">
          <table style="display: table;" class="table table-bordered" width="100%">
            <thead>
              <tr>
                <th></th>
                <th>Vehículo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Kilometros</th>
                <th>Fecha</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($services as $srv) {
                  echo '<tr>';
                  echo '<td style="text-align:center">';
                  echo '<i class="fa fa-fw fa-print" style="color: gray; cursor: pointer;" onclick="printTicket('.$srv['srvId'].')"></i>';
                  if($srv['srvEstado'] == 'AC')
                    echo '<i class="fa fa-fw fa-usd" style="color: #00a65a; cursor: pointer; padding-left: 10px;" onclick="CobrarService('.$srv['srvId'].')"></i>';
                  echo '</td>';
                  echo '<td style="text-align:center">'.$srv['vehPatente'].'</td>';
                  echo '<td>'.$srv['marDescripcion'].'</td>';
                  echo '<td>'.$srv['vehModelo'].'</td>';
                  echo '<td style="text-align:right">'.number_format($srv['srvKm'], 0, ",", ".").'</td>';
                  $date = date_create($srv['srvFecha']);   
                  echo '<td style="text-align:center">'.date_format($date, 'd-m-Y H:i').'</td>';
                  echo '<td style="text-align:center">';
                  echo ($srv['srvEstado'] == 'AC' ? '<small class="label pull-left bg-green">Activo</small>' : ($srv['srvEstado'] == 'AN' ? '<small class="label pull-left bg-red">Anulado</small>' : '<small class="label pull-left bg-blue">Facturado</small>'));
                  echo '</td>';
                  echo '</tr>';
                }
              ?>
            </tbody>
        </div>
      </div>
    </div>
  </div>  
</section><!-- /.content -->

<script>
$('#artCode').keypress(function(e){
    var code = e.which; 
      if(code==13){
        BuscarArticulo();
      }   
});

function BuscarArticulo(){
  WaitingOpen('Buscando Artículo');
  $.ajax({
        type: 'POST',
        data: { 
                code: $('#artCode').val()
              },
        url: 'index.php/article/searchByCode', 
        success: function(result){
                      WaitingClose();
                      $('#artCode').val('');
                      if(result == false){
                        $('#artDescripcion').html('<i>Atículo no encontrado.</i>')
                        $('#artPrecio').html('$ --,--');
                      }else {
                        $('#artDescripcion').html(result.artDescription)
                        $('#artPrecio').html('$ ' + parseFloat(result.pVenta).toFixed(2));
                      }
                      
              },
        error: function(result){
              WaitingClose();
              ProcesarError(result.responseText, 'modal');
            },
            dataType: 'json'
        });
}

function printTicket(srvId){
  WaitingOpen('Generando ticket...');
  LoadIconAction('modalAction__','Print');
  $.ajax({
          type: 'POST',
          data: {
                  id : srvId
                },
      url: 'index.php/service/printTicket',
      success: function(result){
                    WaitingClose();
                    var url = "./assets/tickets/" + result;
                    $('#printDoc').attr('src', url);
                    setTimeout("$('#modalPrint').modal('show')",800);
            },
      error: function(result){
            WaitingClose();
            ProcesarError(result.responseText, 'modalPrint');
          },
          dataType: 'json'
      });
}

function CobrarService(srvId){
  WaitingOpen('Espere...');
  $.ajax({
          type: 'POST',
          data: null,
      url: 'index.php/box/isOpenBox',
      success: function(result){
                    WaitingClose();
                    if(result == 0){

                    } else {
                      cargarView('sale', 'cobrar', srvId);
                    }
            },
      error: function(result){
            WaitingClose();
            ProcesarError(result.responseText, 'noModal');
          },
          dataType: 'json'
      });
}
</script>