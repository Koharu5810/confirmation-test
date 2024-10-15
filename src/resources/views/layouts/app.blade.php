<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    {{-- フォント --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    @yield('css')
    @livewireStyles
</head>

<body>
    <header>
        <div class="header">
            <div class="header__left"></div>
            <div class="header__logo">
                <h2>FashionablyLate</h2>
            </div>
            <div class="header__button">
                @yield('button')
            </div>
        </div>
    </header>

    <main>
        <div class="main-container">
            <div class="main__title">
                <h3 class="main__title-logo">@yield('title')</h3>
            </div>

            @yield('content')

            @livewireScripts
        </div>
    </main>
</body>

</html>
