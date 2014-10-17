<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<title>{{$d->title}}</title>
@include("common.styles")
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-quick-sidebar-over-content page-boxed page-sidebar-closed-hide-logo">
<!-- END PAGE HEADER-->
@include("common.header")
<div class="clearfix">
</div>
<div class="container">
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
        {{ $d->showMenu() }}
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="page-title">
                            {{ Config::get('acme.app_title') }} <small>{{$d->title_small}}</small>
                        </h3>
                    </div>
                </div>
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