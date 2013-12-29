<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<a href="{{$url}}" class="btn btn-success submittabble">Add {{ $name }}</a>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {  
	    //unbind so the click only fires once
	    $('.submittable').unbind().click(function(e){
	        $(this).parent('.submittable-form').submit();
	        e.preventDefault();//don't follow the actual link
	    });
	});
</script>