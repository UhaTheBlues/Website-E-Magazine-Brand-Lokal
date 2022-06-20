@extends('user.layouts.main')

@section('container')

<!-- breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="/">Home</a></li>
			<li class="active">Category</li>
		</ol>
	</div>
</div>
<!-- //breadcrumbs -->

<div class="album my-5 bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<a href="/?category=beauty">
					<div class="card mb-4 box-shadow">
						<img class="icon-box img-category card-img-top" src="{{ asset('images/category/cbeauty.png') }}">
					</div>
				</a>
			</div>
			<div class="col-md-6">
				<a href="/?category=fashion">
					<div class="card mb-4 box-shadow">
						<img class="icon-box img-category card-img-top" src="{{ asset('images/category/cfashion.png') }}">
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

@endsection

