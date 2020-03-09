<input type="hidden" name="user_id" value="{{ Auth::id() }}" />

<div class="row form-row">
<div class="col-md-5">
	@include( 'layouts.form.date', ['title' => 'Дата', 'field' => 'date_of_entry', 'value' => isset($viewdata-> date_of_entry) ? date('d.m.Y',strtotime($viewdata->date_of_entry)) : '' ] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => 'Численность работающих членов профсоюза по состоянию на отчетный период', 'field' => 'count', 'value' => $viewdata->count] )
</div>

<div class="col-md-12" >
	@include( 'layouts.form.text', ['title' => 'Среднемесячная заработная плата работника - члена профсоюза членской организации', 'field' => 'salary', 'value' => $viewdata->salary] )
</div>

</div>

@push('scripts')
<script>
	
	    
    
</script>
@endpush