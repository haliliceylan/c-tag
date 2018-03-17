<?php

namespace App\Http\Controllers;

use App\ConnectionTag;
use Illuminate\Http\Request;
use App\Action;
use \DB;
use QrCode;
use Storage;

class ConnectionTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = (object)[
          'title' => 'Connection Tag Listesi',
          'columns' => [
            (object)['label' => 'ID','name' => 'ctag_id'],
            (object)['label' => 'Etkileşim Adresi','name' => 'action_url'],
          ],
          'datas' => ConnectionTag::all(),
        ];
        return view('admin.tag.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConnectionTag  $connectionTag
     * @return \Illuminate\Http\Response
     */
    public function show(ConnectionTag $connectionTag)
    {
        $lastTouchTime = $connectionTag->actions()->orderBy('created_at', 'desc')->first();
        $lastTouchTime = ($lastTouchTime == null) ? "- <br> -" : $lastTouchTime->created_at->format("d-m-Y")."<br>".$lastTouchTime->created_at->format("H:i:s");
        $platforms = $connectionTag->actions()->groupBy('platform_family')->select('platform_family', DB::raw('count(*) as count'))->get();
        $pf = [];
        $pf_color = ['#e6194b','#3cb44b','#ffe119','#0082c8','#f58231','#911eb4','#46f0f0','#f032e6','#d2f53c','#fabebe','#008080','#e6beff','#aa6e28','#fffac8','#800000','#aaffc3','#808000','#ffd8b1','#000080','#808080','#FFFFFF','#000000'];
        foreach ($platforms as $platform) {
            $pf[] = ['label' => $platform->platform_family,'value'=>$platform->count];
        }
        $data = (object) [
        'chart' => (object)[
          'title' => 'İşletim Sistemine Göre',
          'json' => json_encode($pf),
          'json_color' => json_encode($pf_color),
        ],
        'table' => (object)[
          'title' => 'Tüm Girişler',
          'columns' => (object) [
            (object)['name' => 'turkish_date', 'label' => 'Tarih'],
            (object)['name' => 'browser_name', 'label' => 'Tarayıcı Adı'],
            (object)['name' => 'browser_family', 'label' => 'Tarayıcı Ailesi'],
            (object)['name' => 'browser_version', 'label' => 'Tarayıcı Versiyon'],
            (object)['name' => 'browser_engine', 'label' => 'Tarayıcı Motoru'],
            (object)['name' => 'platform_name', 'label' => 'Platform İsmi'],
            (object)['name' => 'platform_family', 'label' => 'Platform Ailesi'],
            (object)['name' => 'platform_version', 'label' => 'Platform Version'],
            (object)['name' => 'device_family', 'label' => 'Cihaz Ailesi'],
            (object)['name' => 'device_model', 'label' => 'Cihaz Modeli'],
            (object)['name' => 'mobile_grade', 'label' => 'Mobil Puanı'],
            (object)['name' => 'ip_address', 'label' => 'Ip Adresi'],
            (object)['name' => 'coming_from', 'label' => 'Etkileşim Tipi'],
            (object)['name' => 'acceptable_country', 'label' => 'Kabul Edilen Dil ve Ülke'],
            (object)['name' => 'acceptable_country_flag', 'label' => 'Bayrak'],
          ],
          'datas' => $connectionTag->actions()->orderBy('created_at', 'desc')->get(),
        ],
        'boxes' => [
          (object)['color' => 'aqua mini-box','count' => $lastTouchTime,'icon' => 'ion ion-clock','title' => 'Son Etkileşim Zamanı','action' => route('admin.index')],
          (object)['color' => 'yellow','count' => Action::where('connection_tag_id', $connectionTag->id)->count(),'icon' => 'ion ion-flash','title' => 'Toplam Etkileşim Sayısı','action' => route('admin.index')],
          (object)['color' => 'red','count' => Action::where('connection_tag_id', $connectionTag->id)->where('platform_family', 'Android')->count(),'icon' => 'fa fa-android','title' => 'Android','action' => route('admin.index')],
          (object)['color' => 'green','count' => Action::where('connection_tag_id', $connectionTag->id)->where('platform_family', 'iOS')->count(),'icon' => 'fa fa-apple','title' => 'IOS','action' => route('admin.index')],
        ],
      ];
        return view('admin.analyze', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConnectionTag  $connectionTag
     * @return \Illuminate\Http\Response
     */
    public function edit(ConnectionTag $connectionTag)
    {
        return view('admin.tag.edit', ['tag' => $connectionTag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConnectionTag  $connectionTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConnectionTag $connectionTag)
    {
      if($connectionTag->action_url != $request->action_url){
          $this->reset($connectionTag);
      }
      $connectionTag->fill($request->all());
      $connectionTag->save();
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConnectionTag  $connectionTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConnectionTag $connectionTag)
    {
        //
    }

    public function reset(ConnectionTag $connectionTag)
    {
        $connectionTag->actions()->delete();
        return back();
    }

    public function qrcode(ConnectionTag $connectionTag){
      return response(QrCode::format('png')
      ->size(2000)
      ->errorCorrection('H')
      ->merge(Storage::path('logo.png'),.4,true)
      ->generate(route('tag_action',[$connectionTag->id,1])))
      ->header('Content-Type', 'image/png');
    }
}
