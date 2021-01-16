@include('layout.header')

		  <h1 class="text-center m-5 d-block"> Games</h1>
		  <nav>
		  <div class="navbar p-5  ">
			<a  href="{{route('admin')}}"class="text-light" ><i class="fas fa-table"></i> dashboard</a>
			<a href="{{route('users')}}" class="text-light"><i class="fa fa-fw fa-user active"></i> users</a>
			<a href="{{route('games')}}"class="text-light"><i class="fas fa-gamepad"></i> Games</a>
			
		  </div>
        </nav>
		<div class="w-50 mx-auto m-5">
    <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter">Add Game</button>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">add game</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
							<div class="modal-body">
							<form  id="register-form" action="{{route('add_game')}}" enctype="multipart/form-data" method="post">
							@csrf
			
				
				

				<label class = "text-dark"> Name </label>
				
				<input class=""type="text" name="name" placeholder=""  title="a name must be in English character only" autocomplete="on" >
				
				
				<label class = "text-dark"> description</label>
				<textarea class="form-control pb-5 col-12 mb-4" type="text" name="description"  required="required" data-error="description requird" style="font-family: DroidArabicNaskh"></textarea>
				<label class = "text-dark"> company </label>
				<input class=""type="text" name="company_id"   required="required"  >
				<label class = "text-dark"> category </label>
				<input class=""type="text" name="catagory_id"  required="required" >
				<label for="file-input" >main image</label>
						<input type="file" id="file-input" name="main_image" class="form-control-file">

						 <label for="file-multiple-input" class=" form-control-label">Another images</label>
						<input type="file"  name="multiple_images[]" multiple="" >
				<label for="birthday">releasd at </label>
 				 <input type="date" id="released" name="released">
			

				<input type="submit" value="add" title="Can't Register" data-content="you should match all validation first">
			
			</form>
							</div>
							
						</div>
						</div>
					</div>
				<!-- #########################################################           -->
	
				@foreach($games as $game)
						<div class="modal fade" id="game{{$game->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">edit game</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
							<div class="modal-body">
							<form  id="register-form" action="{{route('update_game', $game->id)}}" enctype="multipart/form-data"method="post">
						@csrf

				<label class = "text-dark"> Name </label>
				
				<input class=""type="text" value="{{$game->name}}" name="name" placeholder=""  title="a name must be in English character only" autocomplete="on" >
				
				
				<label class = "text-dark"> description</label>
				<textarea class="form-control pb-5 col-12 mb-4"   type="text" name="description"  required="required" data-error="description requird" style="font-family: DroidArabicNaskh">{{$game->description}}</textarea>
				<label class = "text-dark"> company </label>
				<input class="col-6"type="text" name="company_id"  value="{{$game->company_id}}" title="you must enter num" required="required"  >
				<label class = "text-dark"> category </label>
				<input class="col-6"type="text" name="catagory_id"  value="{{$game->catagory_id}}"  title="you must enter num" required="required" >
				<label for="birthday">releasd at </label>
 				 <input type="date" id="released" value="{{$game->released_at}}"  name="released">
			

				<input type="submit" value="update" title="Can't Register" data-content="you should match all validation first">
			
			</form>
							</div>
							
						</div>
						</div>
					</div>
				
			    @endforeach
		<div id = "section-table">
		<table id="content-table" class="table table-striped table-dark mt-5 ">
			<thead>
			  <tr>
				<th scope="col">#</th>
				<th scope="col">Game </th>
				<th scope="col">year</th>
				<th scope="col">description</th>
				<th scope="col">image</th>
                <th scope="col">catagory</th>
                <th scope="col">company</th>
                <th scope="col">rate</th>
				<th scope="col"> editing</th>
				<th scope="col">deleting</th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
				  @foreach($games as $game)
				<th >{{$loop->iteration}}</th>
				<td>{{$game->name}}</td>
				<td>{{$game->released_at}}</td>
				<td>{{$game->description}}</td>
				<td><img src="{{asset($game->main_image)}}" alt="{{$game->name}}" height="100" width="100"></td>
                <td>{{$game->catagory->name}}</td>
                <td>{{$game->company->name}}</td>
                <td>{{$game->rating}}</td>
				<td><input class= "bg-succes"type="submit" value="edit" data-toggle="modal" data-target="#game{{$game->id}}"title="editing"></td>
				<td><a class=" btn btn-danger delete" href="{{route('delete_game', $game->id)}}">delete</a></td>
			  </tr>
			  @endforeach
			  
			
			   
			</tbody>
		  </table>
		  </div>

	
		
@include('layout.footer')