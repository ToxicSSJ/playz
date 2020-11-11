<?php

namespace App\Lib;

use App\Order;
use PDF;

class InvoicePDF implements PlayZPDF
{

    public function generatePDF($id) {

        $order = Order::find($id);

        if($order == null) {
            return;
        }

        $items = $order->items();
        $pdf = PDF::loadView('pdf.order', ['order' => $order]);
        return $pdf->download('invoice.pdf');

    }
    
}