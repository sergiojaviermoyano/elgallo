<div class="row">
	<div class="col-xs-2" style="margin-top: 7px; text-align: right;">
    	<label>Producto</label>
	</div>
	<div class="col-xs-6">
        <input type="hidden" class="form-control" id="prodIdAsoc">
        <input type="text" class="form-control" id="lblProductoAsoc">
    </div>
    <div class="col-xs-2">
        <input type="text" class="form-control" placeholder="Cantidad" id="prodCantAsoc">
    </div>
    <div class="col-xs-1">
        <button class="btn btn-block btn-success" id="btnAddArticlesAsoc">  <i class="fa fa-fw fa-check"></i></button>
    </div>
</div><br>
<table style="display: table;" class="table table-bordered" width="100%">
  <thead>
    <th style="width: 5%"></th>
    <th style="width: 15%">Código</th>
    <th>Descripción</th>
    <th style="width: 10%">Cantidad</th>
    <th style="width: 10%">Precio</th>
    <th style="width: 5%"></th>
  </thead>
  <tbody>
  <?php
  	foreach ($data['articles'] as $art) {
  		echo '<tr>';
  		echo '<td style="text-align: center; cursor: pointer;" onClick="addRelationalArticle('.$art['artId'].', \''.$art['artDescription'].'\', '.$art['vehartCant'].')"><i class="fa fa-fw fa-check-square" style="color: #00a65a;"></i></td>';
  		echo '<td>'.$art['artBarCode'].'</td>';
  		echo '<td>'.$art['artDescription'].'</td>';
  		echo '<td style="text-align: right">'.$art['vehartCant'].'</td>';
  		echo '<td style="text-align: right"> $ '.number_format($art['precio'], 2).'</td>';
  		echo '<td style="text-align: center; cursor: pointer;" onClick="removeRelationalArticle('.$art['artId'].')"><i class="fa fa-fw fa-close" style="color: #dd4b39"></i></td>';
  		echo '</tr>';
  	}
  ?>
  </tbody>
</table>
<script>

$('#lblProductoAsoc').keyup(function(e){
  var code = e.which; 
  if(code==13){
    e.preventDefault();
    BuscarCompletoAsoc();
  }
});

$('#prodCantAsoc').keyup(function(e) {
  var code = e.which; 
  if(code==13){
    if(parseFloat($('#prodCantAsoc').val()) > 0){
      $('#btnAddArticlesAsoc').focus();
    }
  }
});

$('#btnAddArticlesAsoc').click(function(){
  AddToAsociateArticles();
});
</script>