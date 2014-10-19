<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ URL::asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ URL::asset('assets/admin/pages/scripts/components-pickers.js') }}"></script>
<script src="{{ URL::asset('acmescripts/bootstrapvalidatefix.js') }}"></script>
<script>
    jQuery(document).ready(function() {
        ComponentsPickers.init();
    });
</script>
<script>
    $("#questionnaire").validate({
        rules: {

            @for ($i = 0; $i < count($d->u->useranswers); $i++)
            {{$d->u->useranswers[$i]->cn()}}: {
                required: {{$d->u->useranswers[$i]->question->required ? "true":"false"}}
            }{{ ($i==count($d->u->useranswers)-1) ? "":"," }}
            @endfor
    },
        messages: {

            @for ($i = 0; $i < count($d->u->useranswers); $i++)
            {{$d->u->useranswers[$i]->cn()}}: {
                required: "Answer is mandatory"
            }{{ ($i==count($d->u->useranswers)-1) ? "":"," }}
            @endfor
        },
    errorPlacement: function (error, element) { // render error placement for each input type
            error.appendTo(element.attr("data-error-container"));
        }
    });
</script>
<!-- END PAGE LEVEL SCRIPTS -->
