<canvas id="myChart{{ $relationship->id }}" width="100" height="100"></canvas>
<script type="text/javascript">
    //define the data for this pie chart
    var data = [
        {
            value: {{ $relationship->percent() }},
            color:"#ec5a41"
        },
        {
            value: {{ 1 - $relationship->percent() }},
            color:"#dedede"
        }       
    ]
    var ctx = $("#myChart{{ $relationship->id }}").get(0).getContext("2d");
    new Chart(ctx).Pie(data);
</script>