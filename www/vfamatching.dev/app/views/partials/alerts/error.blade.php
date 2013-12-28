<!-- @param $error the String message to display -->

<!-- <div class="container">
	<div class="row alert alert-danger alert-dismissable col-sm-6 col-md-4 col-lg-3">
		<button type="button" class="close" data-dismiss="alert">
			<span class="glyphicon glyphicon-remove"></span>
		</button>
		{{ $error }}
	</div>
</div> -->

<script>
    var n = noty({ 
        text: "<?php echo $error; ?>",
        type: "error",
        timeout: 5000,
        closeWith: ['click', 'hover']
    });
</script>