<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ URL::asset('Chart.js-master/Chart.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        var colors = {
            Red:{c:'#FF0000', h:'#FF5555'},
            Green:{c:'#00FF00', h:'#55FF55'},
            Blue:{c:'#0000FF', h:'#5555FF'},
            Yellow:{c:'#FFFF00', h:'#FFFF55'}
        };
        var data = [
            @for ($i = 0; $i < count($d->stats); $i++)
            {
                value: {{ $d->stats[$i]->num }},
                color:colors.{{ $d->stats[$i]->value }}.c,
                highlight: colors.{{ $d->stats[$i]->value }}.h,
                label: "{{ $d->stats[$i]->value }}"
            }{{ ($i==count($d->stats)-1) ? "":"," }}
            @endfor
        ];
        var ctx = $("#thechart").get(0).getContext("2d");
        var chart = new Chart(ctx).Pie(data);
    });
</script>