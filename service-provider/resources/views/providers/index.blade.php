@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Service Providers</h1>

        <!-- Filter -->
        <form method="GET" action="{{ route('providers.index') }}" class="mb-3">
            <label for="categoryFilter" class="form-label me-2">Filter by Category:</label>
            <select id="categoryFilter" class="form-select w-auto d-inline-block mb-3" aria-label="Category Filter">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <div id="providerTable">
                @include('providers.partials.table', ['providers' => $providers])
            </div>
        </form>
    </div>

    <script>
        document.getElementById('categoryFilter').addEventListener('change', function () {
            const category = this.value;

            fetch(`{{ route('providers.index') }}?category=${category}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('providerTable').innerHTML = data.html;
                });
        });

        document.addEventListener('click', function (e) {
            if (e.target.matches('.pagination a')) {
                e.preventDefault();
                const url = e.target.href;
                fetch(url, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('providerTable').innerHTML = data.html;
                    });
            }
        });
    </script>
@endsection
