<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Questionnaire, unique code: {{ $d->u->id }}
                </div>
            </div>
            <div class="portlet-body">
                <h3>{{ $d->u->name }} ({{ $d->u->login }})</h3>
            </div>
        </div>
        <div class="row">
            @foreach ($d->u->useranswers as $a)
                @include("user_overview_question")
            @endforeach
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->