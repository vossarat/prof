@extends('layouts.template')

@section('content')
<div class="container">
	
	<h1 class="page-header">Справочник пользователей</h1>

	{{-- информационное сообщение --}}
	@include('layouts.infomessage')
	{{-- /информационное сообщение --}}
    
    	<a href="{{ route('user.create') }}" class="btn btn-primary">
        	<i class="fa fa-plus" aria-hidden="true"></i>
        	Добавить
		</a>
		<br></br>
        <table id="viewtable" class="table table-striped">
            <thead>
				<tr>
					<th>id</th>
                    <th>Логин</th>                    
                    <th></th>
                    <th></th>
                    
				</tr>
			</thead>
            
            <tbody>
			
				@foreach($viewdata as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>                    
                    <td>
                    	<a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn">
                    		<i class="fa fa-pencil" aria-hidden="true"></i>
                    	</a>
                    </td>
                    <td>
                    	<form action="{{ route('user.destroy', $user->id) }}" method="POST">
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

{{--
<!-- Modal -->
<div class="modal fade" id="destroyuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				<p>Справочник должностей связан с сотрудниками</p>						
				<p>Удаление может привести к необратимым результатам</p>						
				<p>Пожалуйста воспользуйтесь функцией редактирования</p>						
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
			</div>
		</div>
	</div>
</div>
--}}

@endsection