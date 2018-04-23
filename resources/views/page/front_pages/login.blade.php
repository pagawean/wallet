@extends('layouts.login_front') 
@section('title','Balcony')
@section('css')
<style type="text/css">

   .no-padding {
   padding: 0 !important;
   margin: 0 !important;
   }
   .form-module h3 {
   margin: 0 0 0.5em; 
   }
   .register {
   margin-top: 1%;
   }
   .modal {
   	margin-top: 10em;
   z-index: 9999;
   }
   p{
   	text-align: justify;
   }

	.no-padding {
		padding: 0 !important;
		margin: 0 !important;
	}
	.form-module h3 {
		margin: 0 0 0.5em; 
	}

	.register {
		margin-top: 1%;
	}
</style>
@endsection
@section('content')
<div class="container">
	<div class="col-md-7">
		<div class="panel panel-primary panel-transparent">
		  	<div class="panel-heading"><h1>BALCONY.COM MEMUNGKINKAN ANDA UNTUK MENGUNGGAH, MENONTON, DAN BERBAGI VIDEO.</h1></div>
			  	<div class="panel-body">
			  		<p><h3>Ayo jelajahi balcony.com. Beragam kategori dengan video pilihan yang menarik untuk ditonton. 
		Unggah video menarik kalian dan bagikan kepada pengunjung balcony.com lainnya.</h3></p>
			  	</div>
		</div>
	</div>
	<div class="col-md-5">
	<section>
				<div class="w3_login_module">
					<div class="module form-module">
					  <div>
					  </div>
					  <div class="form">
						<h3 class="no-padding">Login to your account</h3>
						<form action="{{ route('channel.login') }}" id="login" method="post">
        					{{ csrf_field() }}
						  	<input type="text" name="email" placeholder="Email" required="">
						  	<input type="password" name="password" placeholder="Password" required="">
						  	<input type="submit" value="Login">
						</form>
						<span class="password"><a href="#" data-toggle="modal" data-target="#forgotPass">Forgot Your Password ?</a></span>
					  </div>
					</div>
				</div>
		</section>
		<section>
				<div class="w3_login_module">
					<div class="module form-module">
					  <div>
					  </div>
					  <div class="form">
						<h3>Create an account</h3>
						<form action="{{ route('channel.register') }}" method="post" id="register">
        					{{ csrf_field() }}
						  	<input type="text" name="username" placeholder="Username" required="">
						  	<input type="password" name="password" placeholder="Password" required="">
						  	<input type="email" name="email" placeholder="Email Address" required="">
						  	<input type="text" name="phone_number" placeholder="Phone Number" required="">
						  	<span class="pull-left"><label><input type="checkbox" name="terms" value="1">Saya setuju atas, <a href="#" data-toggle="modal" data-target="#syarat">Syarat dan Ketentuan Balcony</a></label></span>
						  	<input type="submit" value="Register">
						</form>
						 
					  </div>
					</div>
				</div>
		</section>

	</div>
</div>
{!! $register_validator->render() !!}
{!! $login_validator->render() !!}
<div class="modal video-modal fade" id="forgotPass" tabindex="-1" role="dialog" aria-labelledby="myModal">
	 <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            Forgot Your Password ?
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
         </div>
         <section>
            <div class="modal-body">
               <div class="w3_login_module">
                  <div class="module form-module">
                     <div >
                     </div>
                     <div class="form">
                        <h3>Insert Your Email</h3>
                        <form action="#" method="post">
                           <input type="email" name="email" placeholder="Email" required="">
                           <input type="submit" value="Login">
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
</div>
<div class="modal video-modal fade" id="syarat" tabindex="-1" role="dialog" aria-labelledby="myModal">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            Syarat dan ketentuan
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
         </div>
         <section>
            <div class="modal-body">
            
            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            	
            </div>
         </section>
      </div>
   </div>
</div>

@endsection