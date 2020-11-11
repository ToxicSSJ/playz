<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use PDF;

class OrderController extends Controller
{

    public function generatePDF($id){

        $order = Order::find($id);

        if($order == null) {
            return;
        }

        $items = $order->items();
        $pdf = PDF::loadView('pdf.order', ['order' => $order]);
        return $pdf->download('invoice.pdf');

    }

}
