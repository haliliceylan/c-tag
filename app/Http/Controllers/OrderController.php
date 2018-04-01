<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function action(Request $request)
    {
      $a = new Order();
      $a->fill($request->all());
      $a->save();
      return redirect("/ridvan/ordercomp.html");
    }
}
