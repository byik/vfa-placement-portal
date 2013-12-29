<canvas id="histogram"></canvas>
<script type="text/javascript">
    //define the data for this pie chart
    function resizeChart(canvas){
        var labelData = <?php echo json_encode(array_keys($data)); ?>;
        var chartData = <?php echo json_encode(array_values($data)); ?>;
        var max = 0;
        chartData.forEach(function(dataPoint){
            if(dataPoint > max){
                max = dataPoint;
            }
        });

        newWidth = canvas.parent().width();
        canvas.prop('width', newWidth);
        canvas.prop('height', newWidth / 2);
        var data = {
            labels      : labelData,
            datasets    : [
                {
                    fillColor   : "rgba(4,39,79,.5)",
                    strokeColor : "rgba(4,39,79,1)",
                    data : chartData
                }
            ]
        }
        var options = {
            scaleOverride: true,
            scaleSteps: max,
            scaleStepWidth: 1,
            scaleStartValue: 0,
            scaleLabel: "<%=parseInt(value) + 1%>"
        }
        var ctx = canvas.get(0).getContext("2d");
        new Chart(ctx).Bar(data, options);
    }

    resizeChart($("#histogram"));
    // $(window).resize(function(){
    //     resizeChart($("#histogram"));
    // });
</script>