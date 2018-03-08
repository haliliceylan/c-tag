<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QrCode;

class QRCodeController extends Controller
{
    public function form()
    {
        return view('admin.qrcode');
    }
    public function website(Request $request)
    {
        $content = QrCode::format('png')->size(500)->generate($request->url);
        return response($content)->header('Content-Type', 'image/png');
    }
    public function wifi(Request $request)
    {
        $data = [];
        if ($request->encrypt != '0') {
            $data['encryption'] = $request->encrypt;
            $data['password'] = $request->password;
        }
        $data['ssid'] = $request->ssid;
        if ($request->hidden == "on") {
            $data['hidden'] = 'true';
        }
        $content = QrCode::format('png')->size(500)->wiFi($data);
        return response($content)->header('Content-Type', 'image/png');
    }
}
