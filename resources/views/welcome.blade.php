<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <script src="vanilla-tilt.min.js"></script>

    <title>Zeal</title>

    <link rel="stylesheet" href="{{ asset('css/home/main.css') }}">

    <!-- <link rel="stylesheet" href="./css/main.css"> -->
</head>

<body>

    <section class="fog">
        @if (Route::has('login'))

        <div class="login">
            @auth
            <a href="{{ url('/home') }}" class="btn">HOME</a>
            @else
            <a href="{{ route('login') }}" class="btn">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn">Register</a>
            @endif
            @endauth
        </div>
        @endif
        <div class="absolute-bg"></div>
        <div class="fog-container">
            <div class="fog-img fog-img-first"></div>
            <div class="fog-img fog-img-second"></div>
        </div>


    </section>

    <section class="card-section">

        <div class="cards-list">

            <div class="card 1" id="notices" data-tilt>
                <div class="card_image"> <img src="{{ asset('images/home/new2.png') }}" /> </div>
                <div class="card_title title-white">
                    <a href="{{ route('show.notice') }}" class="button">Notices</a>

                </div>
            </div>

            <div class="card 2" data-tilt>
                <div class="card_image">
                    <img src="{{ asset('images/home/post.jpg') }}" />
                </div>
                <div class="card_title title-white">
                    <a href="{{ route('show.post') }}" class="button">Posts</a>
                </div>
            </div>

            <div class="card 3" data-tilt>
                <div class="card_image">
                    <img src="{{ asset('images/home/help.jpg') }}" />
                </div>
                <div class="card_title">
                    <a href="{{ route('show.help') }}" class="button">Help Documents</a>
                </div>
            </div>


        </div>

    </Section>
    <script type="text/javascript" src="{{ asset('js/home/vanilla-tilt.js') }}"></script>
</body>

</html>