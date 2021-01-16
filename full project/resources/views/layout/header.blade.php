<!doctype html>
<html dir="ltr">
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/slick.css')}}">
		<link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
		<link rel="stylesheet" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" href="{{asset('fonts/css/all.min.css')}}">
	</head>
	
	<body>
	 
	 <nav class="navbar navbar-expand-lg navbar-light bg-primary">
			<a class="navbar-brand pull-right text-large" href="{{asset('/')}}"> Down<i class="fab fa-centercode"></i>Games</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			
		  
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav mr-auto">
				
				<li class="nav-item m-3">
				  <a class="nav-link" href="{{route('catagories')}}"> <i class="fas fa-gamepad"></i>catagories</a>
				</li>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2 bg-dark" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-warning my-2 my-sm-0 bg-dark" type="submit"><i class="fas fa-search"></i></button>
				  </form>
				@if(!Auth::check())
				  <div class= "nav-item ml-5   ">
				<li class="nav-item  border border-danger rounded bg-dark text-center ">
					<button type="button" class="btn text-light" data-toggle="modal" data-target="#exampleModalCenter5">
						login
					  </button>
				  </li>
				<li class="nav-item  border border-danger rounded bg-dark text-center">
				  <a class="nav-link text-light " href="{{route('register')}}">register</a>
				</li>
				</div>
				@else
					<li class="nav-item dropdown p-3 ml-auto">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a> 
									 <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a> 

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
					
					@if(auth::user()->role >0)
						<li class="nav-item m-3">
				  <a class="nav-link" href="{{route('admin')}}"> admin</a>
				</li>
				@endif
				@endif
				
				
			</div>
		  </nav>
		  <!-- Modal -->
					<div class="modal fade" id="exampleModalCenter5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">login</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
							<div class="modal-body">
								<section class="container ">
									<form action="{{route('login')}}" method="post" id="login-form">
									@csrf
										<label> Email&nbsp; &nbsp;&nbsp; &nbsp;</label>
										<input class=" rounded"type="text" name="email" placeholder="your email" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" title="your email must be like that name@domain-name.com" autocomplete="on" >
										 @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
										<br>
										
										<label> Password</label>
										<input class=" rounded"type="password" name="password" placeholder="password" pattern="^.{8,}$" title="your password must be 8 caharacters at least" autocomplete="on" >
												@error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror	
									
                               								
										<div class="modal-footer">
							<button type="submit" value="login" class="btn btn-primary">login</button>
							</div>
									</form>
								</section>
							</div>
							
						</div>
						</div>
					</div>
				<!-- #########################################################           -->