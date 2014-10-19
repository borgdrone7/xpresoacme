@extends("common.layout")

@section("pagelevelstyles")
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css') }}"/>
<!-- END PAGE LEVEL STYLES -->
@stop

@section("content")
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <form id="questionnaire" class="form-horizontal" role="form" action="{{ URL::route('user form save') }}" method="post">
                @foreach ($d->u->useranswers as $a)
                @include("user_form_question")
                @endforeach
                <div class="col-md-12">
                    <div class="form-actions fluid">
                        <div class="col-md-offset-9 col-md-3">
                            <input type="submit" class="btn red" value="Save" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
@stop

@section("pagelevelscripts")
@include("user_form_scripts")
@stop