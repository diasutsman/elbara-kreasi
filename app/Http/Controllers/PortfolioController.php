<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('portfolios.index', [
            // 'portfolios' => Portfolio::paginate(10)->withQueryString(),
            // 'portfolios' => Portfolio::limit(20)->get(),
            'portfolios' => Portfolio::all(),
        ]);
    }
}
