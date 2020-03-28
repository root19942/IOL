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
		  <style type="text/css">
		  	.userDetail{
				font-size: 3vh;
			    font-family: monospace;
			    color: #303F9F;
			    font-weight: 650;
			}

		  </style>
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
							<li><a class="nav-link active" href="{{ route('findLove', ['locale' => $locale]) }}">{{ trans('application.rencontre') }}</a></li>
							<li><a class="nav-link" href="{{ route('event', ['locale' => $locale]) }}">{{ trans('application.evenement') }}</a></li>
							<li><a class="nav-link" href="{{ route('histoire', ['locale' => $locale]) }}">{{ trans('application.histoires') }}</a></li>


                        @if (Route::has('login'))
                                @auth
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fas fa-user"></i> &nbsp;
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                            

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
                        	<li><a class="nav-link" href="{{ route('profil-detail', ['locale' => 'fr','id'=> $user->id ]) }}">FR</a></li>
                        @endif
                        @if (app()->getLocale() == "fr")
                        	<li><a class="nav-link" href="{{ route('profil-detail', ['locale' => 'en','id'=> $user->id]) }}">EN</a></li>
                        @endif
						</ul>
					</div>
				</div>
			</nav>
		</header>

    	<!-- End Contact -->


<body class="profile-page">    
    <div class="page-header header-filter" data-parallax="true" style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');"></div>
    <div class="main main-raised">
		<div class="profile-content">
            <div class="container-fluid">
                <div class="row">
	                <div class="col-md-6 ml-auto mr-auto">
        	           <div class="profile">
	                        <div class="avatar">
										<div class="img" style="background-image: url({{ url('/profile_picture/'.$user->img  )}});" rel="'https://www.biography.com/.image/ar_1:1%2Cc_fill%2Ccs_srgb%2Cg_face%2Cq_auto:good%2Cw_300/MTU0NjQzOTk4OTQ4OTkyMzQy/ansel-elgort-poses-for-a-portrait-during-the-baby-driver-premiere-2017-sxsw-conference-and-festivals-on-march-11-2017-in-austin-texas-photo-by-matt-winkelmeyer_getty-imagesfor-sxsw-square.jpg'">
											<span id="spanChange">{{ trans('application.profilDetailPage.photo') }}</span>
											<!-- <input type="file" id="image" accept="image/*" style="display: none" /> -->
										</div>
	                        </div>
	                        <div class="name">
	                            <h3 class="title">{{ $user->name ." ". $user->subname }}
	                            	<br>
	                            {{ " (".$user->nickname.")"}}</h3>
								<h6>{{$user->profession}}</h6>
								
	                        </div>
	                    </div>
    	            </div>
                </div>
                <div class="description text-center">
                    <p> {{$user->bio}} </p>
                </div>
				<div class="row">					
					<div class="col-md-6 ml-auto mr-auto">
						<div class="profile-tabs">
							<ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" href="#moi" role="tab" data-toggle="tab">
									<i class="fas fa-user"></i>
										{{ trans('application.profilDetailPage.apropos.titre') }} {{$user->nickname}}
									</a>
										
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#interets" role="tab" data-toggle="tab">
									<i class="fas fa-heart"></i>
									{{ trans('application.profilDetailPage.interet.titre') }}
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
										<label class="titreProfile" for="nickname">{{ trans('application.profilDetailPage.apropos.surnom') }}:</label>
										<input disabled type="text" class="form-control userDetail" id="nickname" aria-describedby="nicknameHelp" placeholder="Entrer votre surnom" ng-model="user.nickname" ng-value="'{{$user->nickname}}'">
									</div>
									<div class="form-group">
										<label class="titreProfile" for="name">{{ trans('application.profilDetailPage.apropos.nom') }}:</label>
										<input disabled type="text" ng-model="user.name" ng-value="'{{$user->name}}'" class="form-control userDetail" id="name" aria-describedby="nameHelp" placeholder="Entrer votre nom">
									</div>
									<div class="form-group">
										<label class="titreProfile" for="subname">{{ trans('application.profilDetailPage.apropos.prenom') }}:</label>
										<input disabled type="text" ng-model="user.subname" ng-value="'{{$user->subname}}'" class="form-control userDetail" id="subname" aria-describedby="subnameHelp" placeholder="Entrer votre prenom">
									</div>
									<div class="form-group">
										<label class="titreProfile" for="telephone">{{ trans('application.profilDetailPage.apropos.telephone') }}:</label>
										<input disabled type="tel" ng-model="user.phone" ng-value="'{{$user->phone}}'" class="form-control userDetail" id="profession" aria-describedby="telephoneHelp" placeholder="Entrer votre telephone">
									</div>
							</div>
							<div class="col-4">
									<div class="form-group">
										<label class="titreProfile" for="children">{{ trans('application.profilDetailPage.apropos.enfant') }}:</label>
										<input disabled type="number" ng-model="user.children" ng-value="'{{$user->children}}'" class="form-control userDetail" id="children" aria-describedby="childrenHelp" placeholder="Entrer votre surnom">
									</div>
									<div class="form-group">
										<label class="titreProfile" for="email">{{ trans('application.profilDetailPage.apropos.email') }}:</label>
										<input disabled type="email" ng-model="user.email" ng-value="'{{$user->email}}'" class="form-control userDetail" id="email" aria-describedby="emailHelp" placeholder="Entrer votre email">
									</div>
									<div class="form-group">
										<label class="titreProfile" for="country">{{ trans('application.profilDetailPage.apropos.pays') }}:</label>
										<input disabled type="text" ng-model="user.country" ng-value="'{{$user->country}}'"class="form-control userDetail" id="country" aria-describedby="countryHelp" placeholder="Entrer votre pays">
									</div>
									<div class="form-group">
										<label class="titreProfile" for="ville">{{ trans('application.profilDetailPage.apropos.ville') }}:</label>
										<input disabled type="text" ng-model="user.town" ng-value="'{{$user->town}}'" class="form-control userDetail" id="ville" aria-describedby="villeHelp" placeholder="Entrer votre ville">
									</div>
							</div>
							<div class="col-4">
									<div class="form-group">
										<label class="titreProfile" for="work">{{ trans('application.profilDetailPage.apropos.profession') }}</label>
										<input disabled type="text" ng-model="user.profession"  ng-value="'{{$user->profession}}'" class="form-control userDetail" id="work" aria-describedby="workHelp" placeholder="Entrer votre profession">
									</div>
							</div>	
							<div class="col-6 offset-3">
								<br>
						</form>
							</div>	
						</div>
				</div>
				<div class="tab-pane text-center gallery" id="interets">
						<div class="row" style="justify-content: center;">
							<div class="col-12">
								<div class="title-box">
									<h2>{{ trans('application.profilDetailPage.interet.soustitre') }} {{$user->nickname}}</h2>
									<br><br>
								</div>
							</div>						
							<div class="row">
								<div class="flip-box col-4"  ng-show="isPreference('LA TECK')" >
									<div class="flip-box-inner">								
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/38136/pexels-photo-38136.jpeg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<!-- <h1 class="text-shadow">LA TECH</h1> -->								
											<h1 class="flip-box-front-content">LA TECH &nbsp;</h1>

										</div>								
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>LA TECH</h2>
												<p>Pour vous detendre et profiter des arbres .</p>
											</div>
										</div>
									</div>
								</div>

								<div class="flip-box col-4"  ng-show="isPreference('La Lecture')">
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34950/pexels-photo.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">La Lecture &nbsp;</h1>
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


								<div class="flip-box col-4"  ng-show="isPreference('Reseaux sociaux')">
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34546/sunset-lake-landscape-summer.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">Reseaux sociaux &nbsp; </h1>
										</div>
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>Reseaux sociaux</h2>
												<p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
											</div>
										</div>
									</div>
								</div>


								<div class="flip-box col-4"  ng-show="isPreference('La Plage')" >
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34546/sunset-lake-landscape-summer.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">La Plage &nbsp;</hi>
										</div>
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>La Plage</h2>
												<p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
											</div>
										</div>
									</div>
								</div>
								<div class="flip-box col-4"  ng-show="isPreference('Decouvertes')">
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34546/sunset-lake-landscape-summer.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">Decouvertes &nbsp;</hi>
										</div>
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>Decouvertes</h2>
												<p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
											</div>
										</div>
									</div>
								</div>
								<div class="flip-box col-4"  ng-show="isPreference('Jeu Video')">
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34546/sunset-lake-landscape-summer.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">Jeu Video &nbsp;</hi>
										</div>
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>Jeu Video</h2>
												<p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
											</div>
										</div>
									</div>
								</div>
								<div class="flip-box col-4" ng-show="isPreference('Le Style')">
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34546/sunset-lake-landscape-summer.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">Le Style &nbsp;</hi>
										</div>
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>Le Style</h2>
												<p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
											</div>
										</div>
									</div>
								</div>
								<div class="flip-box col-4" ng-show="isPreference('Les Sport')">
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34546/sunset-lake-landscape-summer.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">Le Sport &nbsp;</hi>
										</div>
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>Le Sport</h2>
												<p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
											</div>
										</div>
									</div>
								</div>
								<div class="flip-box col-4" ng-show="isPreference('Les Voitures')">
									<div class="flip-box-inner">
										<div class="flip-box-front" style="background-image: url(https://images.pexels.com/photos/34546/sunset-lake-landscape-summer.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
											<h1 class="flip-box-front-content">Les Voitures &nbsp;</hi>
										</div>
										<div class="flip-box-back">
											<div class="flip-box-back-content">
												<h2>Les Voitures</h2>
												<p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
											</div>
										</div>
									</div>							
								</div>
							</div>
						</div>
					</div>
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
{{--     <script>
    	function uploadOfImage() {

			var button = $('.img')			

			var uploader = $('<input type="file" accept="image/*" />')
			button.on('click', function () {
			  uploader.click()

			})
			uploader.on('change', function () {

				button.show();

				var reader = new FileReader()

				reader.onload = function(event) {

				  // button.prepend('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>Change</span></div>')

				if (event.target.result && event.target.result!="") {
					  
					$('.avatar .img').css("background-image", "url('" + event.target.result + "')"); }
			
				}

				reader.readAsDataURL(uploader[0].files[0])

			})

		}
		uploadOfImage();
		// console.log($( "#moi" ).on('shown.bs.tab')[0].hidden)
		$( "#moi" ).on('shown.bs.tab'), function(event){
			
		};
    </script> --}}
    </body>
</html>
