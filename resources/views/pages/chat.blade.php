



<!DOCTYPE html>

<html  ng-app="IslandOfLoves">

	<head>

		<title>Island Of Loves - Chat</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link rel="icon" type="image/png" href="{{url('images/apple-touch-icon.png')}}" />
        <link rel="apple-touch-icon" href="{{url('images/apple-touch-icon.png')}}">


		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!------ Include the above in your HEAD tag ---------->

        <link rel="stylesheet" type="text/css" 

        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

        

        <link rel="stylesheet" href="{{url('/css/chat_style.css')}}">

        

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>

        <script type="text/javascript" src="https://iolserve.herokuapp.com/socket.io/socket.io.js"></script>

            <script src=" https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular.min.js"></script>
    <script src=" {{ url('/js/main_script.js') }} "></script>

	</head>

	<!--Coded With Love By Mutiullah Samim-->

	<body ng-controller="IolTChatCTRL">

		<div class="container-fluid h-100">

			<div class="row h-100">

				<div class="col-md-4 col-xl-3 chat">

                    <div class="card contacts_card">

                        <div class="card-header">

                            <div class="input-group">

                                <input type="text" placeholder="Search..." name="" class="form-control search">

                                <div class="input-group-prepend">

                                    <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>

                                </div>

                            </div>

                        </div>

                        <div class="card-body contacts_body">

                            <ui class="contacts">

                            <li  ng-repeat="line in lines" ng-click='openChat(line.id);addUserTo(line.user)' class="@{{userOnChat.id == line.user.id ?'active' : ''}}">

                                <div class="d-flex bd-highlight">

                                    <div class="img_cont">

                                        <img src="@{{'/profile_picture/'+line.user.img}}" class="rounded-circle user_img">

                                        <span class="online_icon"></span>

                                    </div>

                                    <div class="user_info">

                                        <span>@{{ line.user.nickname }}</span>

                                        <p>@{{ line.user.nickname }} {{trans('application.chatPage.etat')}}</p>

                                    </div>

                                </div>

                            </li>

                            </ui>

                        </div>

					    <div class="card-footer"></div>

                    </div>

                </div>

				<div class="col-md-8 col-xl-9 chat">

					<div class="card">

						<div class="card-header msg_head" ng-if="chat">

							<div class="d-flex bd-highlight">

								<div class="img_cont">

									<img src="@{{'/profile_picture/'+userOnChat.img}}" class="rounded-circle user_img">

									<span class="online_icon"></span>

								</div>

								<div class="user_info">

									<span>@{{userOnChat.nickname}}</span>

									<p>@{{messages.length}} Messages</p>

								</div>

								<div class="video_cam">

									<span><i class="fas fa-video"></i></span>

									<span><i class="fas fa-phone"></i></span>

								</div>

							</div>

							<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>

							<div class="action_menu">

								<ul>

									<li><i class="fas fa-user-circle"></i> {{trans('application.chatPage.profil')}}</li>

									<li><i class="fas fa-users"></i> {{trans('application.chatPage.favori')}}</li>

									<!-- <li><i class="fas fa-plus"></i> Add to group</li> -->

									<li><i class="fas fa-ban"></i> {{trans('application.chatPage.bloquer')}}</li>

								</ul>

							</div>

						</div>

						<div class="card-body msg_card_body" id="message_room">
							<div ng-repeat='message in messages'>
								<div class="d-flex justify-content-start mb-4" ng-hide="message.user_from == '{{Auth::user()->id}}'">

										<div class="img_cont_msg">

											<img src="@{{'/profile_picture/'+userOnChat.img}}" class="rounded-circle user_img_msg">

										</div>

										<div class="msg_cotainer">

											@{{message.body}}

											<span class="msg_time">8:40, Aujourd'hui</span>

										</div>
								</div>

								<div class="d-flex justify-content-end mb-4" ng-show="message.user_from == '{{Auth::user()->id}}'">

									<div class="msg_cotainer_send">

										@{{message.body}}

										<span class="msg_time_send">8:55, Aujourd'hui</span>

									</div>

									<div class="img_cont_msg">

		                                <img src="{{ url('/profile_picture/'.Auth::user()->img  )}}" class="rounded-circle user_img_msg">

									</div>
								</div>
							</div>
							<div class="justify-content-start mb-4" id="ecriture">

									<div class="img_cont_msg">

										<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">

									</div>

									<div class="msg_cotainer">

										{{trans('application.chatPage.statut')}} ...

									</div>
							</div>

						</div>

						<div class="card-footer" ng-if="chat">

							<div class="input-group">

								<div class="input-group-append">

									<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>

								</div>

								<textarea name="" ng-model="body" id='body' class="form-control type_msg" placeholder="Type your message..." ng-keydown="onwriyhing()"></textarea>

								<div class="input-group-append" ng-click='addMessage(body,userTo)'>

									<span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

    </body>

    <script>

    	$(document).ready(function(){

            $('#action_menu_btn').click(function(){

                $('.action_menu').toggle();

            });

        });

    </script>

</html>

