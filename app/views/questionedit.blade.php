@extends("common.layout")

@section("pagelevelstyles")
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/global/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
<!-- END PAGE LEVEL STYLES -->
@stop

@section("content")
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        @include("questionedit_form")
    </div>
</div>
<!-- END PAGE CONTENT-->
@stop

@section("pagelevelscripts")
    @include("questionedit_scripts")
@stop
