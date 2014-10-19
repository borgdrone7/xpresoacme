<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        show_overview();
    });
    $("#user").change(function () {
        show_overview();
    });
    function show_overview() {
        var current=$("#user").val();
        var container=$("#overview");
        var posting = $.get("{{ URL::route('statsresultsoverview','') }}/"+current);
        // Put the results in a div
        posting.done(function (data) {
            container.html(data);
        });

    }
</script>
<!-- END PAGE LEVEL SCRIPTS -->
