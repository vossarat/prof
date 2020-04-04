<ul class="nav navbar-nav navbar-right">
    <!-- Authentication Links -->
    @guest    
	    <li>
	        <a href="{{ route('login') }}">
	            Вход
	        </a>
	    </li>
	    {{--
	    <li>
	        <a href="{{ route('register') }}">
	            Регистрация
	        </a>
	    </li>
	    --}}
    @else
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
				Отчеты
				<span class="caret"></span>
			</a>
				<ul class="dropdown-menu">
					<li>
						<a href="{{ route('reportCountMembers') }}">Кол-во введенных сотрудников</a>
					</li>				
					
					<li>
						<a href="{{ route('reportCountSexAge') }}">Половозрастная структура</a>
					</li>
					<li>
						<a href="{{ route('reportCountSexAgeChild') }}">Половозрастная структура детей</a>
					</li>
					<li>
						<a href="{{ route('reportCountSexProfession') }}">Кол-во в разрезе профессий</a>
					</li>
					<li>
						<a href="{{ route('reportItsHome') }}">Наличие собственного жилья</a>
					</li>
					
				</ul>
		</li>
	
	    @if ( Auth::user()->id > 1 )
		    <li>
		        <a href="{{ route('card.create') }}">
		            Добавить сотрудника
		        </a>
		    </li>
		     <li>
		        <a href="{{ route('biot.index') }}">
		            Информация БИОТ
		        </a>
		    </li>
		    <li>
		        <a href="{{ route('treasury.index') }}">
		            Казначейство
		        </a>
		    </li>
		@endif
		
	
		@if ( Auth::user()->id == 1 ) 
		    <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
		            Справочники
		            <span class="caret"></span>
		        </a>
			        <ul class="dropdown-menu">
			            <li>
			                <a href="{{ route('user.index') }}">Справочник пользователей</a>
			            </li>
			            <li>
			                <a href="{{ route('position.index') }}">Справочник должностей</a>
			            </li>
			            <li>
			                <a href="{{ route('mo.index') }}">Справочник МО</a>
			            </li>
			        </ul>
		    </li> 
	    @endif
	    
	    <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
	            {{ Auth::user()->name }}
	            <span class="caret">
	            </span>
	        </a>

	        <ul class="dropdown-menu">
	            <li>
	                <a href="{{ route('logout') }}"
	                                            onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();">
	                    Выход
	                </a>

	                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                    {{ csrf_field() }}
	                </form>
	            </li>
	        </ul>
	    </li>
	    
    @endguest
</ul>