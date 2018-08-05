@extends('admin.layout')
@section('content-header')
@endsection
@section('content')
<div class="row">
  @if(isset($data->chart))
  <div class="col-md-6">
    <!-- DONUT CHART -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">{{$data->chart->title}}</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  @endif
  @if(isset($data->boxes))
  <div class="col-md-6">
    <?php $x=0; ?>
    <div class="row">
    @foreach($data->boxes as $box)
    @if($x % 2 == 0)
    </div>
    <div class="row">
    @endif
    <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{$box->color}}">
            <div class="inner">
              <h3>{!!$box->count!!}</h3>
              <p>{{$box->title}}</p>
            </div>
            <div class="icon">
              <i class="{{$box->icon}}"></i>
            </div>
            <a href="{{$box->action}}" class="small-box-footer">Daha Fazla Bilgi <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php $x++ ?>
    @endforeach
  </div>
  </div>
  @endif
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">{{$data->table->title}}</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="MRBH" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="dt-center">Blockchain Hash</th>
              @foreach($data->table->columns as $column)
              <th class="dt-center">{{$column->label}}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @foreach($data->table->datas as $datax)
            <tr>
              <td class="dt-center">
                <a class="btn btn-flat btn-danger" onclick="bcshow('{{$datax->blockchain_hash}}')"><i class="fa fa-chain"></i></a>
              </td>
              @foreach($data->table->columns as $column)
              <td class="dt-center"><?=$datax->{$column->name}?></td>
              @endforeach
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th class="dt-center">Blockchain Hash</th>
              @foreach($data->table->columns as $column)
              <th class="dt-center">{{$column->label}}</th>
              @endforeach
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
<div class="modal fade" id="bchash">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Blockchain Anahtarını Görüntüle</h4>
         </div>
         <div class="modal-body">
            <div>
               <label>Blockchain Hash</label>
               <input class="form-control input-lg" type="text" disabled="" id="bc_input">
               <span class="help-block">Benzersiz Blockchain Anahtarınız Yukarıda Bulunmaktadır.</span>
            </div>
            </br>
            <blockquote>
               <p>Bir blok zinciri, veritabanındaki her bir kaydı temsil eden veri yapısıdır. Her hareket, gerçekliğini koruma altına almak adına dijital olarak imzalanır ve kimse bu kayda müdahale edemez.</p>
               <small>Blockchain Nedir ? </small>
            </blockquote>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kapat</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
@endsection
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Morris charts -->
<link rel="stylesheet" href="/lte/bower_components/morris.js/morris.css">
<style>
div.mini-box h3{
  font-size: 19.3px;
}
th.dt-center, td.dt-center { text-align: center; }
</style>
@endsection
@section('js')
<script src="/lte/bower_components/raphael/raphael.min.js"></script>
<script src="/lte/bower_components/morris.js/morris.min.js"></script>
<!-- Morris.js charts -->
<!-- DataTables -->
<script src="/lte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
@endsection
@section('js_code')
<script>
$('#MRBH').DataTable({
    "ordering": false,
    "scrollX": true,
		"autoWidth": false,
		"language": {
			"decimal":        "",
			"emptyTable":     "Bu tablo için kullanılabilir veri yok.",
			"info":           "_TOTAL_ kayıttan _START_ ile _END_ arası kayıt gösteriliyor.",
			"infoEmpty":      "0 kayıttan 0 kayıt gösteriliyor.",
			"infoFiltered":   "(_MAX_ veriden filtrelendi.)",
			"infoPostFix":    "",
			"thousands":      ",",
			"lengthMenu":     "Her sayfada _MENU_ kayıt gösteriliyor.",
			"loadingRecords": "Yükleniyor...",
			"processing":     "İşleniyor...",
			"search":         "Arama:",
			"zeroRecords":    "Eşleşen kayıt bulunamadı.",
			"paginate": {
				"first":      "İlk",
				"last":       "Son",
				"next":       "Sonraki",
				"previous":   "Önceki"
			},
			"aria": {
				"sortAscending":  ": artana göre kolon sıralaması aktif edildi.",
				"sortDescending": ": azalana göre kolon sıralaması aktif edildi."
			}
		}
  })
//DONUT CHART
@if(isset($data->chart))
var donut = new Morris.Donut({
  element: 'sales-chart',
  resize: true,
  colors: {!!$data->chart->json_color!!},
  data: {!!$data->chart->json!!},
  hideHover: 'auto'
});
@endif
</script>
<script type="text/javascript">
function bcshow(hash){
  $("#bc_input").val(hash)
  $("#bchash").modal()
}
</script>
@endsection
