@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Модуль о работе производственных советов по безопасности и охране труда
                	<a href="{{ route('biot.index') }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('biot.update', $viewdata->id) }}">
                        {{ csrf_field() }}
                        
                        <input type="hidden" name="id" value="{{ $viewdata->id }}">
                		<input type="hidden" name="_method" value="put"/>

                        @include('biot.form')
                        
                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Сохранить
                                </button>
                                <a href="{{ route('biot.index') }}" class="btn btn-default" data-dismiss="alert" aria-hidden="true">Отмена</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
