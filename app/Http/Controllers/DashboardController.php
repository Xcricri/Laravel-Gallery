<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        $latestGalleries = Gallery::latest()->paginate(10);
        return view('dashboard', compact('latestGalleries'));
    }
}
