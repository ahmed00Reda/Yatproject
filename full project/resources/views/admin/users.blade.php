@include('layout.header')

		  <h1 class="text-center m-5 d-block"> Users</h1>
		  <nav>
		  <div class="navbar p-5  ">
		    <a  href="{{route('admin')}}"class="text-light" ><i class="fas fa-table"></i> dashboard</a>
			<a href="{{route('users')}}" class="text-light"><i class="fa fa-fw fa-user active"></i> users</a>
			<a href="{{route('games')}}"class="text-light"><i class="fas fa-gamepad"></i> Games</a>
			
		  </div>
		</nav>

		  
		
    </div>
    <div class="w-50 mx-auto m-5">
    <button type="button" class="btn btn-danger btn-lg btn-block " data-toggle="modal" data-target="#exampleModalCenter">Add User</button>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">add user</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
							<div class="modal-body">
							<form  id="register-form" action="{{route('add_user')}}" method="post">
							@csrf
			
				
				

				<label class = "text-dark"> Name </label>
				
				<input class=""type="text" name="name" placeholder="ahmed" pattern="^[a-zA-Z ]+$" title="your name must be in English character only" autocomplete="on" >
				
				<label class = "text-dark">Email</label>
				<input class=""type="text" name="email" placeholder="name@domain-name.com" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" title="your email must be like that name@domain-name.com" autocomplete="on" >

				
				<label class = "text-dark"> Password</label>
				<input name="password" class=""type="password" name="password" placeholder="at least 8 characters" pattern="^.{8,}$" title="your password must be 8 caharacters at least" autocomplete="on" >
				<label class = "text-dark">Confirm Password</label>
				<input  class=""type="password" name="confirm-password" placeholder="the same as password" pattern="^.{8,}$" title="confirm password must match the password" autocomplete="on" >

				<div class="form-check">
						<input class="form-check-input" value="1"type="radio" name="radio" id="flexRadioDefault1">
						<label class="form-check-label" for="flexRadioDefault1">
							Admin
						</label>
						</div>
						<div class="form-check">
						<input class="form-check-input" value="0" type="radio" name="radio" id="flexRadioDefault2" checked>
						<label class="form-check-label" for="flexRadioDefault2">
							user
						</label>
				</div>
				<br>
				<br>
			
			

				<input type="submit" value="add" title="Can't Register" data-content="you should match all validation first">
			
			</form>
							</div>
							
						</div>
						</div>
					</div>
				<!-- #########################################################           -->
				@foreach($users as $user )
				<!-- Modal  editing -->
				<div class="modal fade" id="user{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
									<form  id="register-form" action="{{route('update_user',$user->id)}}" method="post">
									@csrf
									<label> Name&nbsp; &nbsp;&nbsp; &nbsp;</label>
										<input class=" rounded"type="text" name="name" value="{{$user->name}}"placeholder="your name"   >
										<br>
										<label> Email&nbsp; &nbsp;&nbsp; &nbsp;</label>
										<input class=" rounded"type="text" name="email" value="{{$user->email}}" placeholder="your email" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" title="your email must be like that name@domain-name.com" autocomplete="on" >
										<br>
										
										<label> Password</label>
										<input class=" rounded" name="password" value="{{$user->password}}"placeholder="password" pattern="^.{8,}$" title="your password must be 8 caharacters at least" autocomplete="on" >
						
										<button type="submit" value="update" class="btn btn-primary">update</button>
									</form>
								</section>
							</div>
							<div class="modal-footer">
							
							</div>
						</div>
						</div>
					</div>
				<!-- #########################################################           -->
				@endforeach
		<div id="section-table">
		<table id = "content-table" class="table table-striped table-dark mt-5 ">
			<thead>
			  <tr>
				<th scope="col">#</th>
				<th scope="col"> name </th>
				<th scope="col">email</th>
				<th scope="col">password</th>
				<th scope="col">role</th>
				<th scope="col">created_at</th>
				<th scope="col"> editing</th>
				<th scope="col">deleting</th>
			  </tr>
			</thead>
			<tbody>
				@foreach($users as $user )
			  <tr>
				<th >{{$loop->iteration}}</th>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->password}}</td>
				<td>@if($user->role == 0)
					{{"user"}}
					@else {{"admin"}}
					@endif 
					
				</td>
				<td>{{$user->created_at}}</td>
				<td><input class= "bg-succes"type="submit" value="edit" data-toggle="modal" data-target="#user{{$user->id}}"title="editing"></td>
				<td><a class=" btn btn-danger delete" href="{{route('delete_user', $user->id)}}">delete</a></td>
			  </tr>
			  @endforeach
			  
			</tbody>
		  </table>
		  </div>
	
		
@include('layout.footer')