@extends('layouts.app')

@section('content')
<div class="container">

	<a href="{{ route('reportCountMembersToPDF') }}" class="btn btn-primary">
		<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
		Сохранить в PDF
	</a>
	
	<h1 class="page-header">Наличие собственного жилья</h1>
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="form-group">
				<label class="form-label">Отчетный период с {{ $startdate . ' по ' . $enddate }}</label>
			</div>
		</div>
	</div>
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Наименование МО</th>
				<th>Количество сотрудников</th>                    
				<th>Имеют жилье</th>                    
				<th>Не имеют жилье</th>                    
			</tr>
		</thead>
            
		<tbody>
			
			@foreach($viewdata as $mo)
			<tr>
				<td>{{ $mo->name }}</td>
				<td>{{ $mo->total }}</td>                    
				<td>{{ $mo->itshome }}</td>                    
				<td>{{ $mo->itsnohome }}</td>                    
			</tr>
			@endforeach

		</tbody>
		<tfoot>
			<th>Итого</th>
			<th>{{ $viewdata->sum('total') }}</th> 
			<th>{{ $viewdata->sum('itshome') }}</th> 
			<th>{{ $viewdata->sum('itsnohome') }}</th> 
		</tfoot>
	</table>
    
</div>
@endsection