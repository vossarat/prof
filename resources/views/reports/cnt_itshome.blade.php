@extends('layouts.app')

@section('content')
<div class="container">

	<h1 class="page-header">Отчетные формы</h1>

	{{-- информационное сообщение --}}
	@include('layouts.infomessage')
	{{-- /информационное сообщение --}}

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Наличие собственного жилья
					<a href="{{ route('user.index') }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="{{ route('reportItsHome') }}">
						{{ csrf_field() }}

						<div class="row form-row">
							<div class="col-md-5">
								@include( 'layouts.form.date', ['title' => 'Отчетный период с', 'field' => 'startdate', 'value' => '01.01.2019' ] )
							</div>

							<div class="col-md-5 col-md-offset-2">
								@include( 'layouts.form.date', ['title' => 'по', 'field' => 'enddate', 'value' => '01.01.2021' ] )
							</div>
						</div>
                        
						
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary">
									Сформировать
								</button>
								<a href="{{ route('user.index') }}" class="btn btn-default" data-dismiss="alert" aria-hidden="true">Отмена</a>
							</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
	$("#startdate").mask("99.99.9999");
	$("#enddate").mask("99.99.9999");
</script>
@endpush