<div class="search-panel">
    <div class="search-inner d-flex align-items-center justify-content-center">
        <div class="close-btn">Close <i class="fa fa-close"></i></div>
        <form id="searchForm" action="#">
            <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
            </div>
        </form>
    </div>
</div>

@section('body_right_navbar_search')
<div class="list-inline-item"><a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a>
</div>
@stop