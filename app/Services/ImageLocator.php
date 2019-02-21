<?php
namespace App\Services;

use App\Entities\Title;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\NoImageAvailableException;

class ImageLocator
{
    public function for(Title $title)
    {
        if(!Storage::disk('card_images')->exists($title->getId())) {
            $this->fetchImage($title);
        }
        // dd('works');
        return Storage::disk('card_images')->get($title->getId());
    }

    public function fetchImage(Title $title)
    {
        $images = $title->getCardImages();
        $trys = 3;
        while($trys-- >0){
            for ($i=0; $i < count($images); $i++) {
                if($image = file_get_contents($images[$i]['url'])) {
                    Storage::disk('card_images')->put($title->getId(), $image);
                    break;
                }
                usleep(250000);
            }
            if (Storage::disk('card_images')->exists($title->getId())) {
                break;
            }
            sleep(5); //just in case, double pause between tries.
        }
        throw new NoImageAvailableException();
    }
    public function getMimeType(Title $title)
    {
        if(!Storage::disk('card_images')->exists($title->getId())) {
            $this->fetchImage($title);
        }
        return Storage::disk('card_images')->mimeType($title->getId());
    }
}