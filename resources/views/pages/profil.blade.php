<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="IslandOfLoves">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IslandOfLoves</title>

        <link rel="icon" type="image/png" href="{{url('images/apple-touch-icon.png')}}" />
        <link rel="apple-touch-icon" href="{{url('images/apple-touch-icon.png')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
		  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
		  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
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

		  <link rel="stylesheet" href="{{ url('/css/profile_style.css') }}">
    </head>
    <body ng-controller="IolProfilCTRL">
    <!-- End header -->       

		@if (Route::has('login'))
					@auth
						<div class="btn-group-fab" role="group" aria-label="FAB Menu" style="display: none;">
							<div>
									<a href="{{ route('chat', ['locale' => $locale]) }}" class="btn btn-main btn-danger has-tooltip" data-placement="left" title="Menu"> <i class="fas fa-comments"></i> </a>

								{{-- 
								<form action="{{ route('chat', ['locale' => $locale]) }}">
									<button type="submit" class="btn btn-main btn-danger has-tooltip" data-placement="left" title="Menu"> <i class="fas fa-comments"></i> </button>
								</form> --}}
							</div>
						</div>
					@endauth
		@endif

		<header class="top-header">
			<nav class="navbar header-nav navbar-expand-lg">
				<div class="container">
					<a class="navbar-brand" style="height: auto;" href="{{ route('accueil', ['locale' => $locale]) }}"><img src="{{ url('/images/logo.jpg/' )}}" alt="image" class="logo"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
						<ul class="navbar-nav">
							<li><a class="nav-link" href="{{ route('accueil', ['locale' => $locale]) }}">{{ trans('application.accueil') }}</a></li>
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
                        	<li><a class="nav-link" href="{{ route('profil', ['locale' => 'fr']) }}">FR</a></li>
                        @endif
                        @if (app()->getLocale() == "fr")
                        	<li><a class="nav-link" href="{{ route('profil', ['locale' => 'en']) }}">EN</a></li>
                        @endif
						</ul>
					</div>
				</div>
			</nav>
		</header>

    	<!-- End Contact -->


<body class="profile-page">    
    <div class="page-header header-filter" data-parallax="true" id="banner" style="background-image:url('{{ Auth::user()->bannier  }}');"></div>
    <div class="main main-raised">
		<div class="profile-content">
            <div class="container-fluid">
                <div class="row">
	                <div class="col-md-6 ml-auto mr-auto">
        	           <div class="profile">
	                        <div class="avatar">
										<div class="img" style="background-image: url({{ url('/profile_picture/'.Auth::user()->img  )}});" rel="'https://www.biography.com/.image/ar_1:1%2Cc_fill%2Ccs_srgb%2Cg_face%2Cq_auto:good%2Cw_300/MTU0NjQzOTk4OTQ4OTkyMzQy/ansel-elgort-poses-for-a-portrait-during-the-baby-driver-premiere-2017-sxsw-conference-and-festivals-on-march-11-2017-in-austin-texas-photo-by-matt-winkelmeyer_getty-imagesfor-sxsw-square.jpg'">
											<span id="spanChange">{{ trans('application.profilPage.photo') }}</span>
											<!-- <input type="file" id="image" accept="image/*" style="display: none" /> -->
										</div>
	                        </div>
	                        <div class="name">
	                            <h3 class="title">{{ Auth::user()->name ." ". Auth::user()->subname }}
	                            	<br>
	                            {{ " (".Auth::user()->nickname.")"}}</h3>
								<h6>{{Auth::user()->profession}}</h6>
								
	                        </div>
	                    </div>
    	            </div>
                </div>
                <div class="description text-center">
                    <p> {{Auth::user()->bio}} </p>
                </div>
				<div class="row">					
					<div class="col-md-6 ml-auto mr-auto">
						<div class="profile-tabs">
							<ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="activeMoi" href="#moi" role="tab" data-toggle="tab">
									<i class="fas fa-user"></i>
									{{ trans('application.profilPage.apropos.titre') }}
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="activeInteret" href="#interets" role="tab" data-toggle="tab">
									<i class="fas fa-heart"></i>
									{{ trans('application.profilPage.interet.titre') }}
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="activeAutre" href="#autre" role="tab" data-toggle="tab">
									<i class="fas fa-grin-hearts"></i>
									{{ trans('application.profilPage.autre.titre') }} ...
									</a>
								</li>
							</ul>
						</div>
					</div>
    	    	</div>
            </div>
        
			<div class="tab-content tab-space">
				<div class="tab-pane active text-center gallery" id="moi">
						<div class="row col-10 offset-1" style="margin-bottom: 70px">
							<div class="col-4">
								<form ng-submit='majuser(user)' >
									<div class="form-group">
										<label for="nickname">{{ trans('application.profilPage.apropos.surnom.titre') }}:</label>
										<input type="text" class="form-control" id="nickname" aria-describedby="nicknameHelp" placeholder="{{ trans('application.profilPage.apropos.surnom.input') }}" ng-model="user.nickname" ng-value="'{{Auth::user()->nickname}}'">
										<small id="nicknameHelp" class="form-text text-muted">{{ trans('application.profilPage.apropos.surnom.msg') }}.</small>
									</div>
									<div class="form-group">
										<label for="name">{{ trans('application.profilPage.apropos.nom.titre') }}:</label>
										<input type="text" ng-model="user.name" ng-value="'{{Auth::user()->name}}'" class="form-control" id="name" aria-describedby="nameHelp" placeholder="{{ trans('application.profilPage.apropos.nom.input') }}" autocomplete="off">
										<small id="nameHelp" class="form-text text-muted">{{ trans('application.profilPage.apropos.nom.msg') }}.</small>
									</div>
									<div class="form-group">
										<label for="subname">{{ trans('application.profilPage.apropos.prenom.titre') }}:</label>
										<input type="text" ng-model="user.subname" ng-value="'{{Auth::user()->subname}}'" class="form-control" id="subname" aria-describedby="subnameHelp" placeholder="{{ trans('application.profilPage.apropos.prenom.input') }}" autocomplete="off">
										<small id="subnameHelp" class="form-text text-muted">{{ trans('application.profilPage.apropos.prenom.msg') }}.</small>
									</div>
									<div class="form-group">
										<label for="telephone">{{ trans('application.profilPage.apropos.telephone.titre') }}:</label>
										<input type="tel" ng-model="user.phone" ng-value="'{{Auth::user()->phone}}'" class="form-control" id="profession" aria-describedby="telephoneHelp" placeholder="{{ trans('application.profilPage.apropos.telephone.input') }}" autocomplete="off">
										<small id="telephoneHelp" class="form-text text-muted">{{ trans('application.profilPage.apropos.telephone.msg') }}.</small>
									</div>
							</div>
							<div class="col-4">
									<div class="form-group">
										<label for="children">{{ trans('application.profilPage.apropos.enfant.titre') }}:</label>
										<input type="number" ng-model="user.children" ng-value="'{{Auth::user()->children}}'" class="form-control" id="children" aria-describedby="childrenHelp" autocomplete="off">
										<small id="childrenHelp" class="form-text text-muted">{{ trans('application.profilPage.apropos.enfant.msg') }}.</small>
									</div>
									<div class="form-group">
										<label for="email">{{ trans('application.profilPage.apropos.email.titre') }}:</label>
										<input type="email" ng-model="user.email" ng-value="'{{Auth::user()->email}}'" class="form-control" id="email" aria-describedby="emailHelp" placeholder="{{ trans('application.profilPage.apropos.email.input') }}" autocomplete="off">
										<small id="emailHelp" class="form-text text-muted">{{ trans('application.profilPage.apropos.email.msg') }}.</small>
									</div>
									<div class="form-group">
										<label for="country">{{ trans('application.profilPage.apropos.pays.titre') }}:</label>
										<input type="text" ng-model="user.country" ng-value="'{{Auth::user()->country}}'"class="form-control" id="country" aria-describedby="countryHelp" placeholder="{{ trans('application.profilPage.apropos.pays.input') }}" autocomplete="off">
										<small id="countryHelp" class="form-text text-muted">{{ trans('application.profilPage.apropos.pays.msg') }}.</small>
									</div>
									<div class="form-group">
										<label for="ville">{{ trans('application.profilPage.apropos.ville.titre') }}:</label>
										<input type="text" ng-model="user.town" ng-value="'{{Auth::user()->town}}'" class="form-control" id="ville" aria-describedby="villeHelp" placeholder="{{ trans('application.profilPage.apropos.ville.input') }}" autocomplete="off">
										<small id="villeHelp" class="form-text text-muted">{{ trans('application.profilPage.apropos.ville.msg') }}.</small>
									</div>
							</div>
							<div class="col-4">
									<div class="form-group">
										<label for="work">{{ trans('application.profilPage.apropos.profession.titre') }}:</label>
										<input type="text" ng-model="user.profession"  ng-value="'{{Auth::user()->profession}}'" class="form-control" id="work" aria-describedby="workHelp" placeholder="{{ trans('application.profilPage.apropos.profession.input') }}" autocomplete="off">
										<small id="workHelp" class="form-text text-muted">{{ trans('application.profilPage.apropos.profession.msg') }}.</small>
									</div>
									<div class="form-group">
										<label for="pass">{{ trans('application.profilPage.apropos.motpasse.titre') }}:</label>
										<input type="password" ng-model="user.newpasseword" class="form-control"  aria-describedby="passHelp" placeholder="{{ trans('application.profilPage.apropos.motpasse.input') }}" autocomplete="off">
										<small id="passHelp" class="form-text text-muted">{{ trans('application.profilPage.apropos.motpasse.msg') }}.</small>
									</div>
									<div class="form-group">
										<label for="pass">{{ trans('application.profilPage.apropos.motpassrep.titre') }}</label>
										<input type="password"  ng-model="user.newrepasseword" class="form-control" id="pass" aria-describedby="passHelp" placeholder="{{ trans('application.profilPage.apropos.motpassrep.input') }}" autocomplete="off">
										<small id="passHelp" class="form-text text-muted">{{ trans('application.profilPage.apropos.motpassrep.msg') }}.</small>
									</div>
							</div>	
							<div class="col-6 offset-3">
								<br>
								<h6 style="text-align: center;">{{ trans('application.profilPage.apropos.ancmotpass.titre') }}</h6>
								<p style="text-align: center;">
									<br>
									<input type="password" ng-model="user.password" ng-model="password" class="form-control" id="pass" aria-describedby="passHelp" placeholder="{{ trans('application.profilPage.apropos.ancmotpass.input') }}" style="margin-bottom: 10px;">
									<button type="submit" ng-disabled=" (user.newpasseword) && (user.newpasseword != user.newrepasseword)" class="btn btn-primary">{{ trans('application.profilPage.apropos.appliquer') }}</button>
								</p>
						</form>
							</div>	
						</div>
					</div>



				<div class="tab-pane text-center gallery" id="interets">
						<div class="row" style="justify-content: center;">
							<div class="col-12">
								<div class="title-box">
									<h2>{{ trans('application.profilPage.interet.soustitre') }}</h2>
									<br><br>
								</div>
							</div>						
							<div class="row">
								<div class="flip-box col-4" ng-click='addPreference("LA TECK")'>
									<div class="flip-box-inner">								
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/38136/pexels-photo-38136.jpeg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<!-- <h1 class="text-shadow">LA TECH</h1> -->								
											<h1 class="flip-box-front-content">LA TECH &nbsp; <i ng-show="isPreference('LA TECK')" class="fas fa-check-circle"></i>	</h1>

										</div>								
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>LA TECH</h2>
												<p>Pour vous detendre et profiter des arbres .</p>
											</div>
										</div>
									</div>
								</div>

								<div class="flip-box col-4" ng-click='addPreference("La Lecture")'>
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34950/pexels-photo.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">La Lecture &nbsp; <i ng-show="isPreference('La Lecture')" class="fas fa-check-circle"></i></h1>
										</div>
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<div class="flip-box-back-content">
													<h2>La Lecture</h2>
													<p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
												</div>
											</div>
										</div>
									</div>								
								</div>


								<div class="flip-box col-4" ng-click='addPreference("Reseaux sociaux")'>
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34546/sunset-lake-landscape-summer.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">Reseaux sociaux &nbsp; <i ng-show="isPreference('Reseaux sociaux')" class="fas fa-check-circle"></i></h1>
										</div>
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>Reseaux sociaux</h2>
												<p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
											</div>
										</div>
									</div>
								</div>


								<div class="flip-box col-4" ng-click='addPreference("La Plage")'>
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34546/sunset-lake-landscape-summer.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">La Plage &nbsp; <i ng-show="isPreference('La Plage')" class="fas fa-check-circle"></i></hi>
										</div>
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>La Plage</h2>
												<p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
											</div>
										</div>
									</div>
								</div>
								<div class="flip-box col-4" ng-click='addPreference("Decouvertes")'>
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34546/sunset-lake-landscape-summer.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">Decouvertes &nbsp; <i ng-show="isPreference('Decouvertes')" class="fas fa-check-circle"></i></hi>
										</div>
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>Decouvertes</h2>
												<p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
											</div>
										</div>
									</div>
								</div>
								<div class="flip-box col-4" ng-click='addPreference("Jeu Video")'>
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34546/sunset-lake-landscape-summer.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">Jeu Video &nbsp; <i ng-show="isPreference('Jeu Video')" class="fas fa-check-circle"></i></hi>
										</div>
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>Jeu Video</h2>
												<p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
											</div>
										</div>
									</div>
								</div>
								<div class="flip-box col-4" ng-click='addPreference("Le Style")'>
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34546/sunset-lake-landscape-summer.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">Le Style &nbsp; <i ng-show="isPreference('Le Style')" class="fas fa-check-circle"></i></hi>
										</div>
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>Le Style</h2>
												<p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
											</div>
										</div>
									</div>
								</div>
								<div class="flip-box col-4" ng-click='addPreference("Le Sport")'>
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34546/sunset-lake-landscape-summer.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">Le Sport &nbsp; <i ng-show="isPreference('Le Sport')" class="fas fa-check-circle"></i></hi>
										</div>
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>Le Sport</h2>
												<p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
											</div>
										</div>
									</div>
								</div>
								<div class="flip-box col-4" ng-click='addPreference("Les Voitures")'>
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34546/sunset-lake-landscape-summer.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">Les Voitures &nbsp; <i ng-show="isPreference('Les Voitures')" class="fas fa-check-circle"></i></hi>
										</div>
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>Les Voitures</h2>
												<p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
											</div>
										</div>
									</div>							
								</div>
								<div class=" col-12" >
									<h1>{{ trans('application.profilPage.interet.biographie') }}:</h1>

									<input type="text" ng-model='user.bio'  ng-value="'{{Auth::user()->bio}}'" name="bio" style="height: 150px" class="form-control">
								</div>
								<div class=" col-12">
									<button class="btn btn-primary" ng-click='validerpreference(user.bio)'>
									{{ trans('application.profilPage.interet.appliquer') }}
									</button>							
								</div>
							</div>
						</div>
					</div>


				<div class="tab-pane text-center gallery" id="autre">
					<div class="row looking-for-box">
						<div class="col-4">
							<h1><i class="fas fa-heart"></i><br> {{ trans('application.profilPage.autre.favori') }}</h1>
							<span> @{{details.favories}} </span>
						</div>
						<div class="col-4">
							<h1><i class="fas fa-comments"></i><br> {{ trans('application.profilPage.autre.message.titre') }}</h1>
							<span>@{{details.message}} (@{{details.personnes}} {{ trans('application.profilPage.autre.message.personne') }}) </span>
						</div>
						<div class="col-4">
							<h1><i class="fas fa-glass-cheers"></i><br> {{ trans('application.profilPage.autre.evenement.titre') }}</h1>
							<span> {{ trans('application.profilPage.autre.evenement.message') }} </span>
						</div>
					</div>
				</div>
			</div>

        
            </div>
        </div>
	</div>








<button type="button" id="banneractive" class="btn btn-primary" data-toggle="modal" data-target="#bannerchois" style="display: none">Open modal for</button>

<div class="modal fade" id="bannerchois" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Changer votre banniere</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
      	<div class="col-4"  style="border:1px solid #dd666c;padding: 10px">
      		<img id="proposition" src="http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png" style="height: 100px;width: 100%">
      		<div id="selected" ng-click="changeBannier('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png')">
      			<i class="far fa-check-circle"></i>
      		</div>
      		<div class="selectionner" ng-if=" bannier == 'http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png'">
      			<i class="far fa-check-circle"></i>
      		</div>
      	</div>
      	<div class="col-4"  style="border:1px solid #dd666c;padding: 10px">
      		<img id="proposition" src="http://wallpapere.org/wp-content/uploads/2012/02/imagini-leu.jpg" style="height: 100px;width: 100%">
      		<div id="selected" ng-click="changeBannier('http://wallpapere.org/wp-content/uploads/2012/02/imagini-leu.jpg')">
      			<i class="far fa-check-circle"></i>
      		</div>
      		<div class="selectionner" ng-if=" bannier == 'http://wallpapere.org/wp-content/uploads/2012/02/imagini-leu.jpg'" >
      			<i class="far fa-check-circle"></i>
      		</div>
      	</div>
      	<div class="col-4"  style="border:1px solid #dd666c;padding: 10px">
      		<img id="proposition" src="http://wallpapere.org/wp-content/uploads/2011/05/Wallpapere_bmw_hd.jpg" style="height: 100px;width: 100%">
      		<div id="selected" ng-click="changeBannier('http://wallpapere.org/wp-content/uploads/2011/05/Wallpapere_bmw_hd.jpg')">
      			<i class="far fa-check-circle"></i>
      		</div>
      		<div class="selectionner" ng-if=" bannier == 'http://wallpapere.org/wp-content/uploads/2011/05/Wallpapere_bmw_hd.jpg'" >
      			<i class="far fa-check-circle"></i>
      		</div>
      	</div>
      	<div class="col-4"  style="border:1px solid #dd666c;padding: 10px">
      		<img id="proposition" src="http://wallpapere.org/wp-content/uploads/2011/06/abstract-square-hd-wallpaper.jpg" style="height: 100px;width: 100%">
      		<div id="selected" ng-click="changeBannier('http://wallpapere.org/wp-content/uploads/2011/06/abstract-square-hd-wallpaper.jpg')">
      			<i class="far fa-check-circle"></i>
      		</div>
      		<div class="selectionner" ng-if=" bannier == 'http://wallpapere.org/wp-content/uploads/2011/06/abstract-square-hd-wallpaper.jpg'" >
      			<i class="far fa-check-circle"></i>
      		</div>
      	</div>
      	<div class="col-4"  style="border:1px solid #dd666c;padding: 10px">
      		<img id="proposition" src="http://wallpapere.org/wp-content/uploads/2011/06/domino-wallpaper.jpg" style="height: 100px;width: 100%">
      		<div id="selected" ng-click="changeBannier('http://wallpapere.org/wp-content/uploads/2011/06/domino-wallpaper.jpg')">
      			<i class="far fa-check-circle"></i>
      		</div>
      		<div class="selectionner" ng-if=" bannier == 'http://wallpapere.org/wp-content/uploads/2011/06/domino-wallpaper.jpg'" >
      			<i class="far fa-check-circle"></i>
      		</div>
      	</div>
      	<div class="col-4"  style="border:1px solid #dd666c;padding: 10px">
      		<img id="proposition" src="http://wallpapere.org/wp-content/uploads/2011/07/wallpapere-kungfu-panda.jpg" style="height: 100px;width: 100%">
      		<div id="selected" ng-click="changeBannier('http://wallpapere.org/wp-content/uploads/2011/07/wallpapere-kungfu-panda.jpg')">
      			<i class="far fa-check-circle"></i>
      		</div>
      		<div ng-if=" bannier == 'http://wallpapere.org/wp-content/uploads/2011/07/wallpapere-kungfu-panda.jpg'" >
      			<i class="far fa-check-circle"></i>
      		</div>
      	</div>
      	<div class="col-4"  style="border:1px solid #dd666c;padding: 10px">
      		<img id="proposition" src="http://wallpapere.org/wp-content/uploads/2011/07/hd-plus-one-wallpaper.jpg" style="height: 100px;width: 100%">
      		 <div id="selected" ng-click="changeBannier('http://wallpapere.org/wp-content/uploads/2011/07/hd-plus-one-wallpaper.jpg')">
      			<i class="far fa-check-circle"></i>
      		</div>
      		<div ng-if=" bannier == 'http://wallpapere.org/wp-content/uploads/2011/07/hd-plus-one-wallpaper.jpg'" >
      			<i class="far fa-check-circle"></i>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" ng-click="changeBannierAppliquer()" ng-disabled="bannier=='' || bannier == '{{Auth::user()->bannier}}'" >Enregistrer</button>
      </div>
    </div>
  </div>
</div>




<div class="loading" id="loading_iol">
	<i class="fas fa-circle-notch fa-spin"></i>
</div>
    
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
    <script src=" {{ url('/js/bootstrap.min.js') }} "></script>
    <!-- ALL PLUGINS -->
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular.min.js"></script>
    <script src=" {{ url('/js/main_script.js') }} "></script>
    <script>
    	var activer = true

			var uploader = $('<input type="file" class="exeptionelle" style="display:none" accept="image/*" />')
			$('.img').on('click', function () {
				console.log(activer)
				if (activer) {
			 		uploader.click()
				}

			})
			uploader.on('change', function () {

				$('.img').show();

				var reader = new FileReader()

				reader.onload = function(event) {

				  // button.prepend('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>Change</span></div>')

				if (event.target.result && event.target.result!="") {
					  
					$('.avatar .img').css("background-image", "url('" + event.target.result + "')"); }
			
				}

				reader.readAsDataURL(uploader[0].files[0])

			})



		$('#activeMoi').on('click',function(){
			$('#spanChange').css('display', 'block');
			active = true		
			console.log(active)
			uploader = $('<input type="file" class="exeptionelle" style="display:none" accept="image/*" />')
		});
		$('#activeInteret').on('click',function(){
			$('#spanChange').css('display', 'none');
			active = false
			console.log(active)
			uploader = ""
		});
		$('#activeAutre').on('click',function(){
			$('#spanChange').css('display', 'none');
			active = false
			console.log(active)
			uploader = ""
		});

		$('#banner').on('click',function(){
			$('#banneractive').trigger('click')
		});


    </script>
    </body>
</html>
