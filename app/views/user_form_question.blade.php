<!-- BEGIN QUESTION-->
<div class="col-md-12">
<div class="portlet box red " xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i> Question no: {{$a->question->id}} - {{$a->question->required ? "required":"optional"}}
        </div>
    </div>
    <div class="portlet-body form">
            <div class="form-body">
                <h3 class="form-section">{{ $a->question->question }}</h3>
                <div class="form-group">
                    <label class="control-label col-md-3" for="inputSuccess">Answer:</label>
                    <div class="col-md-4">
                        @if ($a->type() == QUESTION_TYPE::TEXT)
                            {{ Form::text($a->cn(), $a->answer(), array('class' => 'form-control')) }}
                        @elseif ($a->type() == QUESTION_TYPE::NUMBER)
<!--                        TODO:Add mask with jquery $("#mask_number").inputmask-->
                            <input class="form-control" name="{{$a->cn()}}" value="{{$a->answer()}}">
                        @elseif ($a->type() == QUESTION_TYPE::DATE)
                            <input name="{{$a->cn()}}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="{{ $a->answer() }}">
                        @elseif ($a->type() == QUESTION_TYPE::DROPDOWN)
                            {{ Form::select($a->cn(), $a->metas_list(), $a->meta_id, array('class' => 'form-control')) }}
                        @elseif ($a->type() == QUESTION_TYPE::RADIO)
                            <div class="radio-list">
                                @foreach($a->question->metas as $m)
                                <label>
                                    {{ Form::radio($a->cn(), $m->id, ($m->id==$a->meta_id) ? true:false) }}
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
    </div>
</div>
</div>
<!-- END QUESTION-->
