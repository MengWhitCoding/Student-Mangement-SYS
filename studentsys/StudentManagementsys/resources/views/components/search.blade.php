<div class="form-group">
    <form action="/search" method="get">
        <div class="input-group">
            <input class="form-control" name="search" placeholder="Search..." value="{{ isset($search) ? $search : ''}}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
</div>
