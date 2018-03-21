<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content">
  <div class="row">
    <div class="col-xs-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Actualizar Precios Manual</h3>

        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="form-horizontal">

          <div class="form-group">
            <label for="subrId" class="control-label col-sm-4">Marca</label>
            <div class="col-sm-6">
              <select class="form-control" name="marcId" id="marcId">
                <option value=""></option>
                <?php foreach($brands as $key => $brand ):?>
                    <option value="<?php echo $brand['id']?>"><?php echo $brand['descripcion']?></option>
                  <?php endforeach;?>
              </select>
            </div>
          </div>

            <div class="form-group">
              <label for="rubId" class="control-label col-sm-4">Rubro</label>
              <div class="col-sm-6">
                <select class="form-control" name="rubId" id="rubId">
                  <option value=""></option>
                  <?php foreach($rubros as $key => $rubro ):?>
                    <option value="<?php echo $rubro['rubId']?>"><?php echo $rubro['rubDescripcion']?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>


          <div class="form-group">
            <label for="subrId" class="control-label col-sm-4">Sub Rubro</label>
            <div class="col-sm-6">
              <select class="form-control" name="subrId" id="subrId">
                <option value=""></option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="subrId" class="control-label col-sm-4">Es Procentaje</label>
            <div class="col-sm-6">
              <label class="radio-inline">
                <input type="checkbox" name="artMarginIsPorcent" id="artMarginIsPorcent" value="1" >
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="subrId" class="control-label col-sm-4">Importe a Actualizar</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="incrementValue" id="incrementValue" value="">
            </div>
          </div>

          <!--<button type="submit" name="bt_update" id="bt_update" class="btn btn-success pull-right"> Buscar </button>-->
          <button name="bt_buscar" id="bt_buscar" class="btn btn-success pull-right"> Buscar </button>
        </div>

        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->

    <div class="col-xs-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Actualizar Precios Con Archivo</h3>

        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="form-horizontal">
            <div class="form-group">
              <label for="fileXls" class="control-label col-sm-4">Seleccionar Archivo</label>
              <div class="col-sm-6">
                <input class="form-control" id="fileXls" type="file" accept="xls/*" name="fileXls">
              </div>
            </div>
          </div>

            <!--<button type="submit" name="bt_update" id="bt_update" class="btn btn-success pull-right"> Buscar </button>-->
            <button name="bt_buscar" id="bt_buscar_f" class="btn btn-success pull-right"> Buscar </button>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div><!-- /.row -->

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Artículos</h3>
        </div>

        <div class="box-body">
          <button name="bt_buscar" id="bt_update" class="btn btn-info pull-right" style="margin-bottom: 5px;"> Actualizar </button>
          <table id="articles__u" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="2%">Sel.</th>
                <th>Código</th>
                <th>Cód.Prov.</th>
                <th>Descripción</th>
                <th>PC Actual</th>
                <th>PV Actual</th>
                <th>PC Nuevo</th>
                <th>PV Nuevo</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>

<script type="text/javascript">
  $(function(){

    $("#incrementValue").maskMoney({allowNegative: true, thousands:'', decimal:'.'});


    $("#rubId").on('change',function(){
      var rubId=$(this).val();
      WaitingOpen('Cargando Subrubro');
        $.ajax({
              method: 'GET',
              data: { rubId : rubId},
              url: 'index.php/rubro/getSubRubro_by_rubro',
              success: function(result){
                 WaitingClose();
                 $("#subrId").empty();
                 var output ='<option value=""> Seleccione SubRubro</option>';
                 $.each(result,function(index,item){
                   output +='<option value="'+item.subrId+'"> '+item.subrDescripcion+'</option>';
                 });
                 $("#subrId").html(output);
               },
               error: function(result){
                 WaitingClose();
                 ProcesarError(result.responseText, 'modalRubro');
              },
              dataType: 'json'
          });
    });

    $('#bt_buscar').click(function(){
      if($('#incrementValue').val() != ''){
        if( $('#marcId').val() == '' && 
            $('#rubId').val() == '' &&
            $('#subrId').val() == ''
          ){
          return;
        } else {
          WaitingOpen('Buscando');
          $('#articles__u > tbody').html('');
          $.ajax({
              method: 'POST',
              data:{
                  mar: $('#marcId').val(),
                  rub: $('#rubId').val(),
                  sub: $('#subrId').val()
              },
              url: 'index.php/article/get_for_update_prices_by_rubro',
              success: function(result){
                if(result == false)
                  WaitingClose();
                else{
                        var rows = '';
                        var nuevoCosto;
                        $.each(result, function(key, obj){
                            rows += '<tr>';
                            rows += '<td style="text-align: center"><input type="checkbox" value="'+obj['artId']+'" checked></td>';
                            rows += '<td>' + obj['artBarCode'] + '</td>';
                            rows += '<td>' + obj['artProvCode'] + '</td>';
                            rows += '<td>' + obj['artDescription'] + '</td>';
                            rows += '<td style="text-align: right">' + obj['artCoste'] + '</td>';
                            rows += '<td style="text-align: right">' + parseFloat(calcula(obj['artCoste'], obj['artMarginIsPorcent'], obj['artMargin'])).toFixed(2) + '</td>';
                            nuevoCosto = parseFloat(obj['artCoste']);
                            if($('#artMarginIsPorcent').is(":checked")){
                              nuevoCosto += nuevoCosto * (parseFloat($('#incrementValue').val()) / 100);
                            } else {
                              nuevoCosto += parseFloat($('#incrementValue').val());
                            }
                            rows += '<td style="text-align: right">' + parseFloat(nuevoCosto).toFixed(2) + '</td>';
                            rows += '<td style="text-align: right">' + parseFloat(calcula(nuevoCosto, obj['artMarginIsPorcent'], obj['artMargin'])).toFixed(2) + '</td>';
                            rows += '</tr>';
                        });
                        $('#articles__u > tbody').html(rows);
                        WaitingClose();
                 //setTimeout("cargarView('rubro', 'upgrate', '"+$('#permission').val()+"');",1000);
                }
               },
               error: function(result){
                 WaitingClose();
                 ProcesarError(result.responseText, 'modalRubro');
              },
              dataType: 'json'
          });
        }
      }else{
        return;
      }
    });

  });

function calcula(coste, isPorcent, margin){
  if(isPorcent == true){
    return parseFloat(coste) + parseFloat(coste * (margin / 100)); 
  } else {
    return parseFloat(coste) + parseFloat(margin);
  }
}

$('#bt_update').click(function(){
  var detail = [];
      $('#articles__u > tbody > tr').each(function() {

        debugger;
        var checkbox = this.children[0].firstElementChild;
        if(checkbox.checked){
          detail.push(
                      {
                        id:     checkbox.value,
                        coste:  parseFloat(this.children[6].innerHTML).toFixed(2)
                      }
                      );
        }
      });
  if(detail.length > 0){
      WaitingOpen('Actualizando');
        $.ajax({
              method: 'POST',
              data:{
                arts: detail
              },
              url: 'index.php/article/update_prices_by_rubro',
              success: function(result){
                WaitingClose();     
                setTimeout("cargarView('rubro', 'upgrate', '"+$('#permission').val()+"');",1000);          
               },
               error: function(result){
                 WaitingClose();
                 ProcesarError(result.responseText, 'modalRubro');
              },
              dataType: 'json'
          });
    }else{
      return;
    }
  });

  $('#bt_buscar_f').click(function(){
    WaitingOpen("Cargando Archivo");
    setTimeout("ExportToTable();",1000);
  });

  function ExportToTable() {  
    $('#articles__u > tbody').html('');
     var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;  
     /*Checks whether the file is a valid excel file*/  
     if (regex.test($("#fileXls").val().toLowerCase())) {  
         var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/  
         if ($("#fileXls").val().toLowerCase().indexOf(".xlsx") > 0) {  
             xlsxflag = true;  
         }  
         /*Checks whether the browser supports HTML5*/  
         if (typeof (FileReader) != "undefined") {  
             var reader = new FileReader();  
             reader.onload = function (e) {  
                 var data = e.target.result;  
                 /*Converts the excel data in to object*/  
                 if (xlsxflag) {  
                     var workbook = XLSX.read(data, { type: 'binary' });  
                 }  
                 else {  
                     var workbook = XLS.read(data, { type: 'binary' });  
                 }  
                 /*Gets all the sheetnames of excel in to a variable*/  
                 var sheet_name_list = workbook.SheetNames;  
  
                 var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/  
                 sheet_name_list.forEach(function (y) { /*Iterate through all sheets*/  
                     /*Convert the cell value to Json*/  
                     if (xlsxflag) {  
                         var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);  
                     }  
                     else {  
                         var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);  
                     }  
                     if (exceljson.length > 0 && cnt == 0) { 
                         //BindTable(exceljson, '#exceltable'); 
                         WaitingOpen("Procesando Artículos"); 
                         cnt++;  
                         /*+++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
                         $.ajax({
                              method: 'POST',
                              data:{
                                json: exceljson
                              },
                              url: 'index.php/article/get_for_update_prices_by_file',
                              success: function(result){
                                if(result == false)
                                    WaitingClose();
                                  else{
                                          var rows = '';
                                          var nuevoCosto;
                                          $.each(result, function(key, obj){
                                              rows += '<tr>';
                                              rows += '<td style="text-align: center"><input type="checkbox" value="'+obj['artId']+'" checked></td>';
                                              rows += '<td>' + obj['artBarCode'] + '</td>';
                                              rows += '<td>' + obj['artProvCode'] + '</td>';
                                              rows += '<td>' + obj['artDescription'] + '</td>';
                                              rows += '<td style="text-align: right">' + obj['artCoste'] + '</td>';
                                              rows += '<td style="text-align: right">' + parseFloat(calcula(obj['artCoste'], obj['artMarginIsPorcent'], obj['artMargin'])).toFixed(2) + '</td>';
                                              nuevoCosto = parseFloat(obj['costo']);
                                              rows += '<td style="text-align: right">' + parseFloat(nuevoCosto).toFixed(2) + '</td>';
                                              rows += '<td style="text-align: right">' + parseFloat(calcula(nuevoCosto, obj['artMarginIsPorcent'], obj['artMargin'])).toFixed(2) + '</td>';
                                              rows += '</tr>';
                                          });
                                          $('#articles__u > tbody').html(rows);
                                          WaitingClose();
                                  }       
                               },
                               error: function(result){
                                 WaitingClose();
                                 ProcesarError(result.responseText, 'modalRubro');
                              },
                              dataType: 'json'
                          });
                          /*+++++++++++++++++++++++++++++++++*/
                     }  else {
                      WaitingClose();
                     }
                 });  
                 //$('#exceltable').show();  
             }  
             if (xlsxflag) {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/  
                 reader.readAsArrayBuffer($("#fileXls")[0].files[0]);  
             }  
             else {  
                 reader.readAsBinaryString($("#fileXls")[0].files[0]);  
             }  
         }  
         else {  
             alert("Tu Navegador no soporta HTML5!"); 
             WaitingClose(); 
         }  
     }  
     else {  
         alert("Por Favor Subir un Archivo Excel Valido");  
         WaitingClose();
     }  
  }

</script>
