<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ URL::asset('Chart.js-master/Chart.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        var data = {
            labels: [
                @for ($i = 0; $i < count($d->nations); $i++)
                "{{$d->nations[$i]->value}}"{{ ($i==count($d->nations)-1) ? "":"," }}
                @endfor
                    ],
            datasets: [
                {
                    label: "Smoking",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        @for ($i = 0; $i < count($d->stats1); $i++)
                        "{{$d->stats1[$i]->num}}"{{ ($i==count($d->stats1)-1) ? "":"," }}
                        @endfor
                    ]
                },
                {
                    label: "Non smoking",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [
                        @for ($i = 0; $i < count($d->stats2); $i++)
                            "{{$d->stats2[$i]->num}}"{{ ($i==count($d->stats2)-1) ? "":"," }}
                        @endfor
                    ]
                }
            ]
        };
        var ctx = $("#thechart").get(0).getContext("2d");
        var chart = new Chart(ctx).Radar(data, {scaleShowLabels : true});
        var legend = chart.generateLegend();
//        $('#contchart').append(legend);
    });
</script>