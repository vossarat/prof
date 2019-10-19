<!-- Modal -->
<div class="modal fade" id="childBirthday" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Даты рождения детей</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<div class="row form-row">
					<div class="col-md-6 col-md-offset-3">
						<div class="form-group">
							<div class="input-group">						        
								<span class="input-group-addon">
									Кол-во детей			
								</span>
								<input type="text" class="form-control childrens" id="cnt_childrens" disabled="disabled" value="{{count($child_birthdays)}}">
								<span class="input-group-btn">
									<button id="add-birhday-btn" class="btn btn-primary btn-block"><i class="fa fa-plus" aria-hidden="true"></i></button>
								</span>   
							</div>
						</div>
					</div>
				</div>
				
				<div id="labeldate"></div>
				
				@if($child_birthdays)
					@foreach($child_birthdays as $child_birthday)
						<div class="row form-row">
							<div class="col-md-6 col-md-offset-3">
								<div class="form-group">
									<div class="input-group">						        
										<span class="input-group-addon">
											<i class="fa fa-calendar"></i>			
										</span>
										<input type="text" class="form-control input-child-birthday" name="child_birthdays[]" value="{{ $child_birthday->birthday }}">
										<span class="input-group-btn">
											<button class="btn btn-primary btn-block remove-birhday-btn">
												<i class="fa fa-minus" aria-hidden="true"></i>
											</button>
										</span>   
									</div>
								</div>
							</div>
						</div>
					@endforeach
				@endif
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Сохранить</button>
			</div>
		</div>
	</div>
</div>


@push('scripts')
<script>
	$(function () {
		$('#add-birhday-btn').on('click', function(event) {
			event.preventDefault();
			$('#labeldate').after(`<div class="row form-row">
									<div class="col-md-6 col-md-offset-3">
										<div class="form-group">
											<div class="input-group">						        
												<span class="input-group-addon">
													<i class="fa fa-calendar"></i>			
												</span>
												<input type="text" class="form-control input-child-birthday" name="child_birthdays[]">
												<span class="input-group-btn">
													<button class="btn btn-primary btn-block remove-birhday-btn">
														<i class="fa fa-minus" aria-hidden="true"></i>
													</button>
												</span>   
											</div>
										</div>
									</div>
								</div>`);
			$(".input-child-birthday").mask("99.99.9999");
			cnt = $( '.childrens' ).val();
			$( '.childrens' ).val( parseInt(cnt) + 1 );
		});
		

		$('body').on('click','.remove-birhday-btn', function(event) {
			event.preventDefault();
			$( this ).parents( '.form-row' ).remove();
			$( '.childrens' ).val( $( '.childrens' ).val() - 1 );
			
		});
	});
</script>
@endpush
