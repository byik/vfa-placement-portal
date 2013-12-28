<canvas id="histogram"></canvas>
<script type="text/javascript">
    //define the data for this pie chart
    function resizeChart(canvas){
        newWidth = canvas.parent().width();
        canvas.prop('width', newWidth);
        canvas.prop('height', newWidth / 2);
        var data = {
            labels      : <?php echo json_encode(array_keys($data)) ?>,
            datasets    : [
                {
                    fillColor   : "rgba(4,39,79,.5)",
                    strokeColor : "rgba(4,39,79,1)",
                    data : <?php echo json_encode(array_values($data)) ?>
                }
            ]
        }
        var ctx = canvas.get(0).getContext("2d");
        new Chart(ctx).Bar(data);
    }

    resizeChart($("#histogram"));
    // $(window).resize(function(){
    //     resizeChart($("#histogram"));
    // });
</script>