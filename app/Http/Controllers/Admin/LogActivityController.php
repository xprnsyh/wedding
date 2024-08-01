<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogDB;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;

class LogActivityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.log.index');
    }

    public function data()
    {
        $model = LogDB::with('user')
            ->select([
                'created_at', 'ip',
                'event', 'extra',
                'user_id', 'method',
                'url', 'agent'
            ])
            ->latest();
        // ->take(10001)
        // ->get();

        return Datatables::eloquent($model)
            ->addColumn('created_at', function (LogDB $log) {
                return Carbon::parse($log->created_at)->format('d M Y H:i:s');
            })
            ->editColumn('ip', function (LogDB $log) {
                return $log->ip;
            })
            ->addColumn('user', function (LogDB $log) {
                return $log->user->name ?? '';
            })
            ->addColumn('event', function (LogDB $log) {
                return $log->event;
            })
            ->addColumn('extra', function (LogDB $log) {
                return $log->extra;
            })
            ->addColumn('method', function (LogDB $log) {
                return $log->method;
            })
            ->addColumn('url', function (LogDB $log) {
                return $log->url;
            })
            ->addColumn('agent', function (LogDB $log) {
                return $log->agent;
            })
            ->rawColumns(['ip'])
            ->toJson();
    }
}
