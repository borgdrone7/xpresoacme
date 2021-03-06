<div class="portlet box red " xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i> Add/Edit question {{$d->q->locked()}}
        </div>
        <div class="tools">
            <a href="" class="collapse">
            </a>
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" role="form" id="addquestionform" action="{{ URL::route('questionsave', empty($d->q->id) ? 0: $d->q->id) }}" method="post">
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Question text</label>
                    <div class="col-md-9">
                        {{ Form::textarea('question', $d->q->question, array('class' => 'form-control', 'rows' => '3', 'id' => 'question')) }}
                        <span class="help-block">Please enter full question text including question mark. Minimum 10 characters. </span>
                    </div>
                </div>
                <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            <div class="checkbox">
                                <label>{{ Form::checkbox('required', 'required', $d->q->required) }} Required?</label>
                                <span class="help-block">Is this question mandatory. </span>
                            </div>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Answer type</label>
                    <div class="col-md-9">
                        {{ Form::select('questiontype', Questiontype::orderBy('name', 'asc')->lists('name', 'id'), (empty($d->q->id) ? null:$d->q->questiontype->id), array('class' => 'form-control', 'id' => 'questiontype')) }}
                        <span class="help-block">Please select answer type. If you select option or drop down, you will also need to add meta data. </span>
                    </div>
                </div>
                <div class="form-group" id="metacontainer">
                    <label class="col-md-3 control-label">Meta data</label>
                    <div class="col-md-9">
                        @include("questionedit_metatable")
                        <span class="help-block">Please add associated meta data. Upon clicking save below, all entered data will be saved.</span>
                        <input type="hidden" name="metavals" id="metavals" />
                    </div>
                </div>
            </div>
            <div class="form-actions fluid">
                <div class="col-md-offset-9 col-md-3">
                    <input type="submit" class="btn red" value="Submit" />
                    <a href="{{ URL::route('questions') }}" class="btn default">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>