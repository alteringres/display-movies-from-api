<?php
namespace App\Repository;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use \ForceUTF8\Encoding;
use App\Entities\Title;
use App\Exceptions\InvalidDataFormat;
use App\Exceptions\InvalidTitleException;

/**
 * Movies repository
 **/
class Movies
{
    /**
    *   $client Client
    */
    private $client;
    const URL = 'https://mgtechtest.blob.core.windows.net/files/showcase.json';
    const EXPIRE = 10*60;
    const ALL_MOVIES_CACHE_KEY = 'all-movies';
    const ITEMS_PER_PAGE = 10; //todo: it should be sent as a param or be in some config

    public function __construct() 
    {
        $this->client = new Client(['base_uri' =>'']);
    }
    /**
     * @return Title[]
     */
    public function getAll()
    {
        $movies = Cache::get(static::ALL_MOVIES_CACHE_KEY);
        try {
            if (empty($movies)) {
                $results = $this->client->get(static::URL)->getBody()->getContents();
                $stringData = Encoding::fixUTF8($results);
                $movies = json_decode($stringData, true);
                Log::info('movies requested');
                Cache::put(static::ALL_MOVIES_CACHE_KEY, $movies, static::EXPIRE);
            }
        }catch (\Exception $ex) {
            Log::info($ex->getMessage());
            return collect([]);
        }
        return collect($movies)->map(function($title) {
            if (is_array($title)) {
                return new Title($title);
            }
            throw new InvalidDataFormat();
        });
    }
    
    public function getForPage(int $page)
    {
        $currentPage = $page > $this->countPages() ? 1 : $page;
        return $this->getAll()
            ->slice(($currentPage - 1) * static::ITEMS_PER_PAGE)->values()
            ->take(static::ITEMS_PER_PAGE);
    }

    public function countPages()
    {
        return ceil($this->getAll()->count() / static::ITEMS_PER_PAGE);
            
    }

    public function findById($id)
    {
        $title = $this->getAll()->filter( function($title) use ($id) {
            return $title->getId() == $id;
        }
        )->first();
        if (!($title instanceof Title)) {
            Cache::forget(static::ALL_MOVIES_CACHE_KEY);
            $title = $this->getAll()->filter( function($title) use ($id) {
                return $title->getId() == $id;
            }
            )->first();
        }
        if (!($title instanceof Title)) {
            throw new InvalidTitleException($id);
        }
        return $title;
    }
}