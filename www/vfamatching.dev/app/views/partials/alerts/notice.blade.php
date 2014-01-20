<!-- @param $notice the String message to display -->

<script>
    var n = noty({ 
        text: "<?php echo $notice; ?>",
        type: "alert",
        timeout: 3000,
        closeWith: ['click', 'hover']
    });
</script>