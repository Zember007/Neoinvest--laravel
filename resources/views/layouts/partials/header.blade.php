<header class="header">
	<div class="container">
		<div class="row g-0 align-items-center justify-content-between">
			<div class="col-auto">
				<div class="header__main">
					<button class="sandwich header__sandwich js-toggle-menu">
						<span class="sandwich__inner"></span>
					</button>
					<a href="/" class="logo header__logo">
						<img src="/img/new/logo-accent.svg" alt="World Smart" class="logo__img">
					</a>
					<nav class="header__nav">
						<ul>
							<li><a href="about.html">О нас</a></li>
							<li><a href="tools.html" class="active">Инструменты</a></li>
							<li><a href="referals.html">Рефералы</a></li>
							<li><a href="partners.html">Партнерство</a></li>
							<li><a href="review.html">Отзывы</a></li>
							<li><a href="news.html">Акции🔥</a></li>
						</ul>

						@include('layouts.partials.header.lang')
					</nav>
				</div>
			</div>

			<div class="col-auto">
				<div class="header__controls">					
					<a href="{{ route('register') }}"
						class="btn btn-small btn-fill-white header__controls-btn"
						onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a>
						<form action="{{ route('logout') }}" method="POST" id="logout-form"> 
							@csrf 
						</form>
				</div>
			</div>

		</div>
	</div>
</header>