@extends('admin.layout')
@section('content-header')
@endsection
@section('content')
<div class="row">
  <div class="col-md-offset-2 col-md-8 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$tag->actions()->count()}}</h3>

              <p>Etkileşim Sayısı</p>
            </div>
            <div class="icon">
              <i class="ion ion-flash"></i>
            </div>
              </div>
        </div>
  <div class="col-md-offset-2 col-md-8 col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Tag Düzenle</h3>
      </div>
      <!-- /.box-header -->
      <form role="form" method="POST" action="{{route('admin.tag.update',$tag->id)}}">
        {!!method_field('PATCH')!!}
        {!!csrf_field()!!}
        <div class="box-body">
          <div class="form-group">
            <label>ID</label>
            <input type="text" class="form-control" value="{{$tag->id}}" disabled>
          </div>
          <div class="form-group">
            <label>Hedef URL</label>
            <input name="action_url" type="text" class="form-control" value="{{$tag->action_url}}">
          </div>
        </div>
        <div class="box-footer">
          <a href="{{route('admin.tag.index')}}" class="btn btn-default">Geri</a>
          <a href="{{route('admin.tag.reset',$tag->id)}}"class="btn btn-warning">Etkileşimleri Sıfırla</a>
          <button type="submit" class="btn btn-info pull-right">Uygula</button>
        </div>
      </form>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
@endsection
