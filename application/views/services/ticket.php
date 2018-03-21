<?php
$ticket = $data['servicio']['ticket'][0];
//var_dump($ticket);
?>
<input type="hidden" id="idSrv_" value="<?php echo $ticket['srvId'];?>">
        <div class="row">
          <div class="col-xs-6">
            <!--Lubricentro -->
            <label>Lubricentro</label><br>
            <table style="display: table;" class="table table-bordered" width="100%">
              <tr>
                <td width="50%" style="vertical-align:middle">Aceite/Motor</td>
                <td style="vertical-align:middle">
                  <div class="row">
                    <div class="col-xs-1" >
                      <input type="checkbox" id="acMotor" <?php echo $ticket['acMotor'] == 1 ? 'checked' : '';?> style="margin-top: 12px">
                    </div>
                    <div class="col-xs-6">
                      <input type="text" id="acNombre" placeholder="Nombre" class="form-control" value="<?php echo $ticket['acNombre'];?>">
                    </div>
                    <div class="col-xs-4">
                      <input type="text" id="acLitros" placeholder="Litros" class="form-control" value="<?php echo $ticket['acLitros'];?>">
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Filtro/Aire</td>
                <td><input type="checkbox" id="fAire" <?php echo $ticket['fAire'] == 1 ? 'checked' : '';?>></td>
              </tr>
              <tr>
                <td>Filtro/Aceite</td>
                <td><input type="checkbox" id="fAceite" <?php echo $ticket['fAceite'] == 1 ? 'checked' : '';?>></td>
              </tr>
              <tr>
                <td>Filtro/Combustible</td>
                <td><input type="checkbox" id="fCombustible" <?php echo $ticket['fCombustible'] == 1 ? 'checked' : '';?>></td>
              </tr>
              <tr>
                <td>Filtro/Habitáculo</td>
                <td><input type="checkbox" id="fHabitaculo" <?php echo $ticket['fHabitaculo'] == 1 ? 'checked' : '';?>></td>
              </tr>
              <tr>
                <td>Agregado de Agua</td>
                <td><input type="checkbox" id="agAgua" <?php echo $ticket['agAgua'] == 1 ? 'checked' : '';?>></td>
              </tr>
              <tr>
                <td>Cambio/Agua y Aditivo</td>
                <td><input type="checkbox" id="cAgua" <?php echo $ticket['cAgua'] == 1 ? 'checked' : '';?>></td>
              </tr>
              <tr>
                <td>Agregado/Liquido de Freno</td>
                <td><input type="checkbox" id="aLiquiFre" <?php echo $ticket['aLiquiFre'] == 1 ? 'checked' : '';?>></td>
              </tr>
              <tr>
                <td>Aditivo de Aceite</td>
                <td><input type="checkbox" id="aditivoAceite" <?php echo $ticket['aditivoAceite'] == 1 ? 'checked' : '';?>></td>
              </tr>
              <tr>
                <td>Agregado/Aceite Hidráulico</td>
                <td><input type="checkbox" id="aHidraulico" <?php echo $ticket['aHidraulico'] == 1 ? 'checked' : '';?>></td>
              </tr>
              <tr>
                <td>Agregado Liquido Limpia Parabrisas</td>
                <td><input type="checkbox" id="aLiquidoParabrisa" <?php echo $ticket['aLiquidoParabrisa'] == 1 ? 'checked' : '';?>></td>
              </tr>
              <tr>
                <td>Cambio/Aceite Hiráulico</td>
                <td><input type="checkbox" id="cAceiteHidraulico" <?php echo $ticket['cAceiteHidraulico'] == 1 ? 'checked' : '';?>></td>
              </tr>
              <tr>
                <td style="vertical-align:middle">Aceite/Transmisión</td>
                <td>
                  <table style="display: table;" class="table table-bordered" width="100%">
                    <tr>
                      <td style="vertical-align:middle">Caja</td>
                      <td style="vertical-align:middle"><input type="checkbox" id="aTransCaja" <?php echo $ticket['aTransCaja'] == 1 ? 'checked' : '';?>></td>
                      <td><input type="text" id="aTransCajaLitros" placeholder="Litros" class="form-control" value="<?php echo $ticket['aTransCajaLitros'];?>"></td>
                    </tr>
                    <tr>
                      <td style="vertical-align:middle">Diferencial</td>
                      <td style="vertical-align:middle"><input type="checkbox" id="aDifer" <?php echo $ticket['aDifer'] == 1 ? 'checked' : '';?>></td>
                      <td><input type="text" id="aDiferLitros" placeholder="Litros" class="form-control" value="<?php echo $ticket['aDiferLitros'];?>"></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

          </div>

          <!--Lavadero -->
          <div class="col-xs-6">
            <label>Lavadero</label>
            <table style="display: table;" class="table table-bordered" width="100%">
              <tr>
                <td width="50%">Lavado</td>
                <td><input type="checkbox" id="lavado" <?php echo $ticket['lavado'] == 1 ? 'checked' : '';?>></td>
              </tr>
              <tr>
                <td>Lavado con Motor</td>
                <td><input type="checkbox" id="lavadoCmotor" <?php echo $ticket['lavadoConMotor'] == 1 ? 'checked' : '';?>></td>
              </tr>
              <tr>
                <td>Lavado Motor</td>
                <td><input type="checkbox" id="lavadoMotor" <?php echo $ticket['lavadoMotor'] == 1 ? 'checked' : '';?>></td>
              </tr>
              <tr>
                <td>Pulido</td>
                <td><input type="checkbox" id="pulido" <?php echo $ticket['pulido'] == 1 ? 'checked' : '';?>></td>
              </tr>
            </table> <br>

            <label>Mecanica</label><br>

            Otros<br>
            <textarea class="form-control" id="otros"><?php echo $ticket['otros'];?></textarea>

          </div>
        </div>