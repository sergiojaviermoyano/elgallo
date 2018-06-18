<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Vehículos</h3>
          <?php
          //if (strpos($permission,'Add') !== false) {
            //echo '<button class="btn btn-block btn-success" style="width: 100px; margin-top: 10px;" data-toggle="modal" onclick="LoadBrand(0,\'Add\')" id="btnAdd" >Agregar</button>';
          //}
          ?>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="vheicles" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="20%">Acciones</th>
                <th>Descripción</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if($list != '')
                foreach($list as $v)
                {
                    echo '<tr>';
                    echo '<td>';
                    if (strpos($permission,'Edit') !== false) {
                      echo '<i class="fa fa-fw fa-pencil" style="color: #f39c12; cursor: pointer; margin-left: 15px;" onclick="LoadVehicle('.$v['vehId'].',\'Edit\')"></i>';
                    }
                    /*
                    if (strpos($permission,'Del') !== false) {
                      echo '<i class="fa fa-fw fa-times-circle" style="color: #dd4b39; cursor: pointer; margin-left: 15px;" onclick="LoadBrand('.$b['id'].',\'Del\')"></i>';
                    }
                    if (strpos($permission,'View') !== false) {
                      echo '<i class="fa fa-fw fa-search" style="color: #3c8dbc; cursor: pointer; margin-left: 15px;" onclick="LoadBrand('.$b['id'].',\'View\')"></i>';
                    }
                    */
                    echo '</td>';
                    echo '<td style="text-align: left">'.$v['vehPatente'].'</td>';
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
    //$("#groups").DataTable();
    $('#vheicles').DataTable({
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

  var idVeh = 0;
  var acVeh = '';

  function LoadVehicle(id_, action){
    idVeh = id_;
    acVeh = action;
    LoadIconAction('modalAction',action);
    WaitingOpen('Cargando Vehículo');
      $.ajax({
            type: 'POST',
            data: { id : id_, act: action },
        url: 'index.php/car/getCar', 
        success: function(result){
                      WaitingClose();
                      $("#modalBodyVehicle").html(result.html);
                      setTimeout("$('#modalVehicle').modal('show')",800);
                      //$("[data-mask]").inputmask();
              },
        error: function(result){
              WaitingClose();
              ProcesarError(result.responseText, 'modalVehicle');
            },
            dataType: 'json'
        });
  }
</script>


<!-- Modal -->
<div class="modal fade" id="modalVehicle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id="modalAction"> </span> Vehículo</h4> 
      </div>
      <div class="modal-body" id="modalBodyVehicle">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btnSave">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#btnSave').click(function(){
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
                  movil:    $('#carMovil').val(),
                  id:       idVeh
                },
      url: 'index.php/car/updateCar', 
      success: function(result){
                    WaitingClose();
                    $('#modalVehicle').modal('hide');
                    setTimeout("cargarView('car', 'index', '"+$('#permission').val()+"');",1000);
            },
      error: function(result){
            WaitingClose();
            ProcesarError(result.responseText, 'modalVehicle');
          },
          dataType: 'json'
      });
});
</script>