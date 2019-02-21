<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Movies;

class MovieController extends Controller
{
    public function index(Movies $movies, $page = 1)
    {
        $totalPages = $movies->countPages();
        $titles = $movies->getForPage($page);
        return view('movie/main', compact('titles', 'totalPages', 'page'));
    }
}
