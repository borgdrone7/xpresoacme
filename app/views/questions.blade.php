@extends("common.layout")

@section("content")

<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <h2>Questions list, use edit link to edit the question...</h2>
        <br/>
        @include("questions_table")
    </div>
</div>
<!-- END PAGE CONTENT-->

@stop