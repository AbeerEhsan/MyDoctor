@extends('layouts.app')

@section('content')

<!doctype html>
<html lang="en">
	<head>
		<title>My Network</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="./assets/css/bootstrap.min.css" >
		<link rel="stylesheet" href="./assets/css/main.css">
	</head>
	<body>
		<br><br><br>
		<section class="container wrapper ">
			<div class="row mt-4">
				<div class="col-12 col-md-3  p-md-0">
					<div class="panel profile pt-0  ">
						
						
					</div>
				</div>
				<div class="col-12 col-md-6">
					<!-- create post -->
					<div class="panel createPost pt-0 mb-4">
						<div class="content px-3 py-4">
							<form  action="">
								<div class="form-group">
									<input placeholder="title"class="form-control rounded-2"style="margin-bottom: 3px">
									<textarea placeholder="Write your post Summary ..." class="form-control rounded-2" name="" id="" rows="3"style="margin-bottom: 3px"></textarea>
									<textarea placeholder="Write your post Details ..." class="form-control rounded-2" name="" id="" rows="3"></textarea>
								</div>
								<div class="checkbox">
                                <label><input type="checkbox" value="">Active</label>
                                </div>
								<div class="form-group m-0">
									<label for="cameraBtn" class="cameraBtn btn btn-outline-primary mr-5"><i class="fa fa-camera" aria-hidden="true"></i></label>
									<input class="d-none" type="file" name="" id="cameraBtn">
									<button type="submit" class="btn btn-dispatch btn-primary float-right">Dispatch</button>
								</div>
							</form>
						</div>
					</div>
					<!-- ./create post -->

					
				</div>
			</div>
		</section>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="go/assets/js/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
		<script src="go/assets/js/popper.min.js"  crossorigin="anonymous"></script>
		<script src="go/assets/js/bootstrap.min.js"  crossorigin="anonymous"></script>
	</body>
</html>
@endsection