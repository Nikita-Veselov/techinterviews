<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Logo</th>
        <th>Name</th>
        <th>Description</th>
        <th>Category</th>
    </tr>
    </thead>
    <tbody>
    @forelse($providers as $provider)
        <tr>
            <td><img src="{{ $provider->logo }}" width="60"></td>
            <td><a href="{{ route('providers.show', $provider->id) }}">{{ $provider->name }}</a></td>
            <td>{{ $provider->description }}</td>
            <td>{{ $provider->category->name ?? '-' }}</td>
        </tr>
    @empty
        <tr><td colspan="4">No providers found.</td></tr>
    @endforelse
    </tbody>
</table>

<div class="mt-3">
    {{ $providers->withQueryString()->links('pagination::bootstrap-5') }}
</div>
