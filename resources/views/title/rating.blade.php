<div class="row">
    <div class="col">
        @for ($i = 0; $i < $title->present()->rating; $i++)
            <span class="fa fa-star checked"></span>
        @endfor
        @for ($i = $title->present()->rating; $i < 5 ; $i++)
            <span class="fa fa-star"></span>
        @endfor
    </div>
</div>