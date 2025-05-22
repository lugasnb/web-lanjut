<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Karyawan;

class PageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() 
    { 
        $totalCustomers = Customer::count(); 
        $totalKaryawans = Karyawan::count(); 
         
        return view('dashboard.index', compact(
            'totalCustomers',
            'totalKaryawans'
        )); 
    }
}