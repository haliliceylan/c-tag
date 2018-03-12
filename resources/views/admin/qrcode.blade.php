@extends('admin.layout')
@section('content-header')
@endsection
@section('content')
  <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#website" data-toggle="tab" aria-expanded="true">Website</a></li>
              <li class=""><a href="#wifi" data-toggle="tab" aria-expanded="false">Wi-Fi</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="website">
                <form role="form" action="{{route('admin.qrcode.website')}}" method="GET">
                  <!-- text input -->
                  <div class="form-group">
                    <label>URL</label>
                    <input name="url" type="text" class="form-control" placeholder="{{env('APP_URL')}}">
                  </div>
                  <button type="submit" class="btn btn-primary">Oluştur</button>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="wifi">
                <form role="form"  action="{{route('admin.qrcode.wifi')}}" method="GET">
                  <!-- text input -->
                  <div class="form-group">
                    <label>SSID</label>
                    <input name="ssid" type="text" class="form-control" placeholder="PeakLoop">
                  </div>
                  <!-- select -->
                  <div class="form-group">
                    <label>Güvenlik Tipi</label>
                    <select name="encrypt" class="form-control">
                      <option value="0">Yok</option>
                      <option value="WEP">WEP</option>
                      <option value="WPA">WPA/WPA2</option>
                    </select>
                  </div>
                  <!-- text input -->
                  <div class="form-group">
                    <label>Parola</label>
                    <input name="password" type="text" class="form-control" placeholder="Password">
                  </div>
                  <!-- checkbox -->
                  <div class="form-group">
                    <div class="checkbox">
                      <label>
                        <input name="hidden" type="checkbox">
                        Gizli Ağ
                      </label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Oluştur</button>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
@endsection
@section('js_code')
<script>
$("form").submit(function(){
  var w = window.open('about:blank','Popup_Window','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=500');
  this.target = 'Popup_Window';
});
</script>
@endsection
