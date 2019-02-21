<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="/{{$page > 1?$page - 1:$page}}" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    @for($i = 0; $i < $totalPages; $i ++)
        <li class="page-item {{ ((($i+1) == $page) ? 'active' : '') }}">
            <a class="page-link" href="/{{ $i != 0 ? $i + 1 : '' }}">{{ $i + 1 }}</a>
        </li>
    @endfor
    <li>
      <a class="page-link" href="/{{$page < $totalPages?$page + 1:$page}}" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
@if($page > $totalPages)
    <div class="alert alert-danger" role="alert">
        The page you requested does not exist. You are browsing on the first page now.
    </div>
@endif