<?php

namespace App\Entities;

use App\Presenters\PresentableInterface;
use App\Presenters\PresentableTrait;
use App\Presenters\TitlePresenter;

class Title implements PresentableInterface
{
    use PresentableTrait;

    protected $presenter = TitlePresenter::class;

    private $id;
    private $body;
    private $cast;
    private $cert;
    private $class;
    private $lastUpdated;
    private $reviewAuthor;
    private $skyGoId;
    private $skyGoUrl;
    private $sum;
    private $synopsis;
    private $url;
    private $quote;
    private $duration;
    private $year;
    private $rating;
    private $headline;
    private $cardImages;
    private $directors;
    private $genres;
    private $keyArtImages;
    private $videos;
    private $viewingWindow;
    public function __construct(Array $title)
    {
        $this->body = isset($title['body']) ? $title['body'] : '';
        $this->cast = isset($title['cast']) ? $title['cast'] : '';
        $this->cert = isset($title['cert']) ? $title['cert'] : '';
        $this->class = isset($title['class']) ? $title['class'] : '';
        $this->lastUpdated = isset($title['lastUpdated']) ? $title['lastUpdated'] : '';
        $this->reviewAuthor = isset($title['reviewAuthor']) ? $title['reviewAuthor'] : '';
        $this->skyGoId = isset($title['skyGoId']) ? $title['skyGoId'] : '';
        $this->skyGoUrl = isset($title['skyGoUrl']) ? $title['skyGoUrl'] : '';
        $this->sum = isset($title['sum']) ? $title['sum'] : '';
        $this->synopsis = isset($title['synopsis']) ? $title['synopsis'] : '';
        $this->url = isset($title['url']) ? $title['url'] : '';
        $this->quote = isset($title['quote']) ? $title['quote'] : '';
        $this->duration = isset($title['duration']) ? $title['duration'] : 0;
        $this->year = isset($title['year']) ? $title['year'] : 'N/A';
        $this->rating = isset($title['rating']) ? $title['rating'] : 0;
        $this->headline = isset($title['headline']) ? $title['headline'] : '';
        $this->cardImages = isset($title['cardImages']) ? $title['cardImages'] : [];
        $this->directors = isset($title['directors']) ? $title['directors'] : [];
        $this->genres = isset($title['genres']) ? $title['genres'] : [];
        $this->keyArtImages = isset($title['keyArtImages']) ? $title['keyArtImages'] : [];
        $this->videos = isset($title['videos']) ? $title['videos'] : [];
        $this->viewingWindow = isset($title['viewingWindow']) ? $title['viewingWindow'] : [];

        $this->id = isset($title['id']) ? $title['id'] : md5($this->body . $this->year . $this->url);
    }
    public function getId()
    {
        return $this->id;
    }
    public function getBody()
    {
        return $this->body;
    }
    public function getCast()
    {
        return $this->cast;
    }
    public function getCert()
    {
        return $this->cert;
    }
    public function getClass()
    {
        return $this->class;
    }
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }
    public function getReviewAuthor()
    {
        return $this->reviewAuthor;
    }
    public function getSkyGoId()
    {
        return $this->skyGoId;
    }
    public function getSkyGoUrl()
    {
        return $this->skyGoUrl;
    }
    public function getSum()
    {
        return $this->sum;
    }
    public function getSynopsis()
    {
        return $this->synopsis;
    }
    public function getUrl()
    {
        return $this->url;
    }
    public function getQuote()
    {
        return $this->quote;
    }
    public function getDuration()
    {
        return $this->duration;
    }
    public function getYear()
    {
        return $this->year;
    }
    public function getRating()
    {
        return $this->rating;
    }
    public function getHeadline()
    {
        return $this->headline;
    }
    public function getCardImages()
    {
        return $this->cardImages;
    }
    public function getDirectors()
    {
        return $this->directors;
    }
    public function getGenres()
    {
        return $this->genres;
    }
    public function getKeyArtImages()
    {
        return $this->artImages;
    }
    public function getVideos()
    {
        return $this->videos;
    }
    public function getViewingWindow()
    {
        return $this->viewingWindow;
    }
}