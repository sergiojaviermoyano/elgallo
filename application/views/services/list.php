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
                <th>Vehículo - Marca - Modelo</th>
                <th>Cliente</th>
                <th width="10%">Fecha</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($services as $srv) {
                  echo '<tr>';
                  echo '<td style="text-align:center">';
                  echo '<i class="fa fa-fw fa-print" style="color: gray; cursor: pointer;" onclick="printTicket('.$srv['srvId'].')"></i>';
                  echo '<i class="fa fa-fw fa-pencil" style="color: #f39c12; cursor: pointer; padding-left: 10px;" onclick="editTicket('.$srv['srvId'].')"></i>';
                  if($srv['srvEstado'] == 'AC')
                    echo '<i class="fa fa-fw fa-usd" style="color: #00a65a; cursor: pointer; padding-left: 10px;" onclick="CobrarService('.$srv['srvId'].')"></i>';
                  echo '</td>';
                  echo '<td style="text-align:left">'.$srv['vehPatente'].' - '.$srv['marDescripcion'].' - '.$srv['vehModelo'].'</td>';
                  echo '<td style="text-align:left">'.$srv['cliApellido'].','.$srv['cliNombre'].'</td>';
                  $date = date_create($srv['srvFecha']);   
                  echo '<td style="text-align:center">'.date_format($date, 'd-m-Y H:i').'</td>';
                  echo '<td style="text-align:center">';
                  echo ($srv['srvEstado'] == 'AC' ? '<small class="label bg-green">Activo</small>' : ($srv['srvEstado'] == 'AN' ? '<small class="label bg-red">Anulado</small>' : '<small class="label bg-blue">Facturado</small>'));
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

  function editTicket(id_){
    WaitingOpen('Cargando Ticket');
      $.ajax({
            type: 'GET',
            data: { id : id_ },
        url: 'index.php/service/getTicket',
        success: function(result){
                      WaitingClose();
                      $("#modalBodySrvTkt").html(result.html);
                      setTimeout("$('#modalSrvTkt').modal('show')",800);
              },
        error: function(result){
              WaitingClose();
              ProcesarError(result.responseText, 'modalSrvTkt');
            },
            dataType: 'json'
        });
  }

  $('#btnEditTicket').click(function(){
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
            otros:                $('#otros').val(),
            id_:                  $('#idSrv_').val()
    };

    WaitingOpen('Editando Ticket');
    $.ajax({
        type: 'POST',
        data: { 
                tickt: ticket
              },
    url: 'index.php/service/editTicket', 
    success: function(result){
              WaitingClose();
              $('#modalSrvTkt').modal('hide');
          },
    error: function(result){
          WaitingClose();
          ProcesarError(result.responseText, 'modalSrvTkt');
        },
        dataType: 'json'
    });
  });
  </script>

  <div class="modal fade" id="modalSrvTkt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" ><span><i class="fa fa-fw fa-pencil" style="color: #f39c12;"></i> </span> Editar Ticket de Servicio</h4> 
      </div>
      <div class="modal-body" id="modalBodySrvTkt">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnEditTicket">Guardar</button>
      </div>
    </div>
  </div>
</div>