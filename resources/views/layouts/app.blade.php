<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="IslandOfLoves">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="{{url('images/apple-touch-icon.png')}}" />
        <link rel="apple-touch-icon" href="{{url('images/apple-touch-icon.png')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IslandOfLoves</title>

        <link rel="icon" type="image/png" href="{{url('images/apple-touch-icon.png')}}" />
        <link rel="apple-touch-icon" href="{{url('images/apple-touch-icon.png')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />

        <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">

        <link rel="stylesheet" href="{{ url('/res/fontawesome5.12.0/css/all.css') }}">
        <!-- Pogo Slider CSS -->
        <link rel="stylesheet" href="{{ url('/css/pogo-slider.min.css') }}">
        <!-- Site CSS -->
        <link rel="stylesheet" href="{{ url('/css/style.css') }}">    
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ url('/css/responsive.css') }}">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ url('/css/custom.css') }}">
    </head>
    <body>
    <!-- End header -->
        @yield('content')

                        @if (Route::has('login'))
                                @auth
                                    <div class="btn-group-fab" role="group" aria-label="FAB Menu">
                                      <div>
                                            <a href="{{ route('chat', ['locale' => $locale]) }}" target="_blank" class="btn btn-main btn-danger has-tooltip" data-placement="left" title="Menu"> <i class="fas fa-comments"></i> </a>

                                        {{-- 
                                        <form action="{{ route('chat', ['locale' => $locale]) }}">
                                            <button type="submit" class="btn btn-main btn-danger has-tooltip" data-placement="left" title="Menu"> <i class="fas fa-comments"></i> </button>
                                        </form> --}}
                                      </div>
                                    </div>
                                @endauth
                        @endif

    <!-- End Contact -->
    
    <!-- Start Footer -->
    <footer class="footer-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="footer-company-name">IslandOfLoves. &copy; 2019 Design By : <a href="https://ket-up.com/">ket-up</a></p>
                </div>
            </div>
        </div>
    </footer>
    
    <script src=" {{ url('/js/jquery.min.js') }}"></script>
    <script src=" {{ url('/js/popper.min.js') }} "></script>
    <script src=" {{ url('/js/bootstrap.min.js') }} "></script>
    <!-- ALL PLUGINS -->
    <script src=" {{ url('/js/jquery.magnific-popup.min.js') }} "></script>
    <script src=" {{ url('/js/jquery.pogo-slider.min.js') }} "></script> 
    <script src=" {{ url('/js/slider-index.js') }} "></script>
    <script src=" {{ url('/js/form-validator.min.js') }} "></script>
    <script src=" {{ url('/js/contact-form-script.js') }} "></script>
    <script src=" {{ url('/js/custom.js') }} "></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular.min.js"></script>
    <script src=" {{ url('/js/main_script.js') }} "></script>
    </body>
</html>
