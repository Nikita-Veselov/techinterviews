<!DOCTYPE html>
<html>
<head>
    {{-- Lighthouse optimisations --}}
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://ui-avatars.com">
    <link rel="dns-prefetch" href="https://ui-avatars.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet" media="all">

    <title>Service Provider Directory</title>
    <meta name="description" content="Browse and filter verified service providers by category.">
</head>
<body>
<div class="container py-4">
    @yield('content')
</div>
</body>
</html>
