<?php

namespace App\Http\Controllers\Api;

use App\Events\BarangaySosAlertEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportIncidentController extends Controller
{
    
    public function test(Request $request) {
        event(new BarangaySosAlertEvent("Sample Message", 1));

        return 'okay';
    }
}
