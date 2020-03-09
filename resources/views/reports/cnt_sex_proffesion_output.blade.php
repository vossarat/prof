@extends('layouts.app')

@section('content')
<div class="container">


	<h1 class="page-header">Отчет по членами профсоюза в разрезе пола и возраста</h1>
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="form-group">
				<label class="form-label">Медицинская организация "{{ $moName }}"</label>
			</div>
			<div class="form-group">
				<label class="form-label">Отчетный период с {{ $startdate . ' по ' . $enddate }}</label>
			</div>
		</div>
	</div>
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>№</th>
				<th>Профессия</th>
				<th>Кол-во мужчин</th>
				<th>Кол-во женщин</th>
				<th>Всего</th>                    
			</tr>
		</thead>
            
		<tbody>
			
			@foreach( $viewdata as $key => $profession )
			<tr>
				<td>{{ $loop->iteration }}</td>                
				<td>{{ $positions->find($key)->name }}</td>                
				<td>{{ $profession->where('sex_id', 1)->count() }}</td>                
				<td>{{ $profession->where('sex_id', 2)->count() }}</td>              
				<td>{{ $profession->count() }}</td>              
             
			</tr>
			@endforeach
			


		</tbody>
		<tfoot>
			<th colspan="2">Итого</th>
			<th>{{ $cards->where('sex_id', 1)->count() }}</th>                    
			<th>{{ $cards->where('sex_id', 2)->count() }}</th>                    
			<th>{{ $cards->count() }}</th> 
		</tfoot>
	</table>
    
</div>
@endsection