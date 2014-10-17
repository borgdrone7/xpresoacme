<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ URL::asset('assets/global/plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ URL::asset('acmescripts/MetaTable.js') }}"></script>
<script>
    jQuery(document).ready(function() {
        meta_table("metatable", "addmetavalue", "metadatavalue");
        show_meta();
        $("#metaerror").hide();
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
</script>
<!-- END PAGE LEVEL SCRIPTS -->
