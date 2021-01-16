@include('layout.header')
		  	<section  class="hot-items w-75 mx-auto m-3" >
				  <h1 >
					<i class="fab fa-gripfire"></i>  Hot</h1>
				  <div  class="autoplay">
				  <img class="img-thumbnail" src="images/pes.jpg" alt="pes cover">
				  <img class="img-thumbnail"src="images/fifa.jpg" alt="fifa cover">
				  <img class="img-thumbnail"src="images/gta.jpg" alt="gta cover">
				  <img class="img-thumbnail"src="images/pubg.jpg" alt=" pubg cover">
				  <img class="img-thumbnail"src="images/farcry.png" alt="farcry cover">
				  <img class="img-thumbnail"src="images/fortnite.jpg" alt="fortnite cover">
				</div>


			  </section>
			  <section class=" new-games w-75 mx-auto m-5 p-5 ">
				  <h2>New Games</h2>
				  <div class="items">
					<img src="images/new.jpg" alt="">
					<img src="images/new2.jpg" alt="">
					<img src="images/new3.jpg" alt="">
					<img src="images/new4.jpg" alt="">
				</div>
			  </section>
			  <section class=" trending w-75 mx-auto m-5 p-5" >
				  <h2>Trending</h2>
				  <div class="items">
				  <img src="images/tend1.jpg" alt="">
				  <img src="images/trend2.jpg" alt="">
				  <img src="images/trend3.jpg" alt="">
				  <img src="images/trend4.jpg" alt="">
				  <img src="images/trend5.jpg" alt="">
				</div>

			  </section>
			  <section class="old w-75 mx-auto m-5 p-5" >
				  <h2>Old games</h2>
				  <div class="all">
				  <img src="images/old.jpg" alt="">
				  <img src="images/old2.jpg" alt="">
				  <img src="images/old3.jpg" alt="">
				  <img src="images/old4.jpg" alt="">
				  <img src="images/old5.jpg" alt="">
				</div>

			  </section>




		
	
		  
			<div class="container m-5">
				<h1>Contact Us</h1>
				<h3>tell us whatever you want and for sure we will see it and response</h3>
			  <div class="row">
				  <div class="container">
					<form id="contact" action="" >
					  <div class="row">
						<div class="col-md-6">
						  <fieldset>
							<input name="name"
							  type="text"
							  class="form-control"
							  id="name"
							  placeholder="Your name..."
							  
							/>
						  </fieldset>
						</div>
						<div class="col-md-6">
						  <fieldset>
							<input
							  name="email"
							  type="text"
							  class="form-control"
							  id="email"
							  placeholder="Your email..."
							  
							/>
						  </fieldset>
						</div>
						<div class="col-md-12">
						  <fieldset>
							<input
							  name="subject"
							  type="text"
							  class="form-control"
							  id="subject"
							  placeholder="Subject..."
							  
							/>
						  </fieldset>
						</div>
						<div class="col-md-12">
						  <fieldset>
							<textarea
							  name="message"
							  rows="6"
							  class="form-control"
							  id="message"
							  placeholder="Your message..."
							  
							></textarea>
						  </fieldset>
						</div>
						<div class="col-md-12">
						  <fieldset class="text-right">
							<button class="btn btn-primary" type="submit" id="form-submit" class="button">
							  Send Message
							</button>
						  </fieldset>
						</div>
					  </div>
					</form>
				  </div>
				</div>
			  </div>
			</div>
		 
			
			@include('layout.footer')