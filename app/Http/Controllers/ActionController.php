<?php

namespace App\Http\Controllers;

use App\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function show(Action $action)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function edit(Action $action)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Action $action)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function destroy(Action $action)
    {
        //
    }

    public function showByUser(Request $request){
        $lastTouchTime = Action::where('user_id',$request->query('user_id'))->orderBy('created_at', 'desc')->first();
        $lastTouchTime = ($lastTouchTime == null) ? "- <br> -" : $lastTouchTime->created_at->format("d-m-Y")."<br>".$lastTouchTime->created_at->format("H:i:s");
        $data = (object) [
        'table' => (object)[
          'title' => 'Tüm Girişler',
          'columns' => (object) [
            (object)['name' => 'turkish_date', 'label' => 'Tarih'],
            (object)['name' => 'ctag_id', 'label' => 'C-tag ID'],
            (object)['name' => 'ip_address', 'label' => 'Ip Adresi'],
            (object)['name' => 'coming_from', 'label' => 'Etkileşim Tipi'],
          ],
          'datas' => Action::where('user_id',$request->query('user_id'))->orderBy('created_at', 'desc')->get(),
        ],
        'boxes' => [
          (object)['color' => 'aqua mini-box','count' => $lastTouchTime,'icon' => 'ion ion-clock','title' => 'Son Etkileşim Zamanı','action' => route('admin.index')],
          (object)['color' => 'yellow','count' => Action::where('user_id',$request->query('user_id'))->count(),'icon' => 'ion ion-flash','title' => 'Toplam Etkileşim Sayısı','action' => route('admin.index')],
        ],
      ];
        return view('admin.analyze', compact('data'));
    }
}
