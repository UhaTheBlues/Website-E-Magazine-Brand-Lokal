@extends('user.layouts.main')
@section('container')
	<!-- banner -->
	<div class="agile-banner">
	</div>
	<!-- //banner -->
	<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="/">Home</a></li>
				<li class="active">{{ $post->title }}</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
	<div class="container">
		<div class="banner-btm-agile">
		<!-- //btm-wthree-left -->
			<div class="col-md-9 btm-wthree-left">
				<div class="single-left">
				<div class="single-left1">
					<img src="{{ asset('storage/' . $post->image) }}" alt=" " class="img-responsive" />
					<h3>{{ $post->title }}</h3>
					<ul>
						<li><span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{ $post->author }}</li>
						<li><span class="fa fa-calendar" aria-hidden="true"></span>{{ $post->created_at->diffForHumans() }}</li>
					</ul>
					<br>
                    <article>
					    {!! $post->body !!}
                    </article>
				</div>
				
			</div>

			</div>
			<!-- //btm-wthree-left -->
			<!-- btm-wthree-right -->
			<div class="col-md-3 w3agile_blog_left">
				<div class="wthreesearch">
					<form action="/" method="get">
						@if (request('category'))
							<input type="hidden" name="category" value="{{ request('category') }}">
						@endif
						<input type="search" name="search" placeholder="Cari disini" value="{{ request('search') }}">
						<button type="submit" class="btn btn-default search" aria-label="Left Align">
							<i class="fa fa-search" aria-hidden="true"></i>
						</button>
					</form>
				</div>
				
				<div class="agileinfo_calender">
				<h3>SOCIAL MEDIA KAMI</h3>
					<div class="w3ls-social-icons-1">
						<a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
						<a class="instagram" href="#"><i class="fa fa-instagram"></i></a>
						<a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
						<a class="linkedin" href="#"><i class="fa fa-google-plus"></i></a>
					</div>
				</div>
				
				<div class="w3l_categories">
					<h3>Categories</h3>
					<ul>
						<li><a href="/?category=beauty"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Beauty</a></li>
						<li><a href="/?category=fashion"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Fashion</a></li>
					</ul>
				</div>

			</div>
			<!-- //btm-wthree-right -->

			<div class="clearfix"></div>
		</div>
	</div>
@endsection