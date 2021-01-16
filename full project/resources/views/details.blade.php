@include('layout.header')
				<section class="container bg-dark">

					<div  class= " mx-auto m-5 text-center " >
						<h2 class="p-5">{{$game->name}}</h2>
					
						<img src="{{asset($game->main_image)}}" alt="" class= "w-75 mx-auto m-5 " >
					

				</div>
				<h2 class="text-center">description</h2>
				<p class="text-light  text-center">{{$game->description}}</p>
				<div class="text-center"> 
					<span class="d-block text-light  m-5"> released At  {{$game->released_at}}</span>
					<div class="text-light m-5">
					<span class=" m-5 p-3" >Catagory : {{$game->catagory->name}}</span>
					<span class=" m-5 p-3" >Company : {{$game->company->name}}</span>
					</div>

					<div class="text-light m-5">
						<span class=" m-5">downloads :151651 </span>
						<span class="m-5"> rate : 9.5</span>
						</div>
				</div>
				@foreach($game->images as $image)
				<div  class= "  mx-auto m-5 text-center " >
					
					<img src="{{asset($image->image)}}" alt="" class= "w-50 mx-auto m-5 " >

				</div>
				@endforeach



				</section>

				@include('layout.footer')