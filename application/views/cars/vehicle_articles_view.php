<table style="display: table;" class="table table-bordered" width="100%">
  <thead>
    <th style="width: 5%"></th>
    <th style="width: 20%" colspan="2">Código</th>
    <th>Descripción</th>
    <th style="width: 10%">Cantidad</th>
  </thead>
  <tbody>
  <?php
  	foreach ($data['articles'] as $art) {
  		echo '<tr>';
  		echo '<td style="text-align: center;"><i class="fa fa-fw fa-check-square" style="color: #00a65a;"></i></td>';
  		echo '<td>'.$art['artBarCode'].'</td>';
      echo '<td>'.$art['artProvCode'].'</td>';
  		echo '<td>'.$art['artDescription'].'</td>';
  		echo '<td style="text-align: right">'.$art['vehartCant'].'</td>';
  		echo '</tr>';
  	}
  ?>
  </tbody>
</table>