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
	<link rel="stylesheet" href="/matchanrebuild/assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/matchanrebuild/assets/css/app.css">
	<link rel="stylesheet" href="/matchanrebuild/assets/css/blocks.css">
	<link rel="stylesheet" href="/matchanrebuild/assets/css/plugins.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="/matchanrebuild/assets/plugins/animate.css">
	<link rel="stylesheet" href="/matchanrebuild/assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="/matchanrebuild/assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/matchanrebuild/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	<link rel="stylesheet" href="/matchanrebuild/assets/plugins/owl-carousel2/assets/owl.carousel.css">
	<link rel="stylesheet" href="/matchanrebuild/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
	<link rel="stylesheet" href="/matchanrebuild/assets/plugins/master-slider/masterslider/style/masterslider.css">
	<link rel="stylesheet" href="/matchanrebuild/assets/plugins/master-slider/u-styles/testimonials-1.css">
	<link rel="stylesheet" href="/matchanrebuild/assets/plugins/master-slider/u-styles/promo-1.css">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="/matchanrebuild/assets/css/travel.style.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="/matchanrebuild/assets/css/custom.css">
</head>
<!--
	The data-spy and data-target are part of the built-in Bootstrap scrollspy function.
-->
<body id="body" data-spy="scroll" data-target=".one-page-header" class="demo-lightbox-gallery">
<main class="wrapper">

	<!-- Search Tours Section -->
	<div class="search-tours g-heading-v8" style="margin-top:70px">
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
								<button type="submit" class="btn-u btn-u-lg btn-u-upper"><i class="fa fa-search"></i> Search</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Search Tours Section -->

	<!-- Popular Tours Section -->
	<div class="popular-tours text-center g-heading-v8 g-pt-70 g-pb-70" id="Popular-Tours">
		<div class="container-fluid">
			<h2 class="h2"><em class="block-name">Result</em><br> <strong>Search</strong> Result</h2>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					
				</div>
			</div>
			<div class="row text-left">

			<?php
   
                foreach ( $cafelist as $cafelist)
                {
                    echo '<div class="col-md-3 col-xs-6 col-2xs-12 g-mb-30">';
                    echo '<div class="popular-tours-item">';
                    echo '<div class="img-wrapper img-wrapper--shadow"><img src="/matchanrebuild/assets/30cafe/'.$cafelist->cimg.'/img1.jpg" style="height:290px; width:100%" alt="ALT" class="img-responsive"></div>';
                    echo ' <div class="popular-tours-item-info"> ';
                    echo '<div class="popular-tours-item-info-inner " style="background:rgba(0,0,0,0.6); ">';
                    echo '<h3 ><a href="/matchanrebuild/item_detail/detail/'.$cafelist->cid.'">'.$cafelist->cname.'</a></h3>';
                    $id = intval($cafelist->cid);
                    // echo round($sumof[$id-1],2);

                        $scorerounded = round($sumof[$id-1]);  
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
                    echo '<h3>Area: '.$cafelist->carea.'</h3>';
                    echo '<h3>Open Time: '.$cafelist->chour.'</h3>';
                     // echo '<h3>Cake: '.$cafelist->cicecream.'</h3>';
                    echo ' </div>';
                    echo '</div>';

                    
                    echo '<a href="/matchanrebuild/item_detail/detail/'.$cafelist->cid.'" class="popular-tours-item__more">More</a>';
                    echo '</div>';
                     echo '</div>';

                    

                }

                echo ' <div id="areacontainer"> ';
                foreach ( $arealist as $arealist)
                {
                    echo '<div class="col-md-3 col-xs-6 col-2xs-12 g-mb-30">';
                    echo '<div class="popular-tours-item">';
                    echo '<div class="img-wrapper img-wrapper--shadow"><img src="/matchanrebuild/assets/30cafe/'.$arealist->cimg.'/img1.jpg" style="height:290px; width:100%" alt="ALT" class="img-responsive"></div>';
                    echo ' <div class="popular-tours-item-info"> ';
                    echo '<div class="popular-tours-item-info-inner " style="background:rgba(0,0,0,0.6);">';
                    echo '<h3 ><a href="/matchanrebuild/item_detail/detail/'.$arealist->cid.'">'.$arealist->cname.'</a></h3>';
                    $id = intval($arealist->cid);
                    // echo round($sumof[$id-1],2);

                        $scorerounded = round($sumof[$id-1]);  
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
                    echo '<h3>Area: '.$arealist->carea.'</h7><b3>';
                    echo '<h3>Open Time: '.$arealist->chour.'</h73>';
                    echo ' </div>';
                    echo '</div>';

                    
                    echo '<a href="/matchanrebuild/item_detail/detail/'.$arealist->cid.'" class="popular-tours-item__more">More</a>';
                    echo '</div>';
                     echo '</div>';
                }
  

          
               
                ?>  





			</div>
		</div>
	</div>
	<!-- End Popular Tours Section -->

	<!-- Our Service -->
	<div class="our-service-section text-center g-heading-v8 equal-height-columns" style="padding-top:20px" id="Services">
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
					                    echo ' <div class="img-wrapper img-wrapper--shadow"><img src="/matchanrebuild/assets/30cafe/'.$recommendedcafe[0]->cimg.'/img1.jpg" style="height:350px;" alt="ALT" class="img-reposnsive"></div> ';
					                    echo '<h3><a href="/matchanrebuild/item_detail/detail/'.$recommendedcafe[0]->cid.'">'.$recommendedcafe[0]->cname.'</a></h3>';
					             		echo '<ul class="list-inline star-vote" style="padding-left:5px;"> ';
					                        $count = 0;
					                        $scorerounded = round($recommendedrating[0]);  
					                        for($i = 1; $i <= $scorerounded ; $i++)
					                        {
					                          echo '<li><i class="color-green fa fa-star"></i></li>';
					                          $count = $count+1;
					                        }
					                        while ($count < 5 ) {
					                            echo '<li><i class="color-green fa fa-star-o"></i></li>';
					                            $count++;
					                        }
					                         echo '</ul>'; 
					                    echo '  <a href="/matchanrebuild/item_detail/detail/'.$recommendedcafe[0]->cid.'" class="btn-u btn-u-lg btn-u-red btn-u-upper">Read more</a> ';
					                    
					                    echo '</div>';
					              
					                }
					                
					            ?>
					            <?php } else {?>
					                <?php 
					                 foreach ( $recommendedcafe as $recommendedcafe)
					                {
					                    echo ' <div class="our-services-list-item equal-height-column"> ';
					                    echo ' <div class="img-wrapper img-wrapper--shadow"><img src="/matchanrebuild/assets/30cafe/'.$recommendedcafe[0]->cimg.'/img1.jpg" style="height:350px;" alt="ALT" class="img-reposnsive"></div> ';
					                    echo '<h3><a href="/matchanrebuild/item_detail/detail/'.$recommendedcafe[0]->cid.'">'.$recommendedcafe[0]->cname.'</a></h3>';
					             		echo '<ul class="list-inline star-vote" style="padding-left:5px;"> ';
					                        $count = 0;
					                        $scorerounded = round($recommendedrating[0]);  
					                        for($i = 1; $i <= $scorerounded ; $i++)
					                        {
					                          echo '<li><i class="color-green fa fa-star"></i></li>';
					                          $count = $count+1;
					                        }
					                        while ($count < 5 ) {
					                            echo '<li><i class="color-green fa fa-star-o"></i></li>';
					                            $count++;
					                        }
					                         echo '</ul>'; 
					      
					                    echo '  <a href="/matchanrebuild/item_detail/detail/'.$recommendedcafe[0]->cid.'" class="btn-u btn-u-lg btn-u-red btn-u-upper">Read more</a> ';
					                    
					                    echo '</div>';
					              
					                }
					                ?>
					            <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Our Service -->




</main>

<!-- JS Global Compulsory -->
<script src="/matchanrebuild/assets/plugins/jquery/jquery.min.js"></script>
<script src="/matchanrebuild/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script src="/matchanrebuild/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="/matchanrebuild/assets/plugins/smoothScroll.js"></script>
<script src="/matchanrebuild/assets/plugins/jquery.easing.min.js"></script>
<script src="/matchanrebuild/assets/plugins/owl-carousel2/owl.carousel.min.js"></script>
<script src="/matchanrebuild/assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
<script src="/matchanrebuild/assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js"></script>
<script src="/matchanrebuild/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script src="/matchanrebuild/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
<script src="/matchanrebuild/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&amp;callback=initMap" async defer></script><script src="/matchanrebuild/assets/js/plugins/gmaps-ini.js"></script>
<script src="/matchanrebuild/assets/plugins/master-slider/masterslider/masterslider.min.js"></script>

<!-- JS Page Level -->
<script src="/matchanrebuild/assets/js/one.app.js"></script>
<script src="/matchanrebuild/assets/js/plugins/owl-carousel2.js"></script>
<script src="/matchanrebuild/assets/js/plugins/datepicker.js"></script>
<script src="/matchanrebuild/assets/js/plugins/promo.js"></script>
<script src="/matchanrebuild/assets/js/plugins/testimonials.js"></script>
<script src="/matchanrebuild/assets/js/plugins/gallery.js"></script>
<script src="/matchanrebuild/assets/js/forms/contact.js"></script>

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
