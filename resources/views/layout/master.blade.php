<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laravel </title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="/assets/dest/css/style.css">
	<link rel="stylesheet" href="/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="/assets/dest/css/huong-style.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

</head>
<body>

	@include('layout.header')

    @yield('content')

    @include('layout.footer')


	<!-- include js files -->
	<script src="/assets/dest/js/jquery.js"></script>
	<script src="/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="/assets/dest/vendors/animo/Animo.js"></script>
	<script src="/assets/dest/vendors/dug/dug.js"></script>
	<script src="/assets/dest/js/scripts.min.js"></script>
	<script src="/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="/assets/dest/js/waypoints.min.js"></script>
	<script src="/assets/dest/js/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


	<!--customjs-->
	<script src="assets/dest/js/custom2.js"></script>

	<script>
        $(document).ready(function($) {
            $(window).scroll(function(){
                if($(this).scrollTop()>150){
                $(".header-bottom").addClass('fixNav')
                }else{
                    $(".header-bottom").removeClass('fixNav')
                }}
            )
        })
	</script>


    <script>
        function AddCart(id){
            $.ajax({
                url: '/cake/addcart/'+id,
                type: 'GET',
            }).done(function(response){
                $("#change-item-cart").empty();
                $("#change-item-cart").html(response);
                alertify.success("Đã thêm mới sản phẩm");
            });
        }
    </script>

</body>
</html>
