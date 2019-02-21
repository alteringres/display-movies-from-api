<ul class="list-group">
    @foreach($titles as $title)
        <a  href="/title/{{$title->getId()}}">
            <li class="list-group-item">{{$title->getHeadline()}}</li>
        </a>
    @endforeach
</ul>