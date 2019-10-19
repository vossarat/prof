@if(Session::has('message'))
<div class="alert alert-success block-center offset-bottom-24">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
		&times;
	</button>
	{{Session::get('message')}}
</div>
@endif