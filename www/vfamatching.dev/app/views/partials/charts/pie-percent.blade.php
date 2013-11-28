<canvas id="myChart{{ $pieChart->id }}" width="{{ $pieChart->height }}" height="{{ $pieChart->width }}"></canvas>
<script type="text/javascript">
    //define the data for this pie chart
    var data = [
        {
            value: {{ $pieChart->percent }},
            color:"#ec5a41"
        },
        {
            value: {{ 1 - $pieChart->percent }},
            color:"#dedede"
        }       
    ]
    var ctx = $("#myChart{{ $pieChart->id }}").get(0).getContext("2d");
    new Chart(ctx).Pie(data);
</script>