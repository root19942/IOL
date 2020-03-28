@extends('layouts.app')

        <link rel="icon" type="image/png" href="{{url('images/apple-touch-icon.png')}}" />
        <link rel="apple-touch-icon" href="{{url('images/apple-touch-icon.png')}}">
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container">
 			<a class="navbar-brand" href="{{ route('accueil', ['locale' => $locale]) }}"><img src="{{ url('/images/logo.jpg/' )}}" alt="image" class="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link" href="{{ route('accueil', ['locale' => $locale]) }}">{{ trans('application.accueil') }}</a></li>
                        <li><a class="nav-link" href="{{ route('findLove', ['locale' => $locale]) }}">{{ trans('application.rencontre') }}</a></li>
                        <li><a class="nav-link" href="{{ route('event',['locale' => $locale]) }}">{{ trans('application.evenement') }}</a></li>
                        <li><a class="nav-link active" href="{{ route('histoire',['locale' => $locale]) }}">{{ trans('application.histoires') }}</a></li>



                        @if (Route::has('login'))
                                @auth
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fas fa-user"></i> &nbsp;
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                            {{-- <a class="nav-link"><i class="fas fa-bell"></i> &nbsp;Notifications</a> --}}

                                            <a class="nav-link" href="{{ route('profil', ['locale' => $locale]) }}"><i class="fas fa-cog"></i> &nbsp;{{ trans('application.monprofil') }}</a>

                                            <a class="dropdown-item" href="{{ route('logout', app()->getLocale()) }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i> &nbsp; {{ trans('application.deconnexion') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @else

                                    @if (Route::has('register'))
                                        <li><a class="nav-link" href="{{ route('register', app()->getLocale()) }}">{{ trans('application.inscription') }}</a></li>
                                    @endif
                                    <li><a class="nav-link" href="{{ route('login', app()->getLocale()) }}">{{ trans('application.connexion') }}</a></li>
                                @endauth
                        @endif
                        <li><a class="nav-link" href="{{ route('contact', ['locale' => $locale]) }}">{{ trans('application.contact') }}</a></li>
               @if (app()->getLocale() == "en")
                        	<li><a class="nav-link" href="{{ route('histoire', ['locale' => 'fr']) }}">FR</a></li>
                        @endif
                        @if (app()->getLocale() == "fr")
                        	<li><a class="nav-link" href="{{ route('histoire', ['locale' => 'en']) }}">EN</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
@section('content')



    <link rel="stylesheet" type="text/css" href="{{ url('/css/findLove.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('/css/profil.css') }}">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



	<!-- Start Gallery -->

	<div id="gallery" class="gallery-box">

		<div class="container-fluid">

			<div class="row">

				<div class="col-lg-12">

					<div class="title-box">

						<h2>{{trans('application.storiePage.titre')}}</h2>

						<p>{{trans('application.storiePage.soustitre')}}. </p>

					</div>

				</div>

			</div>

			<div class="row">

				<ul class="popup-gallery clearfix">

					<li>

						<a href="images/gallery-01.jpg">

							<img class="img-fluid" src="{{url('images/gallery-01.jpg')}}" alt="single image">

							<span class="overlay"><i class="far fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

					<li>

						<a href="images/gallery-02.jpg">

							<img class="img-fluid" src="{{url('images/gallery-02.jpg')}}" alt="single image">

							<span class="overlay"><i class="far fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

					<li>

						<a href="images/gallery-03.jpg">

							<img class="img-fluid" src="{{url('images/gallery-03.jpg')}}" alt="single image">

							<span class="overlay"><i class="far fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

					<li>

						<a href="images/gallery-04.jpg">

							<img class="img-fluid" src="{{url('images/gallery-04.jpg')}}" alt="single image">

							<span class="overlay"><i class="far fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

					<li>

						<a href="images/gallery-05.jpg">

							<img class="img-fluid" src="{{url('images/gallery-05.jpg')}}" alt="single image">

							<span class="overlay"><i class="far fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

					<li>

						<a href="images/gallery-06.jpg">

							<img class="img-fluid" src="{{url('images/gallery-06.jpg')}}" alt="single image">

							<span class="overlay"><i class="far fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

					<li>

						<a href="images/gallery-07.jpg">

							<img class="img-fluid" src="{{url('images/gallery-07.jpg')}}" alt="single image">

							<span class="overlay"><i class="far fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

					<li>

						<a href="images/gallery-08.jpg">

							<img class="img-fluid" src="{{url('images/gallery-08.jpg')}}" alt="single image">

							<span class="overlay"><i class="far fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

				</ul>

			</div>

		</div>

	</div>

	<!-- End Gallery -->

@endsection