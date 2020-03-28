var app = angular.module('IslandOfLoves', []
    , ['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
    }]);

app.controller('IolCTRL', ['$scope', '$http', function ($scope, $http) {
	
	$('#loading_iol').css('display', 'none')
	$scope.deleFavorie = function (favorieId) {
		$('#loading_iol').css('display', 'block')	

	      $http({
            method: 'POST',
            url: '/outOfFavorie',
            params:{favorie_id:favorieId}
            }).then(
			function(res){
				console.log(res)
				$('#loading_iol').css('display', 'none')
				location.reload();
			},
			function(error) {
				console.log(error)
				$('#loading_iol').css('display', 'none')
			});
	}
}]);


app.controller('AdminCTRL', ['$scope', '$http', function ($scope, $http) {
	
	$('#loading_iol').css('display', 'none')

	$scope.getAllUsers = function(){
		  $('#loading_iol').css('display', 'block')	
		  
		  $http({
			  method: 'POST',
			  url: '/findLoveAPI'
			}).then(
				function(res){
			console.log(res)
			$scope.users = res.data.users
			console.log(res.data.users)
			$scope.favories = res.data.favories
			$('#loading_iol').css('display', 'none')
		},
		function(error) {
			console.log(error)
			$('#loading_iol').css('display', 'none')
		});
	}

	$scope.getDate = function (stringdate) {
		return new Date(stringdate)
	}

	$scope.getAllUsers()
}]);




app.controller('IolProfilCTRL', ['$scope', '$http', function ($scope, $http) {

	$scope.userEx = {};
	$('#loading_iol').css('display', 'none')
	$scope.image = "Charger l\'image de l\'annonce";

  function dataURLtoFile(dataurl, filename) { 
	    var arr = dataurl.split(','),
	        mime = arr[0].match(/:(.*?);/)[1],
	        bstr = atob(arr[1]), 
	        n = bstr.length, 
	        u8arr = new Uint8Array(n);
		        
	    while(n--){
	      u8arr[n] = bstr.charCodeAt(n);
    	}
	    
	    return new File([u8arr], filename, {type:mime});
  }

  $scope.addPreference = function (preference) {
	  	var interet = [];
	  	if ($scope.userEx.interet) {
	  		if ($scope.isPreference(preference)) {
		  		interet = $scope.userEx.interet.split(",");
			  	var index = interet.indexOf(preference);
				if (index > -1) {
				  interet.splice(index, 1);
				}
	  		}
	  		else{
		  		interet = $scope.userEx.interet.split(",");
			  	interet.push(preference)
	  		}
	  	}
	  	else{
		  	interet.push(preference)
	  	}

		$scope.userEx.interet = interet.toString()
	  	console.log($scope.userEx.interet)
  }
  $scope.bannier = ""

  $scope.changeBannier = function (bannier) {
  	$scope.bannier = bannier
  	console.log(bannier)
  }
  $scope.changeBannierAppliquer = function () {
		$('#loading_iol').css('display', 'block	')

			$http({
            method: 'POST',
            url: '/editBanner',

            params:{
            	bannier:  $scope.bannier
            }
            }).then(
			function(res){
				$('#loading_iol').css('display', 'none')
				location.reload();
			},
			function(error) {
				$('#loading_iol').css('display', 'none')
				console.log(error)
			});
  }

  $scope.validerpreference = function (bio) {
		$('#loading_iol').css('display', 'block	')

			$http({
            method: 'POST',
            url: '/majUser2',
      		headers: {'Content-Type': undefined},
            params:{
            	bio:  bio?bio : $scope.userEx.bio,
            	interet: $scope.userEx.interet,
            }
            }).then(
			function(res){
				getUser()
				$('#loading_iol').css('display', 'none')
			},
			function(error) {
				$('#loading_iol').css('display', 'none')
				console.log(error)
			});
  }

  function getUserDetails() {
		$('#loading_iol').css('display', 'block')
	      $http({
	        method: 'POST',
	        url: '/userDeteils'
	        }).then(
			function(res){
				console.log(res.data.details)
				$scope.details = res.data.details
				$('#loading_iol').css('display', 'none')
			},
			function(error) {
				$('#loading_iol').css('display', 'none')
			});
  }


  function getUser() {
		$('#loading_iol').css('display', 'block')
	      $http({
	        method: 'POST',
	        url: '/getUser'
	        }).then(
			function(res){
				$scope.userEx = res.data.user
				$('#loading_iol').css('display', 'none')
			},
			function(error) {
				$('#loading_iol').css('display', 'none')
			});
  }

  $scope.isPreference = function (item) {
		if ($scope.userEx.interet!= null) {
			let interet = $scope.userEx.interet.split(",");
			return interet.includes(item)
		}
		return false
  }


  $scope.majuser = function (user) {
		if (user.password) {
			$('#loading_iol').css('display', 'block')

			let img = $('.img').css('background-image');
			img = img.replace('url(','').replace(')','').replace(/\"/gi, "");
			var fd = new FormData();

			if(img.indexOf("data:image") >= 0){
				img = dataURLtoFile(img,"image."+img.substring(img.indexOf("/")+1, img.indexOf(";")))
	    		fd.append('image',img);				
			}

			if((user.newpasseword && user.newrepasseword) && (user.newpasseword == user.newrepasseword)){

	    		fd.append('newpasseword',user.newpasseword);				
			}


			$http({
	        method: 'POST',
	        url: '/majUser',
	        data: fd,
	  		headers: {'Content-Type': undefined},
	        params:{
	        	name:  user.name?user.name : $scope.userEx.name,
	        	subname:  user.subname?user.subname : $scope.userEx.subname,
	        	nickname:  user.nickname?user.nickname : $scope.userEx.nickname,
	        	country:  user.country?user.country : $scope.userEx.country,
	        	town:  user.town?user.town : $scope.userEx.town,
	        	phone:  user.phone?user.phone : $scope.userEx.phone,
	        	profession:  user.profession?user.profession : $scope.userEx.profession,
	        	children:  user.children?user.children : $scope.userEx.children,
	        	email:  user.email?user.email : $scope.userEx.email,    
	        	password : user.password
	        }
	        }).then(
			function(res){
				getUser()
				$('#loading_iol').css('display', 'none')
			},
			function(error) {
				$('#loading_iol').css('display', 'none')
				console.log(error)
			});


		}      
  }
  getUser()
  getUserDetails()
}]);


app.controller('IolFindLoveCTRL', ['$scope', '$http', function ($scope, $http) {
	$scope.age = 0
	$scope.lowerthan = function(prop, val){
	    return function(item){
	    	console
	    	if (val == 0) {
	    		return item[prop]
	    	}
	    	else{
	    		return calculateAge(item[prop]) <= val;
	    	}

	      
	    }
	}
	function calculateAge(birthday) { // birthday is a date
		var maintenant = new Date()
	    var birthday =  new Date(birthday);
	    var ageDate = maintenant.getFullYear() - birthday.getFullYear() // miliseconds from epoch
	    return Math.abs(ageDate);
	}
	
	$('#loading_iol').css('display', 'none')
	$scope.addFavorie = function (userId) {
		$('#loading_iol').css('display', 'block')	

	      $http({
            method: 'POST',
            url: '/createFavorie',
            params:{user_id:userId}
            }).then(
			function(res){
				console.log(res)
				$('#loading_iol').css('display', 'none')
				location.reload();
			},
			function(error) {
				console.log(error)
				$('#loading_iol').css('display', 'none')
			});
	}
	$scope.deleteToFavorie = function (userId) {
		$('#loading_iol').css('display', 'block')	

	      $http({
            method: 'POST',
            url: '/deleteFavorie',
            params:{favorie_id:userId}
            }).then(
			function(res){
				console.log(res)
				$('#loading_iol').css('display', 'none')
				location.reload();
			},
			function(error) {
				console.log(error)
				$('#loading_iol').css('display', 'none')
			});
	}
	$scope.in_favorie = function(userID){
		var res =  false;
		for (var i = $scope.favories.length - 1; i >= 0; i--) {
			if($scope.favories[i].id == userID){
				res =  true;
			}
		}
		
		
		return res
	}
	$scope.chatWhit = function (user) {
		$scope.userOn = user
		console.log($scope.userOn)
		$('#OpenProfilUser').trigger("click");
	}
	$scope.acceptChat = function (user) {
		$('#loading_iol').css('display', 'block')
		 $http({
        method: 'POST',
        url: '/addLineMessage',
        params:{
        	user_to:user.id
        }
        }).then(
		function(res){
			$('#closeMinProfile').trigger('click')
			$('#loading_iol').css('display', 'none')
	  		var win = window.open("/"+$scope.language+"/chat?user="+user.id, '_blank');
				win.focus();
		},
		function(error) {
			console.log(error)
			$('#loading_iol').css('display', 'none')
		});

	}

	$scope.matchProfile = function(connectUser, otherUser){
				
		interet = 0;
		genre = 0;
		age = 0;

		// Interets

		if((connectUser.interet && connectUser.interet != null) && (otherUser.interet && otherUser.interet!=null)){

		
			let profile1_arr = connectUser.interet.split(",");
			let profile2_arr = otherUser.interet.split(",");
					
			for (let i = 0; i < profile1_arr.length; i++) {
				for (let k = 0; k < profile2_arr.length; k++) {
					if(profile1_arr[i] == profile2_arr[k]){
						++interet;					
					}			
				}		
			}
			interet = (interet * 100)/profile1_arr.length;
		}


		// GENRE
		if(connectUser.gender == "mal" || connectUser.gender == "homme"){
			if(otherUser.gender == "Female" ||  otherUser.gender == "femme"){
				genre = 100;
			}
		}


		// AGE
		let age1= new Date(connectUser.dob);
		let age2= new Date(otherUser.dob);

		age1 = age1.getFullYear();
		age2 = age2.getFullYear();

		// age1 = age1 - Date.now().getFullYear();
		// age2 = age2 - Date.now().getFullYear();

		age = Math.abs(age1 - age2);
		
		age = ((100 - age * 10) < 0)?0:100 - age * 10;



		// TAUX DE COMPATIBILITE



		tc = (interet*60)/100 + (genre*20)/100 + (age*15)/100;
		// console.log(connectUser)
		// console.log({"interet" : interet, "genre" : genre, "age" : connectUser.dob + " "+ age2});
		return tc;
	}
	$scope.user = "";


	$scope.getAllUsers = function(){
		  $('#loading_iol').css('display', 'block')	
		  
		  $http({
			  method: 'POST',
			  url: '/findLoveAPI'
			}).then(
				function(res){
			console.log(res)
			$scope.users = res.data.users
			$scope.favories = res.data.favories
			$('#loading_iol').css('display', 'none')
			for (let i = 0; i < $scope.users.length; i++) {
				const element = $scope.users[i];
				// console.log($scope.user);
				$scope.users[i].tc = $scope.matchProfile($scope.user.user,$scope.users[i])				
				
			}
		},
		function(error) {
			console.log(error)
			$('#loading_iol').css('display', 'none')
		});
	}

	function getUser() {
		$http({
		  method: 'POST',
		  url: '/getUser'
		  }).then(
		  function(res){
			  $scope.user = res.data;
			  $scope.getAllUsers();		
		  },
		  function(error) {
			  console.log(error)
		  });
  	}
	getUser();
	
	// $scope.viewProfile = function (user) {
		// 	$('#loading_iol').css('display', 'block')
	// 	 $http({
 //        method: 'get',
 //        url: '/profil-detail',
 //        params:{
 //        	user:user.id
 //        }
 //        }).then(
	// 	function(res){
	// 		$('#closeMinProfile').trigger('click')
	// 		$('#loading_iol').css('display', 'none')
	//   		var win = window.open("/profil-detail?user="+user.id);
	// 			win.focus();
	// 	},
	// 	function(error) {
	// 		console.log(error)
	// 		$('#loading_iol').css('display', 'none')
	// 	});

	// }
}]);


app.controller('IolTChatCTRL', ['$scope', '$http', function ($scope, $http) {
	
	$('#loading_iol').css('display', 'none')
	$scope.inChetUserId = 0
	user = null
	userTo = null
	chat = null
	$scope.chat = null
	$scope.messages
	
	var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

	    for (i = 0; i < sURLVariables.length; i++) {
	        sParameterName = sURLVariables[i].split('=');

	        if (sParameterName[0] === sParam) {
	            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
	        }
	    }
	};
	$scope.userOnUrl = getUrlParameter('user');
	document.getElementById('ecriture').style.display = 'none'



	$scope.messages = {}


	// function playAudio() { 
	//   x.play(); 
	// } 

	// function pauseAudio() { 
	//   x.pause(); 
	// } 
	function getUser() {
		      $http({
	            method: 'POST',
	            url: '/getUser'
	            }).then(
				function(res){
					user = res.data
					console.log(user.user.id)
					socket.emit('onLogin', user.user.id);
				},
				function(error) {
					console.log(error)
				});
		}


	function getLines() {
		$('#loading_iol').css('display', 'block')	
	      $http({
            method: 'POST',
            url: '/getLines'
            }).then(
			function(res){
				console.log(res.data.lines)
				$scope.lines = res.data.lines
					if ($scope.userOnUrl) {
						for (var i = $scope.lines.length - 1; i >= 0; i--) {
							if ($scope.lines[i].user.id == $scope.userOnUrl) {
								$scope.openChat($scope.lines[i].id);$scope.addUserTo($scope.lines[i].user)
								break;
							}
						}
						
					}
				$('#loading_iol').css('display', 'none')
			},
			function(error) {
				console.log(error)
				$('#loading_iol').css('display', 'none')
			});
	}
	$scope.addUserTo = function (user) {
		userTo = user.id
		$scope.userOnChat = user
	}
	$scope.openChat = function(message_line) {
		$('#loading_iol').css('display', 'block')	
	      $http({
            method: 'POST',
            url: '/getLineLessages',
            params:{
            	message_line:message_line
            }
            }).then(
			function(res){
				$scope.messages = res.data.messages
				chat = message_line
				$scope.chat = message_line

				$('#message_room').animate({scrollTop: 9999 },50)

				$('#loading_iol').css('display', 'none')
				$('#body').focus()
			},
			function(error) {
				console.log(error)
				$('#loading_iol').css('display', 'none')
			});
	}
	$scope.addMessage = function(body) {	


	      $http({
            method: 'POST',
            url: '/addMessageToline',
            params:{
            	message_line:chat,
            	body:body,
            }
            }).then(
			function(res){
				console.log('envoie du message => message='+body+";usert_to="+userTo)
				socket.emit('onSendMessage', {user_to:userTo,message:body});
				$scope.addToView(user.user.id,body)
				document.getElementById('body').value=''

				$('#loading_iol').css('display', 'none')
				$('#message_room').animate({scrollTop: $('#message_room').prop('scrollHeight') },50)
				$('#body').focus()
			},
			function(error) {
				console.log(error)
				$('#loading_iol').css('display', 'none')
			});
	}
	$scope.onwriyhing = function () {
		socket.emit('Imwhriting',{user_to:userTo,id:user.user.id});
	}

	getLines();
	getUser();



	var socket = io.connect('https://iolserve.herokuapp.com/');

	$scope.addToView = function(id,message){
		if (id == userTo || id == user.user.id) {
					let message_tempLocal = {
						id:           '',
						user_from:    id,
						message_line: '',
						body:         message,
						created_at:   "",
						updated_at:   ""
					   }
		$scope.messages.push(message_tempLocal)
		$('#message_room').animate({scrollTop: $('#message_room').prop('scrollHeight') },50)
		}

	}
	
	socket.on('IHaveSendMessage', (detail) => {
		var audioElement = document.createElement('audio');
    	audioElement.setAttribute('src', 'https://demo.islandofloves.com/audios/notification.mp3');
	    audioElement.addEventListener('ended', function() {
	        // this.play();
	    }, false);
	    audioElement.play();


		$scope.$applyAsync(function () {
		
         $scope.addToView(detail.id,detail.message)
      	});
		
	 	
    });

	 socket.on('PrepareYou', (userIO) => {
	 	console.log(userIO)
	 	if(userIO == $scope.userOnChat.id){
			document.getElementById('ecriture').style.display = 'flex'
			$('#message_room').animate({scrollTop: $('#message_room').prop('scrollHeight') },50)
			if (!(document.getElementById('ecriture').style.display === 'none')) {
	 		setTimeout(function(){ document.getElementById('ecriture').style.display = 'none';}, 8000);}
	 	}

	 	

	 	

    });

}]);


// var profile1 = "La Lecture,Reseaux sociaux,Jeu Video,Le Sport";
// var profile2 = "La Lecture,Reseaux sociaux";
// console.log("Match Profile : " + matchProfile(profile1, profile2));