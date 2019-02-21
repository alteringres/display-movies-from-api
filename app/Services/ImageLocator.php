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
            return $this->fetchImage($title);
        }

        return Storage::disk('card_images')->get($title->getId());
    }

    public function fetchImage(Title $title)
    {
        $images = $title->getCardImages();
        for ($i=0; $i < count($images); $i++) {
            if (file_exists($images[$i]['url']) {
                if(false !== $image = file_get_contents($images[$i]['url'])) {
                    Storage::disk('card_images')->put($title->getId(), $image);
                    clearstatscache();
                    clearstatscache(true);

                    return Storage::disk('card_images')->get($title->getId())
                }
            }             
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
