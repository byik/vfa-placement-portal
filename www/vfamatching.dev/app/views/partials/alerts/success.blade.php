<!-- @param $success the String message to display -->

<script>
    var n = noty({ 
        text: "<?php echo $success; ?>",
        type: "success",
        timeout: 3000,
        closeWith: ['click', 'hover']
    });
</script>