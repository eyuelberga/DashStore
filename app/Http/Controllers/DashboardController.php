<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->is_admin) {
            $total_stores = Store::count();
            $active_stores = Store::where('active', true)->count();
            $admins = User::where('is_admin', true)->count();
            $clients = User::where('is_admin', false)->count();
            return view("dashboard")->with([
                'total_stores'=>$total_stores,
                'active_stores'=>$active_stores,
                'admins'=>$admins,
                'clients'=>$clients
            ]);
        }
        return view("dashboard");
    }

    public function switch_view()
    {
        session()->put('client_view', session()->get('client_view') ? false : true);
        return redirect()->route('dashboard');
    }
}
