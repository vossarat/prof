<div class="row form-row">
	<div class="col-md-8 col-md-offset-2">
		@include( 'layouts.form.text', ['title' => 'Логин', 'field' => 'name', 'value' => $viewdata->name] )
	</div>
	
	<div class="col-md-8 col-md-offset-2">
		@include( 'layouts.form.select2', ['title' => 'Медицинская организация', 'field' => 'mo_id', 'options' => $mos, 'value'=>$viewdata->mo_id, 'emptyValue' => true] )
	</div>
	
	<div class="col-md-8 col-md-offset-2">
		@include( 'layouts.form.password', ['title' => 'Пароль', 'field' => 'password'] )
	</div>
	
	
	
</div>