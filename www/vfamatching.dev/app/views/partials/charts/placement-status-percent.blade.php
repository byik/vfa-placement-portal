<canvas id="myChart{{ $placementStatus->id }}" width="100" height="100"></canvas>
<script type="text/javascript">
    //define the data for this pie chart
    var data = [
        {
            value: {{ $placementStatus->percent() }},
            color:"#ec5a41"
        },
        {
            value: {{ 1 - $placementStatus->percent() }},
            color:"#dedede"
        }       
    ]
    var ctx = $("#myChart{{ $placementStatus->id }}").get(0).getContext("2d");
    new Chart(ctx).Pie(data);
</script>