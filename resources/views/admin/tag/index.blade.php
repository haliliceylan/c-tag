@extends('admin.layout')
@section('content-header')
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">{{$table->title}}</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="MRBH" class="table table-bordered table-striped">
          <thead>
            <tr>
              @foreach($table->columns as $column)
              <th>{{$column->label}}</th>
              @endforeach
              <th>Aksiyonlar</th>
            </tr>
          </thead>
          <tbody>
            @foreach($table->datas as $datax)
            <tr>
              @foreach($table->columns as $column)
              <td><?=$datax->{$column->name}?></td>
              @endforeach
              <td>
                <a class="btn btn-flat btn-info" href="{{route('admin.tag.show',$datax->id)}}"><i class="fa fa-area-chart"></i></a>
                <a class="btn btn-flat btn-warning" href="{{route('admin.tag.edit',$datax->id)}}"><i class="fa fa-edit"></i></a>
                <a class="btn btn-flat btn-primary" href="{{route('admin.tag.qrcode',$datax->id)}}" onclick="qrcode(this.href);return false"><i class="fa fa-qrcode"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              @foreach($table->columns as $column)
              <th>{{$column->label}}</th>
              @endforeach
              <th>Aksiyonlar</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
@endsection
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection
@section('js')
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
</script>
<script>
function qrcode(url){
  window.open(url,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=500,height=500')
}
</script>
@endsection
