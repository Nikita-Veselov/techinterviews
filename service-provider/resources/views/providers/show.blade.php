
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-body text-center">
                <img src="{{ $provider->logo }}" width="71" height="71" loading="lazy" alt="{{ $provider->name }} logo" class="img-thumbnail mb-3" style="max-width: 120px; aspect-ratio: 1/1;">

                <h2 class="card-title">{{ $provider->name }}</h2>

                <p class="badge bg-primary">{{ $provider->category->name ?? 'Uncategorized' }}</p>

                <p class="mt-3 text-muted">{{ $provider->description }}</p>

                <a href="{{ route('providers.index') }}" class="btn btn-outline-secondary mt-4">← Back to list</a>
            </div>
        </div>
    </div>
@endsection
