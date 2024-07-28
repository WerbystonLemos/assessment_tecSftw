<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="formGroup">
            <label for="email">Email</label><br/>
            <input id="email" type="email" name="email" placeholder="email" />
        </div>

        <!-- Password -->
        <div class="formGroup">
            <label for="password">Password</label><br/>
            <input id="password" type="password" name="password" placeholder="senha" required />
        </div>

        <!-- Remember Me -->
        <div id="containerActionsLogin">
            <label for="remember_me">
                <input id="remember_me" type="checkbox" name="remember">
                <span >Lembrar</span>
            </label>

            <div>
                <a href="{{ route('register') }}">
                    {{ __('Registrar-se') }}
                </a>

                <x-primary-button>
                    {{ __('Logar') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
