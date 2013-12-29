<canvas id="pie-percent"></canvas>
<script type="text/javascript">
    //define the data for this pie chart
    function resizeChart(canvas){
        newWidth = canvas.parent().width();
        canvas.prop('width', newWidth);
        canvas.prop('height', newWidth);
        var data = [
            {
                value: {{ $percent }},
                color:"rgba(4,39,79,1)"
            },
            {
                value: {{ 1 - $percent }},
                color:"#dedede"
            }
        ]
        var ctx = canvas.get(0).getContext("2d");
        new Chart(ctx).Pie(data);
    }

    resizeChart($("#pie-percent"));
    // $(window).resize(function(){
    //     resizeChart($("#pie-percent"));
    // });
</script>