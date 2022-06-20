<!DOCTYPE html>
<html lang="en">

@include('user.layouts.header')

<body>
    
    @include('user.layouts.topbar')

    @yield('container')
	
	@include('user.layouts.footer')

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
</body>

</html>