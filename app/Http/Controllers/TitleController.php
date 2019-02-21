<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Movies;
use App\Exceptions\InvalidTitleException;

class TitleController extends Controller
{
    public function index(Movies $movies, $id)
    {
        try {
            $title = $movies->findById($id);
        } catch (InvalidTitleException $e ) {
           return back();
        }
        return view('title.main', compact('title'));
    }
}
