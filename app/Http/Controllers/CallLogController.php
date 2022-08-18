<?php

namespace App\Http\Controllers;

use App\Models\CallLog;
use DateTime;
use Illuminate\Http\Request;

class CallLogController extends Controller
{
    public function view(){
        $call_logs = CallLog::latest()->get();
        return view('backend.call_logs_view',compact('call_logs'));
    }

    public function filetLogsByDate(Request $request){
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');

        if(!empty($formatDate) ){
            $call_logs = CallLog::where('date',$formatDate)->latest()->get();
            return view('backend.call_logs_view',compact('call_logs'));
        }
    }
}
