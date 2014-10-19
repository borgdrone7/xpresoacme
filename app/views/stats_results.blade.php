@extends("common.layout")

@section("content")
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Results of the questionnaire
                </div>
            </div>
            <div class="portlet-body">
                <h3>Select user from the drop down</h3>
                {{ Form::select('user', User::orderBy('name', 'asc')->lists('name', 'id'), null, array('class' => 'form-control', 'id' => 'user')) }}
                <br/>
                <div class="row">
                    <div id="overview" class="col-md-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
@stop

@section("pagelevelscripts")
@include("stats_results_scripts")
@stop
