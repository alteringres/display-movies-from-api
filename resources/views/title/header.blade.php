
<h2><a href="{{$title->present()->url }}" target="_blank">{{ $title->present()->headline}}</a></h2>
<img src="/image/{{ $title->present()->id }}" class="img-fluid"/>

<div class="container">
  <div class="row">
    <div class="col">
    <div class="col">
            Year: {{ $title->present()->year }}
        </div>    </div>
    <div class="col">
    Certificate: {{ $title->present()->cert}}
    </div>
    <div class="col">
    Running time: {{ $title->present()->duration }} min
    </div>
  </div>
</div>