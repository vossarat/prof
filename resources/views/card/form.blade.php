<input type="hidden" name="user_id" value="{{ Auth::id() }}" />
<div class="row form-row">
<div class="col-md-5" >
	@include( 'layouts.form.text', ['title' => 'Фамилия', 'field' => 'surname', 'value' => $viewdata->surname] )
</div>

<div class="col-md-5 col-md-offset-2">
	@include( 'layouts.form.text', ['title' => 'Имя', 'field' => 'name', 'value' => $viewdata->name] )
</div>
</div>

<div class="row form-row">
<div class="col-md-5">
	@include( 'layouts.form.text', ['title' => 'Отчество', 'field' => 'middlename', 'value' => $viewdata->middlename] )
</div>

<div class="col-md-5 col-md-offset-2">
	@include( 'layouts.form.select', ['title' => 'Пол', 'field' => 'sex_id', 'options' => ['мужской','женский'], 'value'=>$viewdata->sex_id, 'emptyValue' => true] )
</div>
</div>

<div class="row form-row">
<div class="col-md-5">
	@include( 'layouts.form.date', ['title' => 'Дата рождения', 'field' => 'birthday', 'value' => isset($viewdata->birthday) ? date('d.m.Y',strtotime($viewdata->birthday)) : '' ] )
</div>

<div class="col-md-5 col-md-offset-2">
		<div class="form-group">
			<label class="form-label" for="childrens">
				Количество детей
			</label>
			<div class="input-group">
		        
				<input type="text" class="form-control childrens" id="childrens" name="childrens" disabled="disabled" value="{{count($child_birthdays)}}">
				<span class="input-group-btn">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#childBirthday">
						<i class="fa fa-pencil" aria-hidden="true"></i> Редактировать
					</button>
				</span>   
			</div>	
		</div>
</div>
</div>

<div class="row form-row">
<div class="col-md-5">
	@include( 'layouts.form.date', ['title' => 'Трудовой стаж с', 'field' => 'experience', 'value' => isset($viewdata->experience) ? date('d.m.Y',strtotime($viewdata->experience)) : '' ] )
</div>

<div class="col-md-5 col-md-offset-2">
	@include( 'layouts.form.select2', ['title' => 'Должность', 'field' => 'position_id', 'options' => $positions, 'value'=>$viewdata->position_id, 'emptyValue' => true] )
</div>

{{--
<div class="col-md-5 col-md-offset-2">
	@include( 'layouts.form.date', ['title' => 'Стаж по специальности с', 'field' => 'experience_special', 'value' => isset($viewdata->experience_special) ? date('d.m.Y',strtotime($viewdata->experience_special)) : '' ] )
</div>
--}}
</div>
{{--
<div class="row form-row">

<div class="col-md-5 col-md-offset-2">
	@include( 'layouts.form.date', ['title' => 'Дата принятия в профсоюз', 'field' => 'tradeunion', 'value' => isset($viewdata->tradeunion) ? date('d.m.Y',strtotime($viewdata->tradeunion)) : '' ] )
</div>

</div>
--}}
<div class="row form-row">
<div class="col-md-5">
	@include( 'layouts.form.checkbox', ['title' => 'наличие собственного жилья', 'field' => 'itshome', 'value' => $viewdata->itshome] )
</div>
<div class="col-md-5 col-md-offset-2">
	@include( 'layouts.form.checkbox', ['title' => 'состоит в браке', 'field' => 'marital_status_id', 'value' => $viewdata->marital_status_id] )
</div>
</div>


<div class="row form-row">
<div class="col-md-3">	
	@include( 'layouts.form.text', ['title' => 'Состоит на Д-учете по', 'field' => 'dispensary', 'value' => $viewdata->dispensary] )
</div>
<div class="col-md-9">
	<label class="form-label">
        &nbsp;
    </label>
	<input id="dispensary_description" class="form-control" type="text" value="НЕ УКАЗАНО" disabled="disabled">
</div>
</div>

@include('card.child_birthday')


@push('scripts')
<script>
	
	function getNameMKB(icd){
		$.ajax({
			url: '/api/mkb/' + icd,
			success: function(data) {					
				$('#dispensary_description').val(data);
			}
		});
	}
	
/*	function translit(one_char) {
		//translit_char = one_char.replace({'q':'й', 'w':'ц', 'e':'у'});
		translit_char = one_char.replace( {'й','ц','у'}, {'q','w','e'} );
		console.log( translit_char );
	}*/
	
	String.prototype.translit = (function(){
    var L = {
		'Й':'Q','Ц':'W','У':'E','К':'R','Е':'T','Н':'Y','Г':'U','Ш':'I','Щ':'O','З':'P','Ф':'A','Ы':'S','В':'D',
		'А':'F','П':'G','Р':'H','О':'J','Л':'K','Д':'L','Я':'Z','Ч':'X','С':'C','М':'V','И':'B','Т':'N','Ь':'M',
	},r = '',k ;
	    for (k in L) r += k;
	    r = new RegExp('[' + r + ']', 'g');
	    k = function(a){
	        return a in L ? L[a] : '';
	    };
	    return function(){
	        return this.replace(r, k);
	    };
	})();
	 

	$(function () {
		getNameMKB( $('#dispensary').val() );
		
		$('#dispensary').on('input', function() {
			first_char =  $(this).val().toUpperCase();
			$(this).val( first_char.translit() )
		});
		
        $("#birthday").mask("99.99.9999");
        $(".input-child-birthday").mask("99.99.9999");
        $("#experience").mask("99.99.9999");
        $("#experience_special").mask("99.99.9999");
        $("#tradeunion").mask("99.99.9999");
        
        $('#dispensary').on('blur', function(){
			getNameMKB( $('#dispensary').val() );        
        });
    });
    
    
</script>
@endpush