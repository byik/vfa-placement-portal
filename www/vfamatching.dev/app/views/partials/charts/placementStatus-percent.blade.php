<canvas id="myChart{{ $placementStatus->id }}"></canvas>
<script type="text/javascript">
    //define the data for this pie chart
    function resizeChart(canvas){
        newWidth = canvas.parent().width();
        canvas.prop('width', newWidth);
        canvas.prop('height', newWidth);
        var data = [
            {
                value: {{ $placementStatus->percent() }},
                color:"#04274f"
            },
            {
                value: {{ 1 - $placementStatus->percent() }},
                color:"#dedede"
            }
        ]
        var ctx = canvas.get(0).getContext("2d");
        new Chart(ctx).Pie(data);
    }

    resizeChart($("#myChart{{ $placementStatus->id }}"));
    // $(window).resize(function(){
    //     resizeChart($("#myChart{{ $placementStatus->id }}"));
    // });
</script>