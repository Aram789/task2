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

@if(isset($histories))
    <div class="container py-4">
        <div class="timeline d-flex gap-2 p-0 flex-wrap justify-content-center">
            @foreach($histories as $history)
                <div class="timeline-row card p-2">
                    <div class="timeline-content">
                        <i class="icon-attachment"></i>
                        <p>Title : {{$history->title}}</p>
                        <p>Description : {{$history->description}}</p>
                        <div class="timeline-time">
                            <small>{{$history->created_at}}</small>
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


</body>
</html>
