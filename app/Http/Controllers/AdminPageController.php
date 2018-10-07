<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action;
use App\ConnectionTag;
use \DB;
use Sentinel;

class AdminPageController extends Controller
{
    public function index()
    {
        $platforms = Action::groupBy('platform_family')->select('platform_family', DB::raw('count(*) as count'))->get();
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
              (object)['name' => 'ctag_id', 'label' => 'C-tag ID'],
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
            'datas' => Action::orderBy('created_at', 'desc')->get(),
          ],
          'boxes' => [
            (object)['color' => 'aqua','count' => ConnectionTag::count(),'icon' => 'ion ion-pricetags','title' => 'Toplam Tag Sayısı','action' => route('admin.index')],
            (object)['color' => 'yellow','count' => Action::count(),'icon' => 'ion ion-flash','title' => 'Toplam Etkileşim Sayısı','action' => route('admin.index')],
            (object)['color' => 'red','count' => Action::where('platform_family', 'Android')->count(),'icon' => 'fa fa-android','title' => 'Android','action' => route('admin.index')],
            (object)['color' => 'green','count' => Action::where('platform_family', 'iOS')->count(),'icon' => 'fa fa-apple','title' => 'IOS','action' => route('admin.index')],
          ],
        ];
        return view('admin.analyze', compact('data'));
    }

    public function login()
    {
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        $credintials = [
          'email'    => $request->email,
          'password' => $request->password,
        ];
        if (Sentinel::authenticate($credintials)) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Sentinel::logout();
        return redirect()->route('admin.login');
    }
}
