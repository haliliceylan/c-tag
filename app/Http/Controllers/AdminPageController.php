<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action;
use App\ConnectionTag;
use \DB;
class AdminPageController extends Controller
{
    public function index()
    {
        $platforms = Action::groupBy('platform_family')->select('platform_family', DB::raw('count(*) as count'))->get();
        $pf = [];
        foreach ($platforms as $platform) {
            $pf[] = ['label' => $platform->platform_family,'value'=>$platform->count];
        }
        $data = (object) [
          'chart' => (object)[
            'title' => 'İşletim Sistemine Göre',
            'json' => json_encode($pf),
          ],
          'table' => (object)[
            'title' => 'Tüm Girişler',
            'columns' => (object) [
              (object)['name' => 'created_at', 'label' => 'Tarih'],
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
            ],
            'datas' => Action::orderBy('created_at','desc')->get(),
          ],
          'boxes' => [
            (object)['color' => 'aqua','count' => ConnectionTag::count(),'icon' => 'ion ion-pricetags','title' => 'Toplam Tag Sayısı','action' => route('admin.dashboard')],
            (object)['color' => 'yellow','count' => Action::count(),'icon' => 'ion ion-flash','title' => 'Toplam Etkileşim Sayısı','action' => route('admin.dashboard')],
            (object)['color' => 'red','count' => Action::where('platform_family','Android')->count(),'icon' => 'fa fa-android','title' => 'Android','action' => route('admin.dashboard')],
            (object)['color' => 'green','count' => Action::where('platform_family','iOS')->count(),'icon' => 'fa fa-apple','title' => 'IOS','action' => route('admin.dashboard')],
          ],
        ];
        return view('admin.analyze', compact('data'));
    }
}
