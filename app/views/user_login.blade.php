@extends("common.layout")

@section("content")

<!-- BEGIN PAGE CONTENT-->
<div class="portlet box red " xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i> Login form
        </div>
        <div class="tools">
            <a href="" class="collapse">
            </a>
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" role="form" action="{{ URL::route('logincheck') }}" method="post">
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Login</label>
                    <div class="col-md-9">
                        {{ Form::text('login', '', array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Password</label>
                    <div class="col-md-9">
                        {{ Form::password('pass', '', array('class' => 'form-control')) }}
                    </div>
                </div>
            </div>
            <div class="form-actions fluid">
                <div class="col-md-offset-9 col-md-3">
                    <input type="submit" class="btn red" value="Submit" />
                </div>
            </div>
        </form>
    </div>
</div><!-- END PAGE CONTENT-->

@stop