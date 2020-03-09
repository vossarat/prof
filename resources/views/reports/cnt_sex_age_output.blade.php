@extends('layouts.app')

@section('content')
<div class="container">

	<h1 class="page-header">Половозрастная структура</h1>
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
				<th>Возраст</th>
				<th>Кол-во мужчин</th>
				<th>Кол-во женщин</th>
				<th>Всего</th>                    
			</tr>
		</thead>
            
		<tbody>
			
			@foreach( $ages_report as $key => $age )
			<tr>
				<td>{{ $key + 1 }}</td>
				<td>{{ $age[0] }} - {{ $age[1] }} лет</td>
				<td>{{ ${"age_$age[0]_$age[1]"}->where('sex_id', 1)->count() }}</td>                
				<td>{{ ${"age_$age[0]_$age[1]"}->where('sex_id', 2)->count() }}</td>                
				<td>{{ ${"age_$age[0]_$age[1]"}->count() }}</td>                
			</tr>
			@endforeach
			


		</tbody>
		<tfoot>
			<th colspan="2">Итого</th>
			<th>{{ $allcards->where('sex_id', 1)->count() }}</th>                    
			<th>{{ $allcards->where('sex_id', 2)->count() }}</th>                    
			<th>{{ $allcards->count() }}</th> 
		</tfoot>
	</table>
    
</div>
@endsection