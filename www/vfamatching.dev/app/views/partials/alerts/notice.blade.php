<!-- @param $notice the String message to display -->

<!-- <div class="container">
	<div class="row alert alert-info alert-dismissable col-sm-6 col-md-4 col-lg-3">
		<button type="button" class="close" data-dismiss="alert">
			<span class="glyphicon glyphicon-remove"></span>
		</button>
		{{ $notice }}
	</div>
</div> -->

<script>
    var n = noty({ 
        text: "<?php echo $notice; ?>",
        type: "success",
        timeout: 3000,
        closeWith: ['click', 'hover']
    });
</script>