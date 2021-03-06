@extends("common.layout")

@section("content")
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div id="overview" class="col-md-12">
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Colors report
                </div>
            </div>
            <div class="portlet-body text-center">
                <h4>Colors people choose.</h4>
                <canvas id="thechart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
@stop

@section("pagelevelscripts")
@include("stats_colors_scripts")
@stop
