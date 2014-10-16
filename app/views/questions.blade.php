@extends("common.layout")

@section("content")

<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            XPRESO ACME <small>list questions</small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->

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