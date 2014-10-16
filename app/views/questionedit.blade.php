@extends("common.layout")

@section("content")

<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            XPRESO ACME <small>add/edit question</small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->

<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <h2>Add/Edit question</h2>
        <br/>
    </div>
    <div class="col-md-12">
        @include("questionedit_form")
    </div>
</div>
<!-- END PAGE CONTENT-->

@stop