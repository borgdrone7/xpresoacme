@extends("common.layout")


@section("pagelevelstyles")
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css') }}">
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<!-- END PAGE LEVEL STYLES -->
@stop

@section("content")

<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="row">
            @foreach ($d->u->useranswers as $a)
                @include("user_form_question")
            @endforeach
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->

@stop

@section("pagelevelscripts")
@include("user_form_scripts")
@stop