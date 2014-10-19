<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ URL::asset('assets/global/plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ URL::asset('acmescripts/AcmeMetaTable.js') }}"></script>
<script src="{{ URL::asset('acmescripts/bootstrapvalidatefix.js') }}"></script>
<script>
    jQuery(document).ready(function() {
        $(function() { $('#metatable').AcmeMetaTable(
            {
                //override here if necessary...
            }
        );});
        show_meta();
        setup_validation();
    });
    $("#questiontype").change(function () {
        show_meta();
    });
    function show_meta() {
        var current=$("#questiontype option:selected").text();
        var visible=(current=='Radio' || current=='Drop down');
        var container=$("#metacontainer");
        visible ? container.show():container.hide();
    }
    function setup_validation() {
        $("#addquestionform").validate({
            rules: {
                question: {
                    required: true,
                    minlength: 10
                }
            },
            messages: {
                username: {
                    required: "Question is mandatory",
                    minlength: "Question must consist of at least 10 characters"
                }
            }
        });

    }

</script>
<!-- END PAGE LEVEL SCRIPTS -->
