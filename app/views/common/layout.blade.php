<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<title>{{$d->hello}}</title>
@include("common.styles")
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-quick-sidebar-over-content page-boxed page-sidebar-closed-hide-logo">
@include("common.header")
<div class="clearfix">
</div>
<div class="container">
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
                @yield('content')
			</div>
		</div>
		<!-- END CONTENT -->
	</div>
	<!-- END CONTAINER -->
    @include("common.footer")
</div>
@include("common.scripts")
</body>
<!-- END BODY -->
</html>