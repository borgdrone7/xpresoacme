@extends("common.layout")

@section("content")
<!-- BEGIN PAGE CONTENT-->

<div class="portlet box red " xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i> Question save
        </div>
    </div>
    <div class="portlet-body form">
        <div class="form-body">
            <h3>Successfully saved</h3>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ URL::route('questionedit', $d->q->id) }}" class="btn red">Open the question again</a>
                    <a href="{{ URL::route('questions') }}" class="btn green">Return to question list</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
@stop
