@include('layout.header')

		  <h1 class="text-center m-5 d-block"> dashboard </h1>
		  <nav>
		  <div class="navbar p-5  ">
			<a  href="{{route('admin')}}"class="text-light"><i class="fas fa-table "></i> dashboard</a>
			<a href="{{route('users')}}"class="text-light"><i class="fa fa-fw fa-user"></i> users</a>
			<a href="{{route('games')}}" class="text-light"><i class="fas fa-gamepad"></i> Games</a>
			
		  </div>
		</nav>
		  
		<section id="dashboard" class="container mx-auto m-5 ">
			
				<div class=" w-25">
				<h2>vistors</h2>
				<h3>1500</h3>
				</div>
				<div class=" w-25">
				<h2>users</h2>
				<h3>{{$counter_user}}</h3>
				</div>
				<div class="w-25">
				<h2>total games</h2>
				<h3>{{$counter_game}}</h3>
				</div>
			
	    	
				<div class="w-25">
					<h2>admins</h2>
					<h3>{{$counter_admin}}</h3>
				</div>
				<div class="w-25">
					<h2>catagories</h2>
					<h3>{{$counter_catagory}}</h3>
				</div>
				<div class="w-25">
					<h2>companies</h2>
					<h3>{{$counter_company}}</h3>
					
				</div>
			
			
			
			
			
			
		</section>
	</div>
	@include('layout.footer')