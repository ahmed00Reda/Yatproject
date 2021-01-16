@include('layout.header')


				<section class="container bg-dark p-4">
				<div class="row ">
				@foreach($games as $game)
                    <div class="col-6 col-md-4 text-light p-2 ">
                        <h1 class="text-center">{{$game->name}}</h1>
                        <a href="{{route('details',$game->id)}}">
                        <img src="{{asset($game->main_image)}}" alt="horror"class="img-fluid  rounded">
                         </a>    

					</div>
					@endforeach
                   
                    
                    
                   
                    



                </div>
				



				</section>

				@include('layout.footer')