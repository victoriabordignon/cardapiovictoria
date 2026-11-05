@extends('layouts.app')

@section('title', 'Meu Cardápio | Cardápio digital para o seu negócio')

@section('content')
<div class="landing-page">
	<header class="site-header">
		<a class="brand" href="{{ route('home') }}" aria-label="Meu Cardápio, página inicial">
			<span class="brand-mark">m.</span>
			<span>meu <strong>cardápio</strong></span>
		</a>

		<nav class="site-nav" aria-label="Navegação principal">
			<a href="#vantagens">Vantagens</a>
			<a href="#acesso">Acessar</a>
		</nav>
	</header>

	<main class="landing-main">
		<section class="hero-copy" id="vantagens">
			<p class="eyebrow"><span></span> CARDÁPIO DIGITAL PARA QUEM FAZ ACONTECER</p>
			<h1>Seu negócio tem sabor. <em>Seu cardápio também.</em></h1>
			<p class="hero-description">Uma plataforma simples para você apresentar seus produtos, organizar seu cardápio e deixar seus clientes mais perto do próximo pedido.</p>

			<div class="hero-actions">
				<a class="button-primary" href="#acesso">Conheça a plataforma <span aria-hidden="true">↗</span></a>
				<span class="action-note">Comece gratuitamente</span>
			</div>

			<div class="menu-preview" aria-label="Exemplo de cardápio digital">
				<div class="preview-topline">
					<span class="preview-status"><span></span> CARDÁPIO NO AR</span>
					<span class="preview-dots" aria-hidden="true">•••</span>
				</div>
				<div class="preview-content">
					<div class="preview-title">
						<div class="preview-avatar">C</div>
						<div><strong>Casa da Massa</strong><span>Feito com carinho, servido quentinho</span></div>
					</div>
					<div class="preview-category"><span>Favoritos da casa</span><span>Ver todos <b>↗</b></span></div>
					<div class="preview-item">
						<div class="food-tile food-tile-pink"><span>🍝</span></div>
						<div class="preview-item-copy"><strong>Ravioli da casa</strong><span>Recheio artesanal e molho fresco</span></div>
						<strong class="preview-price">R$ 38</strong>
					</div>
					<div class="preview-item">
						<div class="food-tile food-tile-blue"><span>🥗</span></div>
						<div class="preview-item-copy"><strong>Salada colorida</strong><span>Leve, fresca e cheia de sabor</span></div>
						<strong class="preview-price">R$ 26</strong>
					</div>
				</div>
				<div class="preview-footer"><span>✦</span> Bonito no celular. Fácil de atualizar.</div>
			</div>

			<div class="benefit-row">
				<div><span class="benefit-icon benefit-pink">01</span><span><strong>Seu espaço</strong><small>Do seu jeito e com a sua marca</small></span></div>
				<div><span class="benefit-icon benefit-blue">02</span><span><strong>Sem complicação</strong><small>Organize tudo em um só lugar</small></span></div>
			</div>
		</section>

		<aside class="auth-panel" id="acesso" aria-label="Acesso à plataforma">
			<livewire:home-auth />
			<p class="auth-footnote"><span aria-hidden="true">✳</span> Um bom começo para o seu próximo capítulo.</p>
		</aside>
	</main>

	<footer class="site-footer">
		<span>© {{ date('Y') }} Meu Cardápio</span>
		<span>Feito para negócios com gosto de crescer <b>♥</b></span>
	</footer>
</div>
@endsection