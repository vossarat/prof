@extends('layouts.app')

@section('content')
<div class="container">

	{{-- информационное сообщение --}}
	@include('layouts.infomessage')
	{{-- /информационное сообщение --}}
    
    	<a href="{{ route('card.create') }}" class="btn btn-primary">
        	<i class="fa fa-plus" aria-hidden="true"></i>
        	Добавить сотрудника
		</a>
		<br></br>
        <table id="viewtable" class="table table-striped">
            <thead>
				<tr>
					 <th>№ п/п</th>
                    <th>ФИО</th>
                    <th>Пол</th>
                    <th>Дата рождения</th>
                    
                    <th></th>
                    <th></th>
                    
				</tr>
			</thead>
            
            <tbody>
			
				@foreach($viewdata as $card)
                <tr>
                    <td>{{ $card->id }}</td>
                    <td>{{ $card->full_name }}</td>
                    <td>{{ $card->sex_id == 1 ? 'мужской' : 'женский' }}</td>
                    <td>{{ date('d.m.Y',strtotime($card->birthday)) }} </td>
                    
                    <td>
                    	<a href="{{ route('card.edit', $card->id) }}" class="btn btn-warning btn">
                    		<i class="fa fa-pencil" aria-hidden="true"></i>
                    	</a>
                    </td>
                    <td>
                    	<form action="{{ route('card.destroy', $card->id) }}" method="POST">
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

@push('scripts')
<script>
$(document).ready(function() { 
	$('#viewtable').DataTable({
		"language": {
	        "sProcessing":    "Процесс...",
	        "sLengthMenu":    "Показать _MENU_ записей",
	        "sZeroRecords":   "Нет записей для отображения",
	        "sEmptyTable":    "Нет записей для отображения",
	        "sInfo":          "Показано с _START_ по _END_ из _TOTAL_ записей",
	        "sInfoEmpty":     "Нет записей для отображения",
	        "sInfoFiltered":  "",
	        "sInfoPostFix":   "",
	        "sSearch":        "Поиск:",
	        "sUrl":           "",
	        "sInfoThousands":  ",",
	        "sLoadingRecords": "Загрузка...",
	        "oPaginate": {
	            "sFirst":   "Первая",
	            "sLast":    "Последняя",
	            "sNext":    "След",
	            "sPrevious":"Пред"
	        },
    	},
    	"aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 2, 3, 4, 5 ] }
       ]
	});
} );
</script>
@endpush
