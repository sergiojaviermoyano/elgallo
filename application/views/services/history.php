<section class="content">
  <div class="row">
    <div class="col-xs-12">
    	<div class="box-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="10%"></th>
                <th width="40%">Fecha</th>
                <th>Km</th>
                <th width="10%">Estado</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  if(count($data) > 0)                 
                	foreach($data as $s)
      		        {
  	                echo '<tr>';
  	                echo '<td style="text-align: center">';
  	                echo 	'<i class="fa fa-fw fa-search" style="color: #3c8dbc; cursor: pointer;" onclick="LoadSrv('.$s['srvId'].')"></i>';
  	                echo '</td>';
  	                $date = date_create($s['srvFecha']);   
                    echo '<td style="text-align: center">'.date_format($date, 'd-m-Y H:i').'</td>';
  	                echo '<td style="text-align: right">'.number_format($s['srvKm'], 0, ",", ".").'</td>';
                    echo '<td style="text-align: center">'.($s['srvEstado'] == 'AC' ? '<small class="label pull-left bg-green">Activo</small>' : '<small class="label pull-left bg-blue">Facturado</small>').'</td>';
  	                echo '</tr>';
                    
      		        }

              ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
    </div>
  </div>
</section>

<script>
function LoadSrv(srvId){
	WaitingOpen('Cargando Servicio');
    $.ajax({
          type: 'POST',
          data: { id : srvId },
      url: 'index.php/service/getServiceId', 
      success: function(result){
                    WaitingClose();
                    $("#modalBodyViewSrv").html(result.html);
                    setTimeout("$('#modalViewSrv').modal('show');",800);
            },
      error: function(result){
            WaitingClose();
            ProcesarError(result.responseText, 'modalViewSrv');
          },
          dataType: 'json'
      });
}

function closeView(){
	$('#modalViewSrv').modal('hide');	
}
</script>