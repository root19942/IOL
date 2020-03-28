@extends('layouts.app')
        <link rel="icon" type="image/png" href="{{url('images/apple-touch-icon.png')}}" />
        <link rel="apple-touch-icon" href="{{url('images/apple-touch-icon.png')}}">
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('accueil', ['locale' => $locale]) }}"><img alt='image' src="{{ url('/images/logo.jpg/' )}}" alt="image" class="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="{{ route('accueil', ['locale' => $locale]) }}">{{ trans('application.accueil') }}</a></li>
                        <li><a class="nav-link" href="{{ route('findLove', ['locale' => $locale]) }}">{{ trans('application.rencontre') }}</a></li>
                        <li><a class="nav-link" href="{{ route('event', ['locale' => $locale]) }}">{{ trans('application.evenement') }}</a></li>
                        <li><a class="nav-link" href="{{ route('histoire', ['locale' => $locale]) }}">{{ trans('application.histoires') }}</a></li>


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
                        	<li><a class="nav-link" href="{{ route('accueil', ['locale' => 'fr']) }}">FR</a></li>
                        @endif
                        @if (app()->getLocale() == "fr")
                        	<li><a class="nav-link" href="{{ route('accueil', ['locale' => 'en']) }}">EN</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
@section('content')
<div class="application" ng-controller="IolCTRL">
	    <div id="preloader">

			<div class="preloader pulse">

				<i class="fas fa-heartbeat" aria-hidden="true"></i>

			</div>

	    </div>


    <!-- end loader -->

    <!-- END LOADER -->

	

	<!-- Start header -->

	

	<!-- Start Banner -->

	<div class="ulockd-home-slider">

		<div class="container-fluid">

			<div class="row">

				<div class="pogoSlider" id="js-main-slider">

					<div class="pogoSlider-slide" data-transition="zipReveal" data-duration="1500" style="background-image:url({{url('images/slide_00.jpg')}});">

						<div class="lbox-caption">

							<div class="lbox-details">

								<h2>{{ trans('application.slide1') }}</h2>

							</div>

						</div>

					</div>
					<div class="pogoSlider-slide" data-transition="zipReveal" data-duration="1500" style="background-image:url({{url('images/slide_1.jpg')}});">

						<div class="lbox-caption">

							<div class="lbox-details">

								{{-- <h1>Sourire</h1> --}}

								<h2>{{ trans('application.slide2') }}</h2>

							</div>

						</div>

					</div>

					<div class="pogoSlider-slide" data-transition="blocksReveal" data-duration="1500" style="background-image:url({{ url('images/slide_2.jpg')}});">

						<div class="lbox-caption">

							<div class="lbox-details">

								{{-- <h1>Decouvrez</h1> --}}

								<h2>{{ trans('application.slide3') }}</h2>


								{{-- <a href="#" class="btn ">Chater</a> --}}

							</div>

						</div>

					</div>

					<div class="pogoSlider-slide" data-transition="blocksReveal" data-duration="1500" style="background-image:url({{ url('images/slide_3.jpg')}});">

						<div class="lbox-caption">

							<div class="lbox-details">

								{{-- <h1>Partagez</h1> --}}

								<h2>{{ trans('application.slide4') }}</h2>

								{{-- <a href="#" class="btn ">Chater</a> --}}

							</div>

						</div>

					</div>

					<div class="pogoSlider-slide" data-transition="blocksReveal" data-duration="1500" style="background-image:url({{ url('images/slide_4.jpg')}});">

						<div class="lbox-caption">

							<div class="lbox-details">

								{{-- <h1>Rencontrez</h1> --}}

								<h2>{{ trans('application.slide5') }}</h2>

								{{-- <a href="#" class="btn ">Decouvrir</a> --}}

							</div>

						</div>

					</div>

					<div class="pogoSlider-slide" data-transition="blocksReveal" data-duration="1500" style="background-image:url({{ url('images/slide_5.jpg')}});">

						<div class="lbox-caption">

							<div class="lbox-details">

								{{-- <h1>Ajoutez</h1> --}}

								<h2>{{ trans('application.slide6') }}</h2>

								{{-- <a href="#" class="btn ">Contact</a> --}}

							</div>

						</div>

					</div>

					<div class="pogoSlider-slide" data-transition="blocksReveal" data-duration="1500" style="background-image:url({{ url('images/slide_6.jpg')}});">

						<div class="lbox-caption">

							<div class="lbox-details">

								{{-- <h1>Confidentialite</h1> --}}

								<h2>{{ trans('application.slide7') }}</h2>

								{{-- <a href="#" class="btn ">Chater</a> --}}

							</div>

						</div>

					</div>	

					<div class="pogoSlider-slide" data-transition="blocksReveal" data-duration="1500" style="background-image:url({{ url('images/slide_7.jpg')}});">

						<div class="lbox-caption">

							<div class="lbox-details">

								{{-- <h1>Parler </h1> --}}

								<h2>{{ trans('application.slide8') }}</h2>

							</div>

						</div>

					</div>					

				</div><!-- .pogoSlider -->

			</div>

		</div>

	</div>

	<!-- End Banner -->

	

	<!-- Start About us -->

	

    @if (Route::has('login'))
     @auth
      <div id="about" class=" row">
        <h1 class="col-12 text-center " style="font-size: 20px;margin-bottom: 20px;">{{ trans('application.myfavor') }}</h1>

        @if($favories->isEmpty())
	        <p class="nofavories" style="text-align: center;width: 100%">
	        	<br><br>
	        	{{ trans('application.nofavor') }}
	        </p>
        @else

			@foreach ($favories as $favorie)
				<div lass="col-lg-3 col-xl-2 col-md-6 col-sm-12" style="margin-bottom: 3%;margin-left: 3%;width: 250px">

					<div class="wrapper">

						<div class="profile">
							<center>
								<img alt='image' src="{{ url('/profile_picture/'.$favorie['user'][0]['img'] )}}"  class="thumbnail2">
							</center>

							{{-- <div class="check"><i class="fas fa-check"></i></div> --}}

							<h3 class="name">{{$favorie['user'][0]['nickname']}} &nbsp; <span class="online green"><i class="fas fa-circle"></i></span></h3>

							<p class="title">{{ $favorie['user'][0]['profession']}}</p>

							<p class="description">

							</p>

						</div>

						

						<div class="social-icons">

							<div class="icon">

								<a href="{{ route('chat', ['locale' => $locale]).'/?user='.$favorie['user'][0]['id'] }}" target="_blank"><i class="fas fa-comments"></i></a>

								<h4>{{trans('application.meetPage.tchat.titre')}}</h4>

							</div>

							

							<div class="icon" >

								<a ng-click='deleFavorie({{$favorie->id}})'><i class="fas fa-heart"></i></a>

								<h4> <strike>{{ trans('application.Favori') }}</strike></h4>

							</div>

							

							<div class="icon">

								<a href="{{route('profil-detail', ['locale' => $locale,'id' => $favorie['user'][0]['id']])}}" target="_blank"><i class="fas fa-eye"></i></a>

								<h4> {{trans('application.meetPage.profile')}} </h4>	

							</div>

						</div>

					</div>

				</div> 
			@endforeach

        @endif

	  </div>
    @else

            <div id="story" class="story-box main-timeline-box">
    			<div class="container">

<div class="row">

<div class="col-lg-12">

<div class="title-box">

<h2>{{trans('application.hiw')}}</h2>

{{-- <p>Suivre le petit tutoriel ci-dessous </p> --}}

</div>

</div>

</div>

<div class="row timeline-element separline">

<div class="timeline-date-panel col-xs-12 col-md-6  align-left">         

<div class="time-line-date-content">

<p class="mbr-timeline-date mbr-fonts-style display-font">

{{trans('application.step1')}}

</p>

</div>

</div>

<span class="iconBackground"></span>

<div class="col-xs-12 col-md-6 align-left">

<div class="timeline-text-content">

<h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-font">{{trans('application.inscription')}}</h4>

<p class="mbr-timeline-text mbr-fonts-style display-7">

{{trans('application.step1Def')}}

</p>

</div>

</div>

</div>

<div class="row timeline-element reverse separline">

<div class="timeline-date-panel col-xs-12 col-md-6  align-left">         

<div class="time-line-date-content">

<p class="mbr-timeline-date mbr-fonts-style display-font">

{{trans('application.step2')}}

</p>

</div>

</div>

<span class="iconBackground"></span>

<div class="col-xs-12 col-md-6 align-right">

<div class="timeline-text-content">

<h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-font">{{trans('application.step2Title')}}</h4>

<p class="mbr-timeline-text mbr-fonts-style display-7">

{{trans('application.step2Def')}}

</p>

</div>

</div>

</div>

<div class="row timeline-element separline">

<div class="timeline-date-panel col-xs-12 col-md-6  align-left">         

<div class="time-line-date-content">

<p class="mbr-timeline-date mbr-fonts-style display-font">

{{trans('application.step3')}}

</p>

</div>

</div>

<span class="iconBackground"></span>

<div class="col-xs-12 col-md-6 align-left">

<div class="timeline-text-content">

<h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-font">{{trans('application.step3Title')}}</h4>

<p class="mbr-timeline-text mbr-fonts-style display-7">

{{trans('application.step3Def')}} 

</p>

</div>

</div>

</div>

<div class="row timeline-element reverse separline">

<div class="timeline-date-panel col-xs-12 col-md-6  align-left">         

<div class="time-line-date-content">

<p class="mbr-timeline-date mbr-fonts-style display-font">

{{trans('application.step4')}}

</p>

</div>

</div>

<span class="iconBackground"></span>

<div class="col-xs-12 col-md-6 align-right">

<div class="timeline-text-content">

<h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-font">{{trans('application.step4Tile')}}</h4>

<p class="mbr-timeline-text mbr-fonts-style display-7">

{{trans('application.step4Def')}}

</p>

</div>

</div>

</div>
				</div>
			</div>
     @endauth
    @endif



	

	<!-- Start Family -->

	<div id="family" class="family-box">

		<div class="container">

			<div class="row">

				<div class="col-lg-12">

					<div class="title-box">

						<h2>{{trans('application.seeprofile')}}</h2>						

					</div>

				</div>

			</div>

			<div class="row">

				<div class="col-lg-4 col-md-6 col-sm-12">

					<div class="single-team-member">

						<div class="family-img">

							<img alt='image' class="img-fluid" src="{{(url('images/family-01.jpg'))}}" alt="" />

						</div>

						<div class="family-info">

							<h4>Mr. Alonso Wiles </h4>

							<p>profession</p>

						</div>

					</div>

				</div>

				<div class="col-lg-4 col-md-6 col-sm-12">

					<div class="single-team-member">

						<div class="family-img">

							<img alt='image' class="img-fluid" src="{{url('images/family-02.jpg')}}" alt="" />

						</div>

						<div class="family-info">

							<h4>Mr. Evon Wiles </h4>

							<p>profession</p>

						</div>

					</div>

				</div>

				<div class="col-lg-4 col-md-6 col-sm-12">

					<div class="single-team-member">

						<div class="family-img">

							<img alt='image' class="img-fluid" src="{{url('images/family-03.jpg')}}" alt="" />

						</div>

						<div class="family-info">

							<h4>Mr. Chris Wiles </h4>

							<p>profession</p>

						</div>

					</div>

				</div>

				<div class="col-lg-4 col-md-6 col-sm-12">

					<div class="single-team-member">

						<div class="family-img">

							<img alt='image' class="img-fluid" src="{{url('images/family-04.jpg')}}" alt="" />

						</div>

						<div class="family-info">

							<h4>Mr. Adina Wiles </h4>

							<p>profession</p>

						</div>

					</div>

				</div>

				<div class="col-lg-4 col-md-6 col-sm-12">

					<div class="single-team-member">

						<div class="family-img">

							<img alt='image' class="img-fluid" src="{{url('images/family-05.jpg')}}" alt="" />

						</div>

						<div class="family-info">

							<h4>Mr. Annetta Wiles </h4>

							<p>profession</p>

						</div>

					</div>

				</div>

				<div class="col-lg-4 col-md-6 col-sm-12">

					<div class="single-team-member">

						<div class="family-img">

							<img alt='image' class="img-fluid" src="{{url('images/family-06.jpg')}}" alt="" />

						</div>

						<div class="family-info">

							<h4>Mr. Ladonna Wiles </h4>

							<p>profession</p>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	<!-- End Family -->

	

	<!-- Start Gallery -->

	<div id="gallery" class="gallery-box">

		<div class="container-fluid">

			<div class="row">

				<div class="col-lg-12">

					<div class="title-box">

						<h2>{{trans('application.noscouple')}}</h2>

						{{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p> --}}

					</div>

				</div>

			</div>

			<div class="row">

				<ul class="popup-gallery clearfix">

					<li>

						<a href="{{url('images/gallery-01.jpg')}}">

							<img alt='image' class="img-fluid" src="{{url('images/gallery-01.jpg')}}" alt="single image">

							<span class="overlay"><i class="fas fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

					<li>

						<a href="{{url('images/gallery-02.jpg')}}">

							<img alt='image' class="img-fluid" src="{{url('images/gallery-02.jpg')}}" alt="single image">

							<span class="overlay"><i class="fas fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

					<li>

						<a href="{{url('images/gallery-03.jpg')}}">

							<img alt='image' class="img-fluid" src="{{url('images/gallery-03.jpg')}}" alt="single image">

							<span class="overlay"><i class="fas fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

					<li>

						<a href="{{url('images/gallery-04.jpg')}}">

							<img alt='image' class="img-fluid" src="{{url('images/gallery-04.jpg')}}" alt="single image">

							<span class="overlay"><i class="fas fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

					<li>

						<a href="{{url('images/gallery-05.jpg')}}">

							<img alt='image' class="img-fluid" src="{{url('images/gallery-05.jpg')}}" alt="single image">

							<span class="overlay"><i class="fas fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

					<li>

						<a href="{{url('images/gallery-06.jpg')}}">

							<img alt='image' class="img-fluid" src="{{url('images/gallery-06.jpg')}}" alt="single image">

							<span class="overlay"><i class="fas fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

					<li>

						<a href="{{url('images/gallery-07.jpg')}}">

							<img alt='image' class="img-fluid" src="{{url('images/gallery-07.jpg')}}" alt="single image">

							<span class="overlay"><i class="fas fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

					<li>

						<a href="{{url('images/gallery-08.jpg')}}">

							<img alt='image' class="img-fluid" src="{{url('images/gallery-08.jpg')}}" alt="single image">

							<span class="overlay"><i class="fas fa-heart" aria-hidden="true"></i></span>

						</a>

					</li>

				</ul>

			</div>

		</div>

	</div>

	<!-- End Gallery -->

	

	<!-- Start Events -->

{{-- 	<div id="events" class="events-box">

		<div class="container">

			<div class="row">

				<div class="col-lg-12">

					<div class="title-box">

						<h2>Events</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>

					</div>

				</div>

			</div>

			<div class="row">

				<div class="col-lg-4 col-md-6 col-sm-12">

					<div class="event-inner">

						<div class="event-img">

							<img alt='image' class="img-fluid" src="images/event-img-01.jpg" alt="" />

						</div>

						<h2>2 June 2018 island coffe</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>

						<a href="#">See location ></a>

					</div>

				</div>

				<div class="col-lg-4 col-md-6 col-sm-12">

					<div class="event-inner">

						<div class="event-img">

							<img alt='image' class="img-fluid" src="images/event-img-02.jpg" alt="" />

						</div>

						<h2>3 June 2018 island Party </h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>

						<a href="#">See location ></a>

					</div>

				</div>

				<div class="col-lg-4 col-md-6 col-sm-12">

					<div class="event-inner">

						<div class="event-img">

							<img alt='image' class="img-fluid" src="images/event-img-03.jpg" alt="" />

						</div>

						<h2>4 June 2018 Island Meet room</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>

						<a href="#">See location @{{loading_display}} ></a>

					</div>

				</div>

			</div>

		</div>

	</div> --}}
</div>

	<!-- End Events -->

	


@endsection

<div class="loading" id="loading_iol">
	<i class="fas fa-circle-notch fa-spin"></i>
</div>

