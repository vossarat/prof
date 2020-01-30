@extends('layouts.template')

@section('content')
<div class="container-fluid">
	<div class="row">
		<button class="btn btn-primary btn-block">
			<i class="fa fa-address-card-o fa-5x" aria-hidden="true"></i><p>Профсоюзный билет</p>
		</button>
		<button class="btn btn-block">
			<i class="fa fa-newspaper-o fa-5x" aria-hidden="true"></i><p>Новости</p>
		</button>
    	
		<button class="btn btn-primary btn-block">
			<i class="fa fa-question-circle-o fa-5x" aria-hidden="true"></i><p>Вопросы и ответы</p>
		</button>
    	
		<button class="btn btn-block" onclick="window.location.href = '/app';">
			<i class="fa fa-columns fa-5x" aria-hidden="true"></i><p>Административная панель</p>
		</button>
        
	</div>
</div>

<div id="modalAlertIphone" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Основное содержимое модального окна -->
			<div class="modal-body text-center" style="padding: 10px; font-weight: bold;">
				
				<img src="/images/pwaios.gif" height="300" width="200"/>
				{{--<iframe width="100" height="100" src="/images/pwaios.mp4" frameborder="0" allowfullscreen></iframe>--}}
				<br/>Установите приложение
				<br/>Нажмите <img src="/images/safari_add_home.png" height="16" width="16"/> 
				<br/>и далее "На экран "Домой"
				<br/><button href="/"data-dismiss="modal">Мне понятно</button>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
	$(function () {
			$('button').css('height', screen.height/4);
			$('a').css('height', screen.height/4);
		});
	
	$(function () {
			const isIos = () => {
				const userAgent = window.navigator.userAgent.toLowerCase();
				return /iphone|ipad|ipod/.test( userAgent );
			}
			// Detects if device is in standalone mode
			const isInStandaloneMode = () => ('standalone' in window.navigator) && (window.navigator.standalone);
			 
			// Checks if should display install popup notification:
			if (isIos() && !isInStandaloneMode()) {
				$("#modalAlertIphone").modal('show');
				this.setState({ showInstallMessage: true });
			}

		});
	
      new SmartBanner({
          daysHidden: 15,   // days to hide banner after close button is clicked (defaults to 15)
          daysReminder: 90, // days to hide banner after "VIEW" button is clicked (defaults to 90)
          appStoreLanguage: 'ru', // language code for the App Store (defaults to user's browser language)
          title: 'Картотека профсоюзов',
          author: 'TheMrDOC111',
          button: 'Установить',
          store: {
              ios: 'App Store',
              android: 'Google Play',
              windows: 'Windows store'
          },
          price: {
              ios: 'FREE',
              android: 'Бесплатно',
              windows: 'FREE'
          }
          // , theme: '' // put platform type ('ios', 'android', etc.) here to force single theme on all device
          // , icon: '' // full path to icon image if not using website icon image
          // , force: 'ios' // Uncomment for platform emulation
      });
	
</script>
@endpush
