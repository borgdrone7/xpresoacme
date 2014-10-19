<!-- BEGIN QUESTION-->
<div class="col-md-12">
<div class="portlet box red " xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i> Question no: {{$a->question->id}}
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" role="form" action="{{ URL::route('questionsave', empty($d->q->id) ? 0: $d->q->id) }}" method="post">
            <div class="form-body">
                <h3 class="form-section">{{ $a->question->question }} ({{$a->question->questiontype->name}})</h3>
                <div class="form-group">
                    <label class="control-label col-md-3" for="inputSuccess">Answer:</label>
                    <div class="col-md-4">
                        @if ($a->question->questiontype->name == "Text")
                            {{ Form::text('question'.$a->question->id, $a->answer(), array('class' => 'form-control')) }}
                        @elseif ($a->question->questiontype->name == "Number")
                            {{ Form::number('name', $a->answer()) }}
                        @elseif ($a->question->questiontype->name == "Date")
                            <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="{{ $a->answer() }}">
                        @elseif ($a->question->questiontype->name == "Drop down")
                            {{ Form::select('questiontype', Meta::where('question_id', '=', $a->question_id)->orderBy('value', 'asc')->lists('value', 'id'), $a->meta_id, array('class' => 'form-control', 'id' => 'questiontype')) }}
                        @elseif ($a->question->questiontype->name == "Radio")
                            <div class="radio-list">
                                @foreach($a->question->metas as $m)
                                <label>
                                    {{ Form::radio('radio'.$m->id, $m->id, ($m->id==$a->meta_id) ? true:false) }}
                                    {{$m->value}}
                                </label>
                                @endforeach
                            </div>
                        @else
                            Unknown question type!
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<!-- END QUESTION-->
