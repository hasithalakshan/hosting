<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function webHosting(Request $request)
    {
        return view('services/webHosting');
    }

    public function fileExchange(Request $request)
    {
        return view('services/fileExchange');
    }

    public function performanceOptimization(Request $request)
    {
        return view('services/performanceOptimization');
    }

    public function sslCertification(Request $request)
    {
        return view('services/sslCertificate');
    }

    public function technicalServices(Request $request)
    {
        return view('services/technicalServices');
    }

    public function vpsServer(Request $request)
    {
        return view('services/vpsServer');
    }
}
