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
      <input type="text" class="form-control" id="carPatente" value="<?php echo $data['car']['vehiculo']['vehPatente'];?>" >
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
        foreach ($data['brand'] as $b) {
          echo '<option value="'.$b['marId'].'" '.($data['car']['vehiculo']['marId'] == $b['marId'] ? "selected": "").'>'.$b['marDescripcion'].'</option>';
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
      <input type="text" class="form-control" id="carModelo" value="<?php echo $data['car']['vehiculo']['vehModelo'];?>" maxlength="50">
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
        foreach ($data['types'] as $t) {
          echo '<option value="'.$t['tpvId'].'" '.($data['car']['vehiculo']['tpvId'] == $t['tpvId'] ? "selected": "").'>'.$t['tpvDescripcion'].'</option>';
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
      <input type="text" class="form-control" id="carMovil" value="<?php echo $data['car']['vehiculo']['vehMovil'];?>" maxlength="50">
    </div>
  </div>
</div>      