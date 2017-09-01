	<!--=== Header ===-->
	<nav class="one-page-header navbar navbar-default navbar-fixed-top one-page-nav-scrolling one-page-nav__fixed" data-role="navigation" style="background:rgba(49,53,62,1)">
		<div class="container">
			<div class="menu-container page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#body">
					<img src="/matchanrebuild/assets/img/logo-light.png" alt="ALT">
				</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<div class="menu-container">
					<ul class="nav navbar-nav">
						<li class="page-scroll">
							<a href="/matchanrebuild"><span data-hover="Home">Home</span></a>
						</li>
						<li class="page-scroll">
							<a href="/matchanrebuild/categories"><span data-hover="Cafe">Cafe</span></a>
						</li>
				<!-- 		<li class="page-scroll">
							<a href="#Subscribe"><span data-hover="About">About</span></a>
						</li> -->
						<li class="page-scroll">
							<span style="color:white">|</span>
						</li>
						 <?php if(isset($_SESSION['logged_in'])) { 
						 	echo '<li class ="dropdown"><a href="javascript:void(0);"><span class="glyphicon glyphicon-user"></span> Welcome '.$session_username.' </a></li>
						<li class="page-scroll">
							<span style="color:white">|</span>
						</li>
						<li class="page-scroll">
							<a href="/matchanrebuild/registration/logout"><span data-hover="Logout">Logout</span></a>
						</li>';
						 ?>
						 <?php }  else {
						 	echo '
						 							<li class="page-scroll">
							<a href="/matchanrebuild/login"><span data-hover="Login">Login</span></a>
						</li>
						<li class="page-scroll">
							<span style="color:white">|</span>
						</li>
						<li class="page-scroll">
							<a href="/matchanrebuild/registration"><span data-hover="Register">Register</span></a>
						</li>
						';
						 } ?>
					</ul>
				</div>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
	<!--=== End Header ===-->