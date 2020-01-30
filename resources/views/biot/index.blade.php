@extends('layouts.app')

@section('content')
<div class="container">

	{{-- информационное сообщение --}}
	@include('layouts.infomessage')
	{{-- /информационное сообщение --}}
    
    	<a href="{{ route('biot.create') }}" class="btn btn-primary">
        	<i class="fa fa-plus" aria-hidden="true"></i>
        	Добавить информацию БИОТ
		</a>
		<br></br>
        <table id="viewtable" class="table table-striped">
            <thead>
				<tr>
                    <th>Дата</th>
                    
                    <th></th>
                    <th></th>
                    
				</tr>
			</thead>
            
            <tbody>
			
				@foreach($viewdata as $biot)
                <tr>
                    <td>{{ date('d.m.Y',strtotime($biot->date_of_entry)) }} </td>
                    
                    <td>
                    	<a href="{{ route('biot.edit', $biot->id) }}" class="btn btn-warning btn">
                    		<i class="fa fa-pencil" aria-hidden="true"></i>
                    	</a>
                    </td>
                    <td>
                    	<form action="{{ route('biot.destroy', $biot->id) }}" method="POST">
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
          { 'bSortable': false, 'aTargets': [ 2 ] }
       ]
	});
} );
</script>
@endpush
