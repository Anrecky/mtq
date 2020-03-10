<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Documents;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $participants = User::Participant();
        $by_status = $participants->get()->groupBy('status');
        $daily_new = $participants->newest()->paginate(10, ['*'], 'peserta-terbaru');
        $latest_docs = Documents::Latest()->paginate(8, ['*'], 'dokumen-terbaru');
        $status_opts = User::$options;

        return view('admin.index', [
            'participants' => $participants,
            'daily_new' => $daily_new,
            'by_status' => $by_status,
            'latest_docs' => $latest_docs,
            's_opts' => $status_opts
        ]);
    }
}
