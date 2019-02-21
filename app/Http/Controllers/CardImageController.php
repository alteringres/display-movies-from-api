<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Movies;
use App\Services\ImageLocator;
use App\Exceptions\NoImageAvailableException;


class CardImageController extends Controller
{
    public function index(Movies $movies, ImageLocator $locator, $imageId) {
        $title = $movies->findById($imageId);
        try {
            $imageContent = $locator->for($title);
            $mimeType =  $locator->getMimeType($title);
            $response = response()->make($imageContent, 200);

        } catch (NoImageAvailableException $e) {
            $imageContent = file_get_contents('./images/default.jpg');
            $mimeType = "image/jpg";

            $response = response()->make($imageContent, 404);
        }
        $response->header("Content-Type", $mimeType);
        return $response;
    }
}
