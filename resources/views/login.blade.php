<!doctype html>
<html lang="en">
  <head>
  	<title>Hafsocks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(img/bg.jpeg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
			      	</div>
						<form action="/login" method="POST" class="signin-form">
						@csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input name="username" id="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="username" value = "{{ old('username') }}" autofocus required>
							@error('username')
								<div class="invalid-feedback">
									{{$message}}
								</div>
							@enderror
			      		</div>
						<div class="form-group mb-3">
							<label class="label" for="password">Password</label>
							<input name="password" id="password" type="password" class="form-control" placeholder="Password" required>
						</div>
						<div class="form-group">
							<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
						</div>
		          </form>
		          <!-- <p class="text-center">Forgot password? <a href="/username">Click Here</a></p> -->
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>

	</body>
</html>

