<!-- header -->
<header>
    <div class="w3layouts-top-strip">
        <div class="container">
            <div class="logo">
                <h1><a href="/">RaGazine</a></h1>
                <p>Cintai Produk Lokal</p>
            </div>
            <div class="w3ls-social-icons">
                <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                <a class="instagram" href="#"><i class="fa fa-instagram"></i></a>
                <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                <a class="google" href="#"><i class="fa fa-google-plus"></i></a>
            </div>
        </div>
    </div>
    <!-- navigation -->
        <nav class="navbar navbar-default">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a class="{{ (request()->is('/')) ? 'active' : '' }}" href="/">Home</a></li>
                <li><a class="{{ (request()->is('category')) ? 'active' : '' }}" href="/category">Category</a></li>
                <li><a class="{{ (request()->is('about')) ? 'active' : '' }}" href="/about">About</a></li>
                <li><a class="{{ (request()->is('contact')) ? 'active' : '' }}" href="/contact">Contact</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
            <div class="clearfix"> </div>
          </div><!-- /.container-fluid -->
        </nav>
        
    <!-- //navigation -->
</header>
<!-- //header -->