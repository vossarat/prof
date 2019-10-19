@extends('layouts.template')

@section('content')
<div class="container">
	
	<h1 class="page-header">Справочник МО</h1>

	{{-- информационное сообщение --}}
	@include('layouts.infomessage')
	{{-- /информационное сообщение --}}
    
    	<a href="{{ route('mo.create') }}" class="btn btn-primary">
        	<i class="fa fa-plus" aria-hidden="true"></i>
        	Добавить
		</a>
		<br></br>
        <table id="viewtable" class="table table-striped">
            <thead>
				<tr>
					<th>id</th>
                    <th>Наименование</th>                    
                    <th></th>
                    <th></th>
                    
				</tr>
			</thead>
            
            <tbody>
			
				@foreach($viewdata as $mo)
                <tr>
                    <td>{{ $mo->id }}</td>
                    <td>{{ $mo->name }}</td>                    
                    <td>
                    	<a href="{{ route('mo.edit', $mo->id) }}" class="btn btn-warning btn">
                    		<i class="fa fa-pencil" aria-hidden="true"></i>
                    	</a>
                    </td>
                    <td>
                    	<form action="{{ route('mo.destroy', $mo->id) }}" method="POST">
						<input type="hidden" name="_method" value="DELETE">
						{{ csrf_field() }}
		                	<button type="submit" class="btn btn-danger btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
		                </form>
                    </td>
                    
                </tr>
                @endforeach
                
            </tbody>
        </table>
    
</div>
@endsection