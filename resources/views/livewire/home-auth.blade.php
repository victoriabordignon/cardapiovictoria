<div class="auth-card">
    <div class="auth-heading">
        <p class="auth-kicker">Seu próximo passo começa aqui</p>
        <h2>{{ $mode === 'login' ? 'Boas-vindas de volta' : 'Crie sua conta' }}</h2>
        <p>{{ $mode === 'login' ? 'Entre para cuidar do seu cardápio digital.' : 'Leva só um minutinho para começar.' }}</p>
    </div>

    <div class="auth-tabs" role="tablist" aria-label="Acesso à conta">
        <button type="button" role="tab" aria-selected="{{ $mode === 'login' ? 'true' : 'false' }}" wire:click="setMode('login')">Entrar</button>
        <button type="button" role="tab" aria-selected="{{ $mode === 'register' ? 'true' : 'false' }}" wire:click="setMode('register')">Criar conta</button>
    </div>

    <form class="auth-form" wire:submit.prevent="authenticate">
        @if ($mode === 'register')
            <label class="form-field">
                Seu nome
                <input type="text" wire:model="name" autocomplete="name" placeholder="Como podemos te chamar?" @error('name') class="is-invalid" @enderror>
                @error('name') <span class="field-error">{{ $message }}</span> @enderror
            </label>
        @endif

        <label class="form-field">
            E-mail
            <input type="email" wire:model="email" autocomplete="email" placeholder="voce@exemplo.com" @error('email') class="is-invalid" @enderror>
            @error('email') <span class="field-error">{{ $message }}</span> @enderror
        </label>

        <label class="form-field">
            Senha
            <input type="password" wire:model="password" autocomplete="{{ $mode === 'login' ? 'current-password' : 'new-password' }}" placeholder="Mínimo de 8 caracteres" @error('password') class="is-invalid" @enderror>
            @error('password') <span class="field-error">{{ $message }}</span> @enderror
        </label>

        @if ($mode === 'register')
            <label class="form-field">
                Confirme sua senha
                <input type="password" wire:model="password_confirmation" autocomplete="new-password" placeholder="Digite a senha novamente">
            </label>
        @else
            <label class="remember-row"><input type="checkbox" wire:model="remember"> Manter conectado</label>
        @endif

        <button class="button-primary auth-submit" type="submit" wire:loading.attr="disabled">
            <span wire:loading.remove>{{ $mode === 'login' ? 'Entrar na minha conta' : 'Criar minha conta' }}</span>
            <span wire:loading>Um instante...</span>
        </button>
    </form>

    <p class="auth-legal">Ao continuar, você concorda com os termos de uso da plataforma.</p>
</div>