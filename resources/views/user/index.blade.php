@extends('user.layouts.main')

@section('container')

	<!-- banner -->
	<div class="agile-banner-{{ $title }}">
	</div>
	<!-- //banner -->
	<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="/">Home</a></li>
				<li class="active">{{ $title }}</li>
			</ol>
		</div>
	</div>
	<!-- //breadcrumbs -->
	{{-- BODY UTAMA --}}
	<div class="container">
		<div class="banner-btm-agile">
		
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
		
		@if($posts->count())
		
		@foreach ($posts as $post)
		{{-- Postingan --}}
		<!-- //btm-wthree-left -->
			<div class="col-md-9 btm-wthree-left">
				<div class="wthree-top">
					<div class="w3agile-top">
						<div class="w3agile_special_deals_grid_left_grid">
							<a href="/post/{{ $post->slug }}"><img src="{{ asset('storage/' . $post->image) }}" class="img-responsive" alt="" /></a>
						</div>
						<div class="w3agile-middle">
						<ul>
							<li><i class="fa fa-calendar" aria-hidden="true"></i>{{ $post->created_at->diffForHumans() }}</li>
							<li><i class="fa fa-user" aria-hidden="true"></i>{{ $post->author }}</li>
						</ul>
					</div>
					</div>
					
					<div class="w3agile-bottom">
						<div class="col-md-3 w3agile-left">
							<a href="/?category={{ $post->category->slug }}"><h5>{{ $post->category->name }}</h5></a>
						</div>
						<div class="col-md-9 w3agile-right">
							<h3><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h3>
							<p>{{ $post['excerpt'] }}</p>
							<a class="agileits w3layouts" href="/post/{{ $post->slug }}">Read More <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
						</div>
							<div class="clearfix"></div>
					</div>
				</div>
			</div>
		<!-- //btm-wthree-left -->
		@endforeach

		{{-- Pagination --}}
		<div class="btm-wthree-left">{{ $posts->links() }}</div> 
		{{-- //Pagination --}}
		@else
			<h3 class="text-center">Tidak dapat menemukan Postingan</h3>
		@endif
			
			<div class="clearfix"></div>
		</div>
	</div>
	{{-- //BODY UTAMA --}}

@endsection