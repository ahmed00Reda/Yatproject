@include('layout.header')
				<section class="container bg-dark p-4 mt-5 mb-5">
				<div class="row ">
					@foreach($catagories as $catagory)
                    <div class="col-6 col-md-4 text-light p-2 ">
                        <h1 class="text-center">{{$catagory->name}}</h1>
                        <a href="{{route('catagory_games',$catagory->id)}}">
                        <img src="{{asset($catagory->catagory_img)}}" alt="horror"class="img-fluid  rounded-circle">
                         </a>    

                    </div>
                   
                    @endforeach



                </div>
				



				</section>

				@include('layout.footer')