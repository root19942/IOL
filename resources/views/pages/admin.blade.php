<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="IslandOfLoves" >
<head>
  <meta charset="UTF-8">
  <title>Isalndofloves - admin</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,600" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.selectric/1.10.1/selectric.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>

<link rel="stylesheet" href="{{url('css/admin.css')}}">

</head>
<body  ng-controller="AdminCTRL">
<!-- partial:index.partial.html -->
<nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Islandofloves</a>
	<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
	<ul class="navbar-nav px-3">
		<li class="nav-item text-nowrap">
			<a class="nav-link" href="#">Decconection</a>
		</li>
	</ul>
</nav>
<div class="container-fluid">
	<div class="row">
		<nav class="col-md-2 d-none d-md-block sidebar">
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link active" href="#">
                  <i class="zmdi zmdi-widgets"></i>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
                  <i class="zmdi zmdi-file-text"></i>
                  App monitor
                </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
                  <i class="zmdi zmdi-shopping-cart"></i>
                  Abonement
                </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
                  <i class="zmdi zmdi-accounts"></i>
                  Administrator
                </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
                  <i class="zmdi zmdi-chart"></i>
                  Reports
                </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
                  <i class="zmdi zmdi-layers"></i>
                  Moduls
                </a>
					</li>
				</ul>

			</div>
		</nav>
		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 my-3">
			<div class="card-list">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
						<div class="card blue">
							<div class="title">Users</div>
							<i class="zmdi zmdi-upload"></i>
							<div class="value"> @{{users.length}}</div>
							<div class="stat"><b>13</b>% increase</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
						<div class="card green">
							<div class="title">Pay users</div>
							<i class="zmdi zmdi-upload"></i>
							<div class="value">5,990</div>
							<div class="stat"><b>4</b>% increase</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
						<div class="card orange">
							<div class="title">total budget</div>
							<i class="zmdi zmdi-download"></i>
							<div class="value">$80,990</div>
							<div class="stat"><b>13</b>% decrease</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
						<div class="card red">
							<div class="title">Admin account</div>
							<i class="zmdi zmdi-download"></i>
							<div class="value">3</div>
							<div class="stat"><b>13</b>% decrease</div>
						</div>
					</div>
				</div>
			</div>
			<div class="projects mb-4">
				<div class="projects-inner">
					<header class="projects-header">
						<div class="title">User List</div>
						<div class="count">| @{{users.length}} users</div>
						<i class="zmdi zmdi-download"></i>
					</header>
					<table class="projects-table">
						<thead>
							<tr>
								<th>User</th>
								<th>Inscription</th>
								<th>Profile</th>
								<th>account</th>
								<th>Status</th>
								<th class="text-right">Actions</th>
							</tr>
						</thead>
						<tr ng-repeat='user in users'>
							<td>
								<p>@{{user.name+" "+user.subname}}</p>
								<p>@{{user.nickname}}</p>
							</td>
							<td>
								<p>@{{getDate(user.created_at) | date }}</p>
								{{-- <p class="text-danger">Overdue</p> --}}
							</td>
							<td class="member">
								<figure><img src="@{{'/profile_picture/' + user.img  }}" /></figure>
								<div class="member-info">
									<p>Voir son profil</p>
								</div>
							</td>
							<td>
								<p>$4,670</p>
								<p>Paid</p>
							</td>
							<td class="status">
								<span class="status-text status-green">active</span>
							</td>
							<td>
								<form class="form" action="#" method="POST">
								<select class="action-box">
									<option>Actions</option>
									<option>Blocked</option>
									<option>Send Mail</option>
									<option>Update Paiment</option>
								</select>
								</form>
							</td>
						</tr>
						{{-- <tr class="danger-item">
							<td>
								<p>New Dashboard</p>
								<p>Google</p>
							</td>
							<td>
								<p>17th Oct, 15</p>
								<p class="text-danger">Overdue</p>
							</td>
							<td class="member">
								<figure><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/584938/people_8.png" /></figure>
								<div class="member-info">
									<p>Myrtle Erickson</p>
									<p>UK Design Team</p>
								</div>
							</td>
							<td>
								<p>$4,670</p>
								<p>Paid</p>
							</td>
							<td class="status">
								<span class="status-text status-red">Blocked</span>
							</td>
							<td>
								<form class="form" action="#" method="POST">
									<select class="action-box">
										<option>Actions</option>
										<option>Blocked</option>
										<option>Send Mail</option>
										<option>Update Paiment</option>
									</select>
								</form>
							</td>
						</tr>
						<tr>
							<td>
								<p>New Dashboard</p>
								<p>Google</p>
							</td>
							<td>
								<p>17th Oct, 15</p>
								<p class="text-danger">Overdue</p>
							</td>
							<td class="member">
								<figure><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/584938/people_8.png" /></figure>
								<div class="member-info">
									<p>Myrtle Erickson</p>
									<p>UK Design Team</p>
								</div>
							</td>
							<td>
								<p>$4,670</p>
								<p>Paid</p>
							</td>
							<td class="status">
								<span class="status-text status-orange">In progress</span>
							</td>
							<td>
								<form class="form" action="#" method="POST">
									<select class="action-box">
										<option>Actions</option>
										<option>Blocked</option>
										<option>Send Mail</option>
										<option>Update Paiment</option>
									</select>
								</form>
							</td>
						</tr>
						<tr>
							<td>
								<p>New Dashboard</p>
								<p>Google</p>
							</td>
							<td>
								<p>17th Oct, 15</p>
								<p class="text-danger">Overdue</p>
							</td>
							<td class="member">
								<figure><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/584938/people_8.png" /></figure>
								<div class="member-info">
									<p>Myrtle Erickson</p>
									<p>UK Design Team</p>
								</div>
							</td>
							<td>
								<p>$4,670</p>
								<p>Paid</p>
							</td>
							<td class="status">
								<span class="status-text status-blue">Early stages</span>
							</td>
							<td>
								<form class="form" action="#" method="POST">
									<select class="action-box">
										<option>Actions</option>
										<option>Blocked</option>
										<option>Send Mail</option>
										<option>Update Paiment</option>
									</select>
								</form>
							</td>
						</tr>
						<tr>
							<td>
								<p>New Dashboard</p>
								<p>Google</p>
							</td>
							<td>
								<p>17th Oct, 15</p>
								<p class="text-danger">Overdue</p>
							</td>
							<td class="member">
								<figure><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/584938/people_8.png" /></figure>
								<div class="member-info">
									<p>Myrtle Erickson</p>
									<p>UK Design Team</p>
								</div>
							</td>
							<td>
								<p>$4,670</p>
								<p>Paid</p>
							</td>
							<td class="status">
								<span class="status-text status-orange">In progress</span>
							</td>
							<td>
								<form class="form" action="#" method="POST">
									<select class="action-box">
									<option>Actions</option>
										<option>Blocked</option>
										<option>Send Mail</option>
										<option>Update Paiment</option>
									</select>
								</form>
							</td>
						</tr> --}}
					</table>
				</div>
			</div>

		</main>
	</div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src='https://cdn.jsdelivr.net/jquery.selectric/1.10.1/jquery.selectric.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js'></script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular.min.js"></script>
    <script src=" {{ url('/js/main_script.js') }} "></script>

<script  src="{{url('js/script.css')}}"></script>

</body>
</html>
