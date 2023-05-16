<form action="{{ route('items.search') }}" class="d-flex ms-auto" role="search" method="POST">
    @csrf
    <input type="search" name="search" class="form-control me-2" placeholder="Search..." aria-label="Search">
    <button type="submit" class="btn btn-primary">Search</button>
</form>