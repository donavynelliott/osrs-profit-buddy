<form action="{{ route('items.search') }}" class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto d-flex" role="search" method="POST">
    @csrf
    <input type="search" name="search" class="form-control me-2" placeholder="Search..." aria-label="Search">
    <button type="submit" class="btn btn-primary">Search</button>
</form>