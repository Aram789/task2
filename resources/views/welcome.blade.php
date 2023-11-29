<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
</head>
<body class="antialiased">
<div id="app">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>
    <main class="d-flex">
        @if(isset($histories))
            <div class="container py-4">
                <div class="timeline desktop d-flex gap-2 p-0 flex-wrap justify-content-center">
                    @foreach($histories as $history)
                        <div class="timeline-row card p-2">
                            <div class="timeline-content">
                                <i class="icon-attachment"></i>
                                <p>Title : {{$history->title}}</p>
                                <p>Description : {{$history->description}}</p>
                                <div class="timeline-time">
                                    <small style="font-size: 10px">Created: {{$history->created_at}}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center my-3">
                    {{ $histories->links() }}
                </div>
            </div>
        @endif
    </main>
    <footer class="py-3 bg-dark">
        <p class="text-center text-white m-0">© 2023 Company, Inc</p>
    </footer>
</div>
</body>
</html>
