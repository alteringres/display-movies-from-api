<div class="row ">
        <div class="col">
            {{ $title->present()->synopsis }}
        </div>
        
        <div class="cast-dir col">
            <div class="genre col-12">
                <strong>Genres:</strong>
                {{$title->present()->genres}}
            </div>
            <div class="directors col-12">
                <strong>Director:</strong>
                {{$title->present()->directors}}
            </div>
            <div class="cast col-12">
                <strong>Cast:</strong>
                {{$title->present()->cast}}
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Review</h5>

            <p class="card-text">
                {{ $title->present()->body }}
            </p>
            <small>Review Author:</small>
            <em>{{$title->present()->reviewAuthor }}</em>
        </div>
    </div>
</div>