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
	<link rel="stylesheet" href="../../assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/app.css">
	<link rel="stylesheet" href="../../assets/css/blocks.css">
	<link rel="stylesheet" href="../../assets/css/plugins.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="../../assets/plugins/animate.css">
	<link rel="stylesheet" href="../../assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="../../assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	<link rel="stylesheet" href="../../assets/plugins/owl-carousel2/assets/owl.carousel.css">
	<link rel="stylesheet" href="../../assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
	<link rel="stylesheet" href="../../assets/plugins/master-slider/masterslider/style/masterslider.css">
	<link rel="stylesheet" href="../../assets/plugins/master-slider/u-styles/testimonials-1.css">
	<link rel="stylesheet" href="../../assets/plugins/master-slider/u-styles/promo-1.css">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="../../assets/css/travel.style.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="../../assets/css/custom.css">

	<style>
	.myli {
		border: 1px solid black; padding: 15px; font-size: 20px; text-align: center; margin-bottom:5px;
	}
	.myspan {
		border: 1px solid black; padding: 8px; font-size: 20px; text-align: center; margin-bottom:5px; margin-right: 5px; color:white;
	}

        /****** Rating Starts *****/
        @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

        fieldset, label { margin: 0; padding: 0; }
        h1 { font-size: 1.5em; margin: 10px; }

        .rating { 
            border: none;
            float: left;
        }

        .rating > input { display: none; } 
        .rating > label:before { 
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating > .half:before { 
            content: "\f089";
            position: absolute;
        }

        .rating > label { 
            color: #ddd; 
            float: right; 
        } 
        .filter-by-block h1 {
            color: #fff;
            width: 100%;
            font-size: 24px;
            padding: 7px 10px;
            text-align: center;
            margin-bottom: 5px;
            background: #72c02c;
            text-transform: uppercase;


        }
        .filter-by-block .panel-default {
            border-color: #dedede;
        }
        .filter-by-block .panel-heading {
            padding: 0;
            background: inherit;
        }
        .filter-by-block .panel-title {
            overflow: hidden;
        }
        .filter-by-block .panel-group h2 a {
            color: #687074;
            display: block;
            font-size: 20px;
            padding: 10px 15px;
            border-bottom: 1px solid #dedede;
        }
        .filter-by-block .panel-group h2 i {
            float: right;
            font-size: 18px;
            margin-top: 8px;
        }
        .filter-by-block .panel-body {
            padding: 15px 20px;
            border-top: none !important;
        }
        .checkbox-list {
            margin-bottom: 0;
        }
        .checkbox-list li:first-child {
            margin-top: 0;
        }
        .checkbox-list .checkbox {
            color: #999;
            margin: 4px 0;
            cursor: pointer;
            font-size: 14px;
            line-height: 25px;
            padding-left: 27px;
            }
            .stars-ratings {
            float: left;
        }
            .stars-ratings input {
            left: -9999px;
            position: absolute;
        }

        .stars-ratings-label label {
            font-size: 24px;
            margin: 0 4px 5px;
        }

        
 
	</style>
</head>
<!--
	The data-spy and data-target are part of the built-in Bootstrap scrollspy function.
-->
<body id="body" data-spy="scroll" data-target=".one-page-header" class="demo-lightbox-gallery">
<main class="wrapper">

	<!-- Search Tours Section -->
	<div class="search-tours g-heading-v6" style="margin-top:70px">
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

	<!-- Discount Section -->
	<div class=" text-center g-heading-v8" id="Subscribe" style="padding-top:20px">
		<div class="container" style=" background: whitesmoke; ">
			<div class="row">
				
			<?php echo '<h2 style="background:#31353e;padding: 40px;margin-top: 20px; "><strong>'.$detaildata[0]->cname.'</strong><br>';
			echo '  <span style="color:white"> Rating :  '.$totalscore.' ';

                       
                        $scorerounded = round($totalscore);  
                        echo '<ul class="list-inline star-vote" style="padding-left:5px;"> ';
                        $count = 0;
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
                         echo '</span>';
                       
            
			echo '<div class="col-md-12 col-xs-12" id="mytopdetail">';
			     echo ' <span class="myspan"> Area : '.$detaildata[0]->carea.' </span> ';
			                                echo ' <span class="myspan">OPEN : '.$detaildata[0]->chour.' </span>';

			                                               echo '<span class="myspan"> Tel : '.$detaildata[0]->ctel.' </span> ';
			 echo ' <span class="myspan"> Price : '.$detaildata[0]->cprice.' </span> ';
			 echo ' </div></h2>';
                                    // echo ' <li>Area : '.$detaildata[0]->carea.'</li> ';

                     

    
                                ?>
                           
                                 </div>


			<div class="ms-staff-carousel">
				<!-- MasterSlider -->
				<div class="master-slider" id="masterslider">
										<!-- Item 1 -->
					<div class="ms-slide">
						<?php
						echo '<img src="assets/plugins/master-slider/masterslider/style/blank.gif" data-src="/matchan/assets/30cafe/'.$detaildata[0]->cimg.'/img1.jpg" alt="ALT"/>';
						?>
						<div class="ms-info">
						</div>
					</div>
					<!-- End Item 1 -->

 						<?php            
 							 for ($i = 2 ; $i <= 10 ; $i ++) {
                                echo '<div class="ms-slide">';
                                echo '<img src="assets/plugins/master-slider/masterslider/style/blank.gif" data-src="/matchan/assets/30cafe/'.$detaildata[0]->cimg.'/img'.$i.'.jpg" alt="ALT"/>';
                                echo '</div>';
                                }                                                                                                                                                                                                                                                                                            
                                ?>



				</div>
			</div>
			<!-- End of MasterSlider -->

						<div class="row">
                     <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=1526616747624284";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button"></div>
                        <br>

                                                <?php if(isset($_SESSION['logged_in'])  && $userrated === NULL ) { ?>
        <form action="#" id="sky-form2" class="sky-form" style="display:inline-block;width:400px" >
            <header style="background: transparent; font-size:18px;padding-bottom:60px;margin-top:20px">Rating Box<br>
            	<div class="row" style="display:inline-block">
            	            <fieldset id='demo1' class="rating" style="background: transparent;" >

                <input class="stars" type="radio" id="star5" name="rating" value="5" />
                <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                <input class="stars" type="radio" id="star4" name="rating" value="4" />
                <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <input class="stars" type="radio" id="star3" name="rating" value="3" />
                <label class = "full" for="star3" title="Meh - 3 stars"></label>
                <input class="stars" type="radio" id="star2" name="rating" value="2" />
                <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <input class="stars" type="radio" id="star1" name="rating" value="1" />
                <label class = "full" for="star1" title="Sucks big time - 1 star"></label>

            </fieldset>  
        </div>

            </header>

          

          
        </form>
        <?php } else if (isset($_SESSION['logged_in']) &&  $userrated  != 0 ) {?>
            <form action="#" id="sky-form2" class="sky-form" style="display:inline-block;width:400px" >
            	<header style="background: transparent; font-size:18px;padding-bottom:25px;margin-top:1px">Thank You, <br>You already rate this cafe<br></header>
            	<p> <a href="#" id="rerate"> Edit Rating </a> </p>
            </form>
        <?php } else {?>
            Plese <a href="/matchanrebuild/login"> login</a> before rate.
        <?php } ?>
                    </div>

			<div class="row" style="text-align:left">
		
				<h3 style="padding-left:15px"> Cafe Detail </h3>
                        
                            <div class="col-md-4">
                                <ul class="list-unstyled">
                                    <?php if( ($detaildata[0]->ccredit) == 1 ) {
                                        echo ' <li class="myli"><i class="fa fa-check-square color-green"></i> Credit Card</li> ';
                                    } else {
                                        echo '<li class="myli"><i class="fa fa-times color-grey"></i> Credit Card</li>';
                                    } if ( ($detaildata[0]->cparking) == 1 ) {

                                        echo '<li class="myli"><i class="fa fa-check-square color-green"></i> Car Parking</li> ';
                                    } else {
                                        echo '<li class="myli"><i class="fa fa-times color-grey"></i> Car Parking</li>';
                                    } if ( ($detaildata[0]->cgroup) == 1 ) {

                                        echo '<li class="myli"><i class="fa fa-check-square color-green"></i> Group</li> ';
                                    } else {
                                        echo '<li class="myli"><i class="fa fa-times color-grey"></i> Group</li>';
                                    }
                                    ?>                    
                                </ul>
                            </div>
                            <div class="col-md-4">
                            	 <ul class="list-unstyled">
	                                <?php
								 if ( ($detaildata[0]->ccake) == 1 ) {

                                        echo '<li class="myli"><i class="fa fa-check-square color-green"></i> Cake</li> ';
                                    } else {
                                        echo '<li class="myli"><i class="fa fa-times color-grey"></i> Cake</li>';
                                    }  if ( ($detaildata[0]->cicecream) == 1 ) {

                                        echo '<li class="myli"><i class="fa fa-check-square color-green"></i> Icecream</li> ';
                                    } else {
                                        echo '<li class="myli"><i class="fa fa-times color-grey"></i> Icecream</li>';
                                    }
	                                    if ( ($detaildata[0]->cother) == 1 ) {

	                                        echo '<li class="myli"><i class="fa fa-check-square color-green"></i> Other</li> ';
	                                    } else {
	                                        echo '<li class="myli"><i class="fa fa-times color-grey"></i> Other</li>';
	                                    } 
	                                    ?>
                                	</ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-unstyled">

                                    <?php
                                    	                                    if ( ($detaildata[0]->chotdrink) == 1 ) {

	                                        echo '<li class="myli"><i class="fa fa-check-square color-green"></i> Hot Drink</li> ';
	                                    } else {
	                                        echo '<li class="myli"><i class="fa fa-times color-grey"></i> Hot Drink</li>';
	                                    }if ( ($detaildata[0]->ccolddrink) == 1 ) {

	                                        echo '<li class="myli"><i class="fa fa-check-square color-green"></i> Cold Drink</li> ';
	                                    } else {
	                                        echo '<li class="myli"><i class="fa fa-times color-grey"></i> Cold Drink</li>';
	                                    }if ( ($detaildata[0]->cfruit) == 1 ) {

	                                        echo '<li class="myli"><i class="fa fa-check-square color-green"></i> Fruit Juice</li> ';
	                                    } else {
	                                        echo '<li class="myli"><i class="fa fa-times color-grey"></i> Fruit Juice</li>'; 
	                                    }
                                    ?>
                                </ul>
                            </div>

             </div>
<!--              <div class="row" style="padding:15px;">
             	

             	<?php                                     echo ' <span class="myspan"> Price : '.$detaildata[0]->cprice.' </span> ';
                                    // echo ' <li>Area : '.$detaildata[0]->carea.'</li> ';
                                    echo '<span class="myspan"> Tel : '.$detaildata[0]->ctel.' </span> ';

                                    echo ' <span class="myspan">Time : '.$detaildata[0]->chour.' </span>';
                                    echo ' <span class="myspan"> Area : '.$detaildata[0]->carea.' </span> ';
                                    ?>
                                    
             </div> -->
                                     <div class="row" style="padding-bottom:20px">
	                        <?php echo '<h3>Address : '.$detaildata[0]->caddress.' </h3>';?>
	                        <div id="googleMap" style=" width:400px;height:239px; display:inline-block"></div>
	                        <!-- <div id="googleMap" style=" width:400px;height:239px;"></div> -->
                    	</div>

			</div>
		</div>
	</div>
	<!-- End Discount Section -->

	<!-- Our Service -->
	<div class="our-service-section text-center g-heading-v8 equal-height-columns" style="padding-top:20px" id="Services">
		<h2 class="h2"><br> <strong>Related</strong> cafe</h2>
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

					                 foreach ( $recommendedcafe as $recommendedcafe)
					                {
					                    echo ' <div class="our-services-list-item equal-height-column"> ';
					                    echo ' <div class="img-wrapper img-wrapper--shadow"><img src="../../assets/30cafe/'.$recommendedcafe[0]->cimg.'/img1.jpg" style="height:350px;" alt="ALT" class="img-reposnsive"></div> ';
					                    echo '<h3><a href="/matchanrebuild/item_detail/detail/'.$recommendedcafe[0]->cid.'">'.$recommendedcafe[0]->cname.'</a></h3>';
					                    // echo '<ul class="list-inline star-vote" style="padding-left:5px;"> ';
					                    //     $count = 0;
					                    //     $scorerounded = round($recommendedrating[0]);  
					                    //     for($i = 1; $i <= $scorerounded ; $i++)
					                    //     {
					                    //       echo '<li><i class="color-green fa fa-star"></i></li>';
					                    //       $count = $count+1;
					                    //     }
					                    //     while ($count < 5 ) {
					                    //         echo '<li><i class="color-green fa fa-star-o"></i></li>';
					                    //         $count++;
					                    //     }
					                    //      echo '</ul>'; 
					                    echo '  <a href="/matchanrebuild/item_detail/detail/'.$recommendedcafe[0]->cid.'" class="btn-u btn-u-lg btn-u-red btn-u-upper">Read more</a> ';
					                    
					                    echo '</div>';
					                }
					                
					            ?>
					            <?php } else {?>
					                <?php 
					                 foreach ( $recommendedcafe as $recommendedcafe)
					                {
					                    echo ' <div class="our-services-list-item equal-height-column"> ';
					                    echo ' <div class="img-wrapper img-wrapper--shadow"><img src="../../assets/30cafe/'.$recommendedcafe[0]->cimg.'/img1.jpg" style="height:350px;" alt="ALT" class="img-reposnsive"></div> ';
					                    echo '<h3><a href="/matchanrebuild/item_detail/detail/'.$recommendedcafe[0]->cid.'">'.$recommendedcafe[0]->cname.'</a></h3>';
					             		// echo '<ul class="list-inline star-vote" style="padding-left:5px;"> ';
					               //          $count = 0;
					               //          $scorerounded = round($recommendedrating[0]);  
					               //          for($i = 1; $i <= $scorerounded ; $i++)
					               //          {
					               //            echo '<li><i class="color-green fa fa-star"></i></li>';
					               //            $count = $count+1;
					               //          }
					               //          while ($count < 5 ) {
					               //              echo '<li><i class="color-green fa fa-star-o"></i></li>';
					               //              $count++;
					               //          }
					               //           echo '</ul>'; 
					      
					                    echo '  <a href="/matchan/item_detail/detail/'.$recommendedcafe[0]->cid.'" class="btn-u btn-u-lg btn-u-red btn-u-upper">Read more</a> ';
					                    
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
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<script src="../../assets/plugins/jquery/jquery-migrate.min.js"></script>
<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="../../assets/plugins/smoothScroll.js"></script>
<script src="../../assets/plugins/jquery.easing.min.js"></script>
<script src="../../assets/plugins/owl-carousel2/owl.carousel.min.js"></script>
<script src="../../assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
<script src="../../assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js"></script>
<script src="../../assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script src="../../assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
<script src="../../assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&amp;callback=initMap" async defer></script><script src="../../assets/js/plugins/gmaps-ini.js"></script>
<script src="../../assets/plugins/master-slider/masterslider/masterslider.min.js"></script>

<!-- JS Page Level -->
<script src="../../assets/js/one.app.js"></script>
<script src="../../assets/js/plugins/owl-carousel2.js"></script>
<script src="../../assets/js/plugins/datepicker.js"></script>
<script src="../../assets/js/plugins/promo.js"></script>
<script src="../../assets/js/plugins/testimonials.js"></script>
<script src="../../assets/js/plugins/gallery.js"></script>
<script src="../../assets/js/forms/contact.js"></script>

<script>
$(function() {
	App.init();
	OwlCarousel.initOwlCarousel();
	Datepicker.initDatepicker();
	ContactForm.initContactForm();

	 $("#demo1 .stars").click(function () {  
        var cid = "<?php echo $detaildata[0]->cid; ?>";
        
        $.ajax( {
            type: "POST",
            url: "/matchanrebuild/item_detail/rated",
            data: "&cafeid=" + cid + "&rate_val=" + $(this).val(),
            success: function( response ) {
                $('#package_response').append(response);


                // var nextcid = parseInt(cid) + 1;
                setTimeout(function(){document.location='/matchanrebuild/item_detail/detail/'+cid;}, 1000);



            }
        });

        var rates = document.getElementById("p1");
        rates.innerHTML =  $(this).val();

        $(this).attr("checked");
        var radioName = $(this).attr("name"); //Get radio name
        $(":radio[name='"+radioName+"']").attr("disabled", true); //Disable all with the same name
        

    });   

	$("#rerate").click(function () {  
        var cid = "<?php echo $detaildata[0]->cid; ?>";
        
        $.ajax( {
            type: "POST",
            url: "/matchanrebuild/item_detail/rerate",
            data: "&cafeid=" + cid + "&rate_val=" + $(this).val(),
            success: function( response ) {
                $('#package_response').append(response);


                // var nextcid = parseInt(cid) + 1;
                setTimeout(function(){document.location='/matchanrebuild/item_detail/detail/'+cid;}, 1000);



            }
        });

    });  

});
</script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>

function initialize() {
    var maplat = <?php echo $detaildata[0]->clat ?>;
    var maplong = <?php echo $detaildata[0]->clong ?>;

var myLatLng = {lat: maplat, lng: maplong};
  var mapProp = {
    center:new google.maps.LatLng(maplat,maplong),
    zoom:20,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var marker = new google.maps.Marker({
    position:new google.maps.LatLng(maplat,maplong),
    map: map,
    title: 'Hello World!'
  });
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp,marker);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<!--[if lt IE 10]>
	<script src="../assets/plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js"></script>
<![endif]-->
</body>
</html>
