@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{url('images/apple-touch-icon.png')}}" />
        <link rel="apple-touch-icon" href="{{url('images/apple-touch-icon.png')}}">
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/"><img src="{{url('images/logo.jpg')}}" alt="image" class="logo"></a>
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
                        <li><a class="nav-link" href="{{ route('histoire',['locale' => $locale]) }}">{{ trans('application.histoires') }}</a></li>


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
                        	<li><a class="nav-link" href="{{ route('contact', ['locale' => 'fr']) }}">FR</a></li>
                        @endif
                        @if (app()->getLocale() == "fr")
                        	<li><a class="nav-link" href="{{ route('contact', ['locale' => 'en']) }}">EN</a></li>
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



	<!-- Start Contact -->

	<div id="contact" class="contact-box">

		<div class="container">

			<div class="row">

				<div class="col-lg-12">

					<div class="title-box">

						<h2>{{trans('application.contactPage.titre')}}</h2>

						<p>{{trans('application.contactPage.soustitre')}} </p>

					</div>

				</div>

			</div>

			<div class="row">

				<div class="col-lg-12 col-sm-12 col-xs-12">

				  <div class="contact-block">

					<form id="contactForm">

						@csrf

					  <div class="row">

						<div class="col-md-12">

							<div class="form-group">

								<input type="text" class="form-control" id="name" name="name" placeholder="{{trans('application.contactPage.champ.nom')}}" required data-error="veuillez entrer votre nom">

								<div class="help-block with-errors"></div>

							</div>                                 

						</div>

						<div class="col-md-12">

							<div class="form-group">

								<input type="text" placeholder="{{trans('application.contactPage.champ.email')}}" id="email" class="form-control" name="email" required data-error="veuillez entre votre email">

								<div class="help-block with-errors"></div>

							</div> 

						</div>

						<div class="col-md-12">

							<div class="form-group">

								<input type="text" placeholder="{{trans('application.contactPage.champ.sujetmessage')}}" id="subject" class="form-control" name="sujet" required data-error="svp veillez entrer un sujet pour votre message">

								<div class="help-block with-errors"></div>

							</div> 

						</div>

						<div class="col-md-12">

							<div class="form-group"> 

								<textarea class="form-control" id="message" placeholder="{{trans('application.contactPage.champ.message')}}" rows="8" data-error="Entrer votre message" required></textarea>

								<div class="help-block with-errors"></div>

							</div>

							<div class="submit-button text-center">

								<button class="btn btn-common" id="submit" type="submit">{{trans('application.contactPage.champ.envoye')}}</button>

								<div id="msgSubmit" class="h3 text-center hidden"></div> 

								<div class="clearfix"></div> 

							</div>

						</div>

					  </div>            

					</form>

				  </div>

				</div>

			</div>

		</div>

	</div>

	<!-- End Contact -->



@endsection