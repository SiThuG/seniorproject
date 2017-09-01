<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Registration - Matchan</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Web Fonts -->
    <!-- <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'> -->

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="/matchan/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/matchan/assets/css/style.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/matchan/assets/plugins/animate.css">
    <link rel="stylesheet" href="/matchan/assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="/matchan/assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
    <!-- CSS Page Style -->
    <link rel="stylesheet" href="/matchan/assets/css/pages/page_log_reg_v2.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="/matchan/assets/css/custom.css">
</head>

<body>
    <!--=== Content Part ===-->
    <div class="container">
        <!--Reg Block-->
        <div class="reg-block">
            <div class="reg-block-header">
                <h2>Sign Up</h2>
                <ul class="social-icons text-center">
                </ul>
                <p>Already Signed Up? Click <a class="color-green" href="/matchanrebuild/login">Sign In</a> to login your account.</p>
            </div>

            <form method="POST" id="sky-form" class="sky-form">

                <div class="text-center" id="error-message" style="color:red;"></div>

                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
                    </div>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                        <select id="input-gender" name="gender" style="width:100%; height:34px;"><option value="">Gender</option><option value="Male">Male</option><option value="Female">Female</option></select>
                    </div>     
                    <div class="input-group margin-bottom-20">
                        <style >

                        </style>
                         <span class="input-group-addon" ><i class="fa fa-calendar"></i></span>
                         <input placeholder="Birthdate" class="textbox-n" type="text" id="birthdate" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" style="width:100%; height:34px;">    
                         <!-- <input type="date" id="birthdate" placeholder="birthdate" style="width:100%; height:34px;"  >                                          -->
                                        <!-- <label class="input" style="margin-bottom:0px">
                                            <i class="icon-append fa fa-calendar"></i>
                                            <input type="text" name="date" id="date"  placeholder="Birthdate" >
                                        </lable> -->
                    </div>
                    <hr>

<!--                     <div class="checkbox">
                        <label>
                            <input type="checkbox">
                            I read <a target="_blank" href="page_terms.html">Terms and Conditions</a>
                        </label>
                    </div>
 -->
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <button type="submit" class="btn-u btn-block" id="create">Create Account</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--End Reg Block-->
        </div><!--/container-->
        <!--=== End Content Part ===-->

        <!-- JS Global Compulsory -->
        <script type="text/javascript" src="/matchan/assets/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/matchan/assets/plugins/jquery/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="/matchan/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- JS Implementing Plugins -->
        <script type="text/javascript" src="/matchan/assets/plugins/back-to-top.js"></script>
        <!-- // -->
        <script type="text/javascript" src="/matchan/assets/plugins/smoothScroll.js"></script>
        <script src="/matchan/assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js"></script>
        <script src="/matchan/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
        <script src="/matchan/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>


        <script type="text/javascript" src="/matchan/assets/plugins/backstretch/jquery.backstretch.min.js"></script>
        <!-- JS Customization -->
        <script type="text/javascript" src="/matchan/assets/js/custom.js"></script>
        <script type="text/javascript" src="/matchan/assets/js/plugins/masking.js"></script>
        <script type="text/javascript" src="/matchan/assets/js/plugins/datepicker.js"></script>
        <script type="text/javascript" src="/matchan/assets/js/plugins/validation.js"></script>
        <!-- JS Page Level -->
        <script type="text/javascript" src="/matchan/assets/js/app.js"></script>

        <script> 
        $(document).ready(function() {
            $("#create").click(function() {
                var getname = $("#username").val();
                var getemail = $("#email").val();
                var getpassword = $("#password").val();
                var getcpassword = $("#cpassword").val();
                var getbirthdate = $("#birthdate").val();
                var getgender = $("#input-gender").val();
                var error = document.getElementById("error-message");

                if (getname == '' || getemail == '' || getpassword == '' || getcpassword == ''|| getbirthdate == '' || getgender == '' ) {
                    error.innerHTML =  "Please fill all data";
                    event.preventDefault();

                }else if (!(getpassword).match(getcpassword)) {
                    error.innerHTML = "Your passwords don't match. Try again?";
                    event.preventDefault();
                } else {
                    $.post("/matchanrebuild/registration/new_register", {
                        name: getname,
                        email: getemail,
                        password: getpassword,
                        birthdate: getbirthdate,
                        gender: getgender,
                    }, function(data) {
                        if (data == 'You have Successfully Registered.....') {
                            $("form")[0].reset();
                        }
                        alert(data);
                    });
                }
            });
        });
        </script>
<script type="text/javascript">
jQuery(document).ready(function() {
    App.init();
    Datepicker.initDatepicker();


});
</script>
<script type="text/javascript">
    // $.backstretch([
    //   "/matchan/assets/img/bg/19.jpg",
    //   "/matchan/assets/img/bg/18.jpg",
    //   ], {
    //     fade: 1000,
    //     duration: 7000
    // });
</script>
<!--[if lt IE 9]>
    <script src="/matchan/assets/plugins/respond.js"></script>
    <script src="/matchan/assets/plugins/html5shiv.js"></script>
    <script src="/matchan/assets/plugins/placeholder-IE-fixes.js"></script>
    <![endif]-->

</body>
</html>