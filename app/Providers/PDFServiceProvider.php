<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Lib\InvoicePDF;
use App\Lib\PlayZPDF;

class PDFServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('InvoicePDF', function () {
            return new InvoicePDF();
         });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
