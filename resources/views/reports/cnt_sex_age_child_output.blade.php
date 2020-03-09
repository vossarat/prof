@extends('layouts.app')

@section('content')
<div class="container">

	<h1 class="page-header">Половозрастная структура детей</h1>
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
				<th>Кол-во детей</th>                    
			</tr>
		</thead>
            
		<tbody>
			
			@foreach( $ages_report as $key => $age )
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $age[0] }} - {{ $age[1] }} лет</td>
				<td>{{ ${"age_$age[0]_$age[1]"}->count() }}</td>                
			</tr>
			@endforeach
			


		</tbody>
		<tfoot>
			<th colspan="2">Итого</th>
                 
			<th>{{ $allcards->count() }}</th> 
		</tfoot>
	</table>
    
</div>
@endsection