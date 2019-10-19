@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Редактировать пользователя
                	<a href="{{ route('user.index') }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('user.update', $viewdata->id) }}">
                        {{ csrf_field() }}
                        
                        <input type="hidden" name="id" value="{{ $viewdata->id }}">
                		<input type="hidden" name="_method" value="put"/>

                        @include('references.user.form')
                        
                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Сохранить
                                </button>
                                <a href="{{ route('user.index') }}" class="btn btn-default" data-dismiss="alert" aria-hidden="true">Отмена</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection