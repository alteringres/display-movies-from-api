<?php
namespace App\Presenters;

class TitlePresenter extends Presenter {

    public function duration()
    {
        return round($this->entity->getDuration())/60;
    }
    public function genres()
    {
        return collect($this->entity->getGenres())
            ->implode(', ');
    }
    public function directors()
    {
        $directorNamesArray = collect($this->entity->getDirectors())
            ->pluck('name')
            ->implode(', ');
        return $directorNamesArray;
    }
    public function cast()
    {
        // dd($this->entity->getCast());
        return collect($this->entity->getCast())
        ->pluck('name')
        ->implode(', ');
    }

    
    

}