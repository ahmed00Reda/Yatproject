@include('layout.header')
	
		<section class="container ">
			<h1 class="text-center m-3"> Registeration </h1>
			<form  id="register-form" action="{{route('register')}}" method="post">
			@csrf
				
				

				<label class = "text-light">Your Name </label>
				
				<input class=""type="text" name="name" placeholder="ahmed" pattern="^[a-zA-Z ]+$" title="your name must be in English character only" autocomplete="on" >
				@error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				<label class = "text-light">Your Email</label>
				<input class=""type="text" name="email" placeholder="name@domain-name.com" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" title="your email must be like that name@domain-name.com" autocomplete="on" >
				@error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				<label class = "text-light">Your Phone <i class="fas fa-mobile-alt text-light"></i></label>
				<input class="" type="text" name="phone" placeholder="+201..." pattern="^\+?\d{10,}$" title="your phone must be at least 10 digits" autocomplete="on" >

				<label class = "text-light">Your Password</label>
				<input  class=""type="password" name="password" placeholder="at least 8 characters" pattern="^.{8,}$" title="your password must be 8 caharacters at least" autocomplete="on" >
				@error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				<label class = "text-light">Confirm Password</label>
				<input  class=""type="password" name="password_confirmation" placeholder="the same as password" pattern="^.{8,}$" title="confirm password must match the password" autocomplete="on" >
				

				<input type="submit" value="Register" title="Can't Register" data-content="you should match all validation first">
			
			</form>
			
			
			
			
		</section>
	
	
		@include('layout.footer')