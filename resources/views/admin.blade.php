@extends('layouts.app')

@section('title', 'Visão geral | Meu Cardápio')

@section('content')
<div class="admin-page">
    <aside class="admin-sidebar">
        <a class="brand" href="{{ route('admin') }}" aria-label="Meu Cardápio, visão geral">
            <span class="brand-mark">m.</span>
            <span>meu <strong>cardápio</strong></span>
        </a>
        <div class="workspace-label">
            <small>Seu espaço</small>
            <strong>{{ auth()->user()->name }}</strong>
        </div>
        <nav class="admin-nav" aria-label="Menu administrativo">
            <a class="active" href="{{ route('admin') }}"><span>◫</span> Visão geral</a>
        </nav>
        <div class="sidebar-bottom">Seu negócio, organizado em um só lugar.</div>
    </aside>

    <main class="admin-main">
        <header class="admin-topbar">
            <span>Área administrativa</span>
            <div class="admin-user">
                <span class="admin-user-name">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="logout-button" type="submit">Sair da conta</button>
                </form>
            </div>
        </header>

        <div class="admin-content">
            <div class="admin-heading">
                <div>
                    <p class="admin-eyebrow">VISÃO GERAL</p>
                    <h1>Olá, {{ auth()->user()->name }}</h1>
                    <p>Este é o ponto de partida do seu cardápio digital.</p>
                </div>
                <span class="plan-label">Plano inicial</span>
            </div>

            <section class="stats-grid" aria-label="Resumo do cardápio">
                <article class="stat-card"><span>Itens no cardápio</span><strong>0</strong><small>Nenhum item cadastrado</small></article>
                <article class="stat-card"><span>Categorias</span><strong>0</strong><small>Nenhuma categoria criada</small></article>
                <article class="stat-card"><span>Status do cardápio</span><strong>Rascunho</strong><small>Seu cardápio ainda não foi publicado</small></article>
            </section>

            <section class="empty-menu" aria-labelledby="empty-title">
                <div class="empty-menu-icon" aria-hidden="true">✳</div>
                <h2 id="empty-title">Seu cardápio começa aqui</h2>
                <p>Quando você adicionar produtos e categorias, eles aparecerão nesta área. Por enquanto, seu espaço está prontinho para receber as primeiras informações.</p>
            </section>
        </div>
    </main>
</div>
@endsection