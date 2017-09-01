<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Matchan | Dessert & Cafe Recommender</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<!-- <link rel="shortcut icon" href="../favicon.ico"> -->

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/app.css">
	<link rel="stylesheet" href="assets/css/blocks.css">
	<link rel="stylesheet" href="assets/css/plugins.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="./assets/plugins/animate.css">
	<link rel="stylesheet" href="./assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="./assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="./assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	<link rel="stylesheet" href="./assets/plugins/owl-carousel2/assets/owl.carousel.css">
	<link rel="stylesheet" href="./assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
	<link rel="stylesheet" href="assets/plugins/master-slider/masterslider/style/masterslider.css">
	<link rel="stylesheet" href="assets/plugins/master-slider/u-styles/testimonials-1.css">
	<link rel="stylesheet" href="assets/plugins/master-slider/u-styles/promo-1.css">




	<!-- CSS Theme -->	
	<link rel="stylesheet" href="assets/css/travel.style.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="assets/css/custom.css">
</head>
<!--
	The data-spy and data-target are part of the built-in Bootstrap scrollspy function.
-->
<body id="body" data-spy="scroll" data-target=".one-page-header" class="demo-lightbox-gallery">
<main class="wrapper">

	<!-- Promo Section -->
	<div class="promo-section master-slider ms-promo-1" id="masterslider-promo">

		<!-- Slide 1 -->
		<div class="ms-slide">
			<img src="assets/plugins/master-slider/masterslider/style/blank.gif" data-src="assets/img-temp/promo/matchan_mix.jpg" alt="ALT" style="height:690px;">
			<h3 class="ms-layer ms-promo-travel-place hidden-3xs" style="left: 11px; top: 256px;" data-type="text" data-delay="10" data-effect="skewright(50,340)" data-ease="easeOutExpo" data-duration="2200">
				Matchan,
			</h3>
			<div class="ms-layer ms-promo-travel-description" style="left: 15px; top: 324px;" data-type="text" data-delay="30" data-effect="rotate3dbottom(100,0,0,70)" data-ease="easeOutExpo" data-duration="2300">
				<p class="g-mb-20 hidden-sm hidden-xs">Cafe Recommender System</p>
				
			</div>
			<img class="ms-thumb" src="assets/img-temp/promo/thumbs/picjumbo.com_vranov-czech-republic.jpg" alt="ALT">
		</div>
		<!-- End Slide 1 -->

	</div>
	<!-- End Promo Section -->

	<!-- Search Tours Section -->
	<div class="search-tours g-heading-v6">
		<div class="container">
			<div class="row">
				<div class="col-md-3 search-tours-title-wrapper">
					<div class="container">
						<h2><em class="block-name">Cafe name or area</em><br> SEARCH CAFE</h2>
					</div>
				</div>
				<div class="col-md-9 search-tours-col-bg-default">
					<div class="container">
						<form action="/matchanrebuild/search/search_process" method="POST" class="sky-form clearfix">
							<div class="col col-9">
								<label class="label">&nbsp; </label>
								<input type="text" class="form-control" name="input" placeholder="Search : cafe name, area ..."><br>
							</div>
							
							<div class="col col-3">
								<button type="submit" class="btn-u btn-u-lg btn-u-upper"><i class="fa fa-search"></i>Search</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Search Tours Section -->

	<!-- Our Service -->
	<div class="our-service-section text-center g-heading-v8 equal-height-columns" style="padding-top:80px" id="Services">
		<h2 class="h2"><br> <strong>Recommended</strong> for you</h2>
		<div class="container-fluid">
			<div class="row">
				<!-- Service Info -->
				<div class="col-md-3 our-service-info equal-height-column">
					<h2 class="h2"><em class="block-name">Recommended</em><br> <strong>Recommended </strong> for you</h2>

					<p>A popular cafe that we recommended for you</p>
				</div>
				<!-- End Service Info -->
				<div class="col-md-9 our-services-list-wrapper">
					<div class="our-services-list">

					<!-- 00000 -->
					             <?php if(isset($_SESSION['logged_in'])) { 
					               // echo '<h3>Test</h3>';

					                 foreach ( $recommendedloggedin as $recommendedcafe)
					                {  
					                    echo ' <div class="our-services-list-item equal-height-column"> ';
					                    echo ' <div class="img-wrapper img-wrapper--shadow"><img src="assets/30cafe/'.$recommendedcafe[0]->cimg.'/img1.jpg" style="height:350px;" alt="ALT" class="img-reposnsive"></div> ';
					                    echo '<h3><a href="/matchanrebuild/item_detail/detail/'.$recommendedcafe[0]->cid.'">'.$recommendedcafe[0]->cname.'</a></h3>';
					             		
					             		
                     $id = intval($recommendedcafe[0]->cid);
                    // echo round($sumof[$id-1],2);

                        $scorerounded = round($sumof[$id-1]);  
                        // echo $sumof[$id-1];
                        echo '<ul class="list-inline star-vote" style="padding-left:5px;"> ';
                        $count = 0;
                        for($i = 1; $i <= $scorerounded ; $i++)
                        {
                          echo '<li><i class="color-white fa fa-star"></i></li>';
                          $count = $count+1;
                        }
                        while ($count < 5 ) {
                            echo '<li><i class="color-white fa fa-star-o"></i></li>';
                            $count++;
                        }
                         echo '</ul>';   
					                    echo '  <a href="/matchanrebuild/item_detail/detail/'.$recommendedcafe[0]->cid.'" class="btn-u btn-u-lg btn-u-red btn-u-upper">Read More</a> ';
					                    
					                    
					                    echo '</div>';
					              
					                }
					                
					            ?>
					            <?php } else {?>
					                <?php 
					                 foreach ( $recommendedcafe as $recommendedcafe)
					                {
					                    echo ' <div class="our-services-list-item equal-height-column"> ';
					                    echo ' <div class="img-wrapper img-wrapper--shadow"><img src="assets/30cafe/'.$recommendedcafe[0]->cimg.'/img1.jpg" style="height:350px;" alt="ALT" class="img-reposnsive"></div> ';
					                    echo '<h3><a href="/matchanrebuild/item_detail/detail/'.$recommendedcafe[0]->cid.'">'.$recommendedcafe[0]->cname.'</a></h3>';
					             		
                       
                    $id = intval($recommendedcafe[0]->cid);
                    // echo round($sumof[$id-1],2);

                        $scorerounded = round($sumof[$id-1]);  
                        // echo $sumof[$id-1];
                        echo '<ul class="list-inline star-vote" style="padding-left:5px;"> ';
                        $count = 0;
                        for($i = 1; $i <= $scorerounded ; $i++)
                        {
                          echo '<li><i class="color-white fa fa-star"></i></li>';
                          $count = $count+1;
                        }
                        while ($count < 5 ) {
                            echo '<li><i class="color-white fa fa-star-o"></i></li>';
                            $count++;
                        }
                         echo '</ul>';  
					                    echo '  <a href="/matchanrebuild/item_detail/detail/'.$recommendedcafe[0]->cid.'" class="btn-u btn-u-lg btn-u-red btn-u-upper">Read More</a> ';
					                    
					                    echo '</div>';
					              
					                }
					                ?>
					            <?php } ?>


						<!-- Item 1 -->
	<!-- 					<div class="our-services-list-item equal-height-column">
							<div class="img-wrapper img-wrapper--shadow"><img src="assets/img-temp/services/picjumbo.com_HNCK4183.jpg" alt="ALT" class="img-reposnsive"></div>
							<h3>Nullam lobortis bibendum eros nec ultricies</h3>
							<ul class="list-inline star-vote">
								<li><i class="g-color-default fa fa-star"></i></li>
								<li><i class="g-color-default fa fa-star"></i></li>
								<li><i class="g-color-default fa fa-star-half-o"></i></li>
								<li><i class="g-color-default fa fa-star-o"></i></li>
								<li><i class="g-color-default fa fa-star-o"></i></li>
							</ul>
							<p>Cras sit amet varius velit. Maecenas porta condimentum tortor at sagittis. Cum sociis natoque penatibus et magnis dis</p>
							<a href="#" class="btn-u btn-u-lg btn-u-red btn-u-upper">Read more</a>
						</div> -->
						<!-- End Item 1 -->



					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Our Service -->


	<!-- Our Tours Section -->
	<div class="our-tours text-center g-heading-v8 g-pt-85 g-pb-100" id="Our-Tours">
		<div class="container-fluid">
			<h2 class="h2"><br> <strong>Latest</strong> Cafe..</h2>
			<div class="our-tours-list-wrapper">
				<div class="our-tours-list text-left">
					<?php 
					 foreach ( $latestsection as $latestsection) {
					  echo ' <div class="our-tours-list-item"> ';
					                    echo ' <div class="img-wrapper img-wrapper--shadow"><img src="assets/30cafe/'.$latestsection->cimg.'/img1.jpg" style="height:241px;" alt="ALT" class="img-reposnsive"></div> ';
					                    echo '<h3><a href="/matchanrebuild/item_detail/detail/'.$latestsection->cid.'">'.$latestsection->cname.'</a></h3>';

                         echo '<p>Area: '.$latestsection->carea.'</p>';
                    	echo '<p>Open Time: '.$latestsection->chour.'</p>';
                    	echo '<a href="/matchanrebuild/item_detail/detail/'.$latestsection->cid.'" class="btn-u btn-u-lg btn-u-red btn-u-upper">More</a> ';
                    	echo '</div>';

					             		
                       }  
					?>
					<!-- Item 1 -->
<!-- 					<div class="our-tours-list-item">
						<div class="img-wrapper img-wrapper--shadow"><img src="assets/img-temp/offers/greece-2.jpg" alt="ALT" class="img-reposnsive"></div>
						<h3>Crete</h3>
						<ul class="list-inline star-vote">
							<li><i class="g-color-default fa fa-star"></i></li>
							<li><i class="g-color-default fa fa-star"></i></li>
							<li><i class="g-color-default fa fa-star-half-o"></i></li>
							<li><i class="g-color-default fa fa-star-o"></i></li>
							<li><i class="g-color-default fa fa-star-o"></i></li>
						</ul>
						<p>dapibus quis sapien id phar etra iaculis est</p>
						<div class="our-tours-price">$350.00</div>
						<a href="#" class="our-tours-list-item__more">More</a>
					</div> -->
					<!-- End Item 1 -->

				</div>
			</div>
		</div>
	</div>
	<!-- End Our Tours Section -->


</main>

<!-- JS Global Compulsory -->
<script src="./assets/plugins/jquery/jquery.min.js"></script>
<script src="./assets/plugins/jquery/jquery-migrate.min.js"></script>
<script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="./assets/plugins/smoothScroll.js"></script>
<script src="./assets/plugins/jquery.easing.min.js"></script>
<script src="./assets/plugins/owl-carousel2/owl.carousel.min.js"></script>
<script src="./assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
<script src="./assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js"></script>
<script src="./assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script src="./assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
<script src="./assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&amp;callback=initMap" async defer></script><script src="assets/js/plugins/gmaps-ini.js"></script>
<script src="./assets/plugins/master-slider/masterslider/masterslider.min.js"></script>

<!-- JS Page Level -->
<script src="./assets/js/one.app.js"></script>
<script src="./assets/js/plugins/owl-carousel2.js"></script>
<script src="./assets/js/plugins/datepicker.js"></script>
<script src="./assets/js/plugins/promo.js"></script>
<script src="./assets/js/plugins/testimonials.js"></script>
<script src="./assets/js/plugins/gallery.js"></script>
<script src="./assets/js/forms/contact.js"></script>

<script>
$(function() {
	App.init();
	OwlCarousel.initOwlCarousel();
	Datepicker.initDatepicker();
	ContactForm.initContactForm();
});
</script>

<!--[if lt IE 10]>
	<script src="../assets/plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js"></script>
<![endif]-->
</body>
</html>
