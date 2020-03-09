@extends('layouts.app')

@section('content')
<div class="container">

	<a href="{{ route('reportCountMembersToPDF') }}" class="btn btn-primary">
		<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
		Сохранить в PDF
	</a>
	
	<h1 class="page-header">Количество добавленных сотрудников</h1>
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
			</tr>
		</thead>
            
		<tbody>
			
			@foreach($viewdata as $mo)
			<tr>
				<td>{{ $mo->name }}</td>
				<td>{{ $mo->total }}</td>                    
			</tr>
			@endforeach

		</tbody>
		<tfoot>
			<th>Итого</th>
			<th>{{ $viewdata->sum('total') }}</th> 
		</tfoot>
	</table>
    
</div>
@endsection