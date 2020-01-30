<input type="hidden" name="user_id" value="{{ Auth::id() }}" />

<div class="row form-row">
<div class="col-md-5">
	@include( 'layouts.form.date', ['title' => 'Дата', 'field' => 'date_of_entry', 'value' => isset($viewdata-> date_of_entry) ? date('d.m.Y',strtotime($viewdata->date_of_entry)) : '' ] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => 'Количество производственных советов по БиОТ:', 'field' => 'indicator_1', 'value' => $viewdata->indicator_1] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => '- в том числе инициированных профсоюзами', 'field' => 'indicator_2', 'value' => $viewdata->indicator_2] )
</div>

<div class="col-md-12" >
	<div class="form-group">
	    <label class="form-label"><u>ФИО технических инспекторов по охране труда:</u></label>
	</div>
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => '- с высшим образованием', 'field' => 'indicator_3', 'value' => $viewdata->indicator_3] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => '- со среднетехническим образованием', 'field' => 'indicator_4', 'value' => $viewdata->indicator_4] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => '- стаж работы не менее 5 лет', 'field' => 'indicator_5', 'value' => $viewdata->indicator_5] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => '- прошедшие обучение по БиОТ', 'field' => 'indicator_6', 'value' => $viewdata->indicator_6] )
</div>

<div class="col-md-12" >
	<div class="form-group">
	    <label class="form-label"><u>Количество проведенных проверок:</u></label>
	</div>
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => '- по инициативе производственного совета', 'field' => 'indicator_7', 'value' => $viewdata->indicator_7] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => '- по инициативе работников', 'field' => 'indicator_8', 'value' => $viewdata->indicator_8] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => '- иные проверки', 'field' => 'indicator_9', 'value' => $viewdata->indicator_9] )
</div>

<div class="col-md-12" >
	<div class="form-group">
	    <label class="form-label"><u>Выявлено замечаний:</u></label>
	</div>
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => '- по обеспечению безопасных условий труда', 'field' => 'indicator_10', 'value' => $viewdata->indicator_10] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => '- нарушение требований правил, инструкций по охране труда', 'field' => 'indicator_11', 'value' => $viewdata->indicator_11] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => '- по обучению и инструктажу работников', 'field' => 'indicator_12', 'value' => $viewdata->indicator_12] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => '- по обеспечению спецодеждой, спецобувью, СИЗ', 'field' => 'indicator_13', 'value' => $viewdata->indicator_13] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => '- прочие', 'field' => 'indicator_14', 'value' => $viewdata->indicator_14] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => 'Количество выданных предложений, направленных на улучшение условий и безопасности труда в организации', 'field' => 'indicator_15', 'value' => $viewdata->indicator_15] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => 'Количество участий в трудовых спорах', 'field' => 'indicator_16', 'value' => $viewdata->indicator_16] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => 'Количество участий в расследованиях несчастных случаев', 'field' => 'indicator_17', 'value' => $viewdata->indicator_17] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => 'Количество участий в проведении аттестации рабочих мест', 'field' => 'indicator_18', 'value' => $viewdata->indicator_18] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => 'Количество проведенных семинаров и занятий по вопросам работы производственных советов', 'field' => 'indicator_19', 'value' => $viewdata->indicator_19] )
</div>


</div>

@push('scripts')
<script>
	
	    
    
</script>
@endpush