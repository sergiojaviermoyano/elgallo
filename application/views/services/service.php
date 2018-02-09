<?php
//var_dump($data);
?>
<div class="box-body">
  <div class="row">
    <div class="col-xs-6">
      <div class="row">
        <div class="col-xs-12" style="margin-top: 7px;">
          Fecha del Servicio <label><?php $date = date_create($data['servicio']['srvFecha']); echo date_format($date, 'd-m-Y H:i');?></label>
        </div> 
      </div>
      <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-6">
      <div class="row">
        <div class="col-xs-7" style="margin-top: 7px;">
          <strong>Datos del Vehículo</strong>
        </div> 
      </div>
      <hr>
    </div>

    <div class="col-xs-6">
      <div class="row">
        <div class="col-xs-7" style="margin-top: 7px;">
          <strong>Datos del Cliente</strong>
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
          <label><?php echo $data['vehiculo']['vehPatente'];?></label>
        </div>
        <div class="col-xs-2" style="margin-top: 7px;">
          Marca:
        </div> 
        <div class="col-xs-4" style="margin-top: 7px;">
          <label><?php echo $data['vehiculo']['marDescripcion'];?></label>
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
          <label><?php echo $data['vehiculo']['cliente']['cliDocumento'];?></label>
        </div>
        <div class="col-xs-2" style="margin-top: 7px;">
          Cliente: 
        </div> 
        <div class="col-xs-6" style="margin-top: 7px;">
          <label><?php echo $data['vehiculo']['cliente']['cliApellido']. ' ' . $data['vehiculo']['cliente']['cliNombre'];?></label>
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
          <label><?php echo $data['vehiculo']['vehModelo'];?></label>
        </div>
        <div class="col-xs-2" style="margin-top: 7px;">
          Tipo: 
        </div> 
        <div class="col-xs-4" style="margin-top: 7px;">
          <label><?php echo $data['vehiculo']['tpvDescripcion'];?></label>
        </div>
      </div>
    </div>

    <div class="col-xs-6">
      <div class="row">
        <div class="col-xs-2" style="margin-top: 7px;">
          Teléfono: 
        </div> 
        <div class="col-xs-4" style="margin-top: 7px;">
          <label><?php echo $data['vehiculo']['cliente']['cliTelefono'];?></label>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6">
      <div class="row">
        <div class="col-xs-2" style="margin-top: 7px;">
          Kilometros:
        </div> 
        <div class="col-xs-4" style="margin-top: 7px;">
          <label><?php echo number_format($data['servicio']['srvKm'], 0, ",", ".");?></label>
        </div>
        <div class="col-xs-2" style="margin-top: 7px;">
          Próx Servicio:
        </div> 
        <div class="col-xs-4" style="margin-top: 7px;">
          <label><?php echo number_format($data['servicio']['srvKmProxService'], 0, ",", ".");?></label>
        </div>
      </div>
    </div>
  </div>
    <hr>

    <div class="row">
      <div class="col-xs-12">
        <table style="display: table;" class="table table-bordered" width="100%">
          <thead>
            <th>Descripción</th>
            <th style="width: 10%">Cantidad</th>
            <th style="width: 10%">Precio</th>
            <th style="width: 15%">Total</th>
          </thead>
          <tbody>
          <?php
          $importe = 0;
          foreach ($data['servicio']['detalle'] as $item) {
          	echo '<tr>';
          	echo '<td style="text-align:left">'.$item['artDescripcion'].'</td>';
          	echo '<td style="text-align:right">'.number_format($item['srvdCant'], 2, ",", ".").'</td>';
          	echo '<td style="text-align:right">'.number_format($item['artVenta'], 2, ",", ".").'</td>';
          	echo '<td style="text-align:right">'.number_format($item['artVenta'] * $item['srvdCant'], 2, ",", ".").'</td>';
          	echo '</tr>';
          	$importe += $item['artVenta'] * $item['srvdCant'];
          }
          ?>
          </tbody>
          <tfoot>
            <th colspan="3" style="text-align: right; padding-top: 15px;"> Total: </th>
            <th style="font-size:20px; text-align: right;">$ <label id="lblTotal"><?php echo number_format($importe, 2, ",", ".");?></label></th>
          </tfoot>
        </table>

      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        Mecánica Ligera:<br>
        <label><?php echo $data['servicio']['srvObservacion'];?></label>
      </div>
    </div>

</div>