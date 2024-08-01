<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Request;
use App\Models\LogDB;


class LogActivity
{


    public static function addToLog($extra, $event)
    {
    	$log = [];
    	$log['extra'] = $extra;
    	$log['event'] = $event;
    	$log['ip'] = Request::ip();
		$log['agent'] = Request::header('user-agent');
		$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['user_id'] = auth()->check() ? auth()->user()->id : null;
    	LogDB::create($log);
    }


    public static function logActivityLists()
    {
    	return LogDB::latest()->get();
    }


}