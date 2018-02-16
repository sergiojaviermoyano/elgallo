<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Servicios</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="box-body" style="padding: 15px">
          <table style="display: table;" class="table table-bordered" width="100%" id="services">
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
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

<script>
  $(function () {
    $('#services').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "language": {
            "lengthMenu": "Ver _MENU_ filas por página",
            "zeroRecords": "No hay registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrando de un total de _MAX_ registros)",
            "sSearch": "Buscar:  ",
            "oPaginate": {
                "sNext": "Sig.",
                "sPrevious": "Ant."
              }
        }
    });
  });


  </script>