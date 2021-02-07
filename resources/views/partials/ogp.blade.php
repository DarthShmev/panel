@section('ogp:tags')
    <meta property="og:site_name" content="{{ config('ogp.site_name') }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="{{ config('ogp.description') }}">
    <meta property="og:type" content="product">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta content="summary_large_image" name="twitter:card">
    <meta property="og:image" content="{{ config('ogp.image') }}">
    <meta name="theme-color" content="{{ config('ogp.theme_colour') }}">
@endsection
