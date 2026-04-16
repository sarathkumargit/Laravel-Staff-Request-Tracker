<x-guest-layout>
    <div class="p-8 sm:p-10">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-semibold tracking-tight text-black">Welcome back</h1>
            <p class="mt-2 text-sm text-black">Sign in to your account and continue to the staff tracker.</p>
        </div>

        <x-auth-session-status class="mb-4 rounded-2xl border border-slate-700 bg-slate-950/80 p-3 text-sm text-emerald-300" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" class="text-sm text-black" />
                <x-text-input
                    id="email"
                    class="mt-2 block w-full rounded-2xl border border-slate-700 bg-slate-950/90 px-4 py-3 text-slate-100 placeholder:text-slate-500 focus:border-indigo-500 focus:ring-indigo-500"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-rose-300" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" class="text-sm text-black" />

                <x-text-input
                    id="password"
                    class="mt-2 block w-full rounded-2xl border border-slate-700 bg-slate-950/90 px-4 py-3 text-slate-100 placeholder:text-slate-500 focus:border-indigo-500 focus:ring-indigo-500"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-rose-300" />
            </div>

            <div class="flex items-center justify-between gap-4">
                <label for="remember_me" class="inline-flex items-center text-sm text-black">
                    <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-slate-600 bg-slate-900 text-indigo-500 focus:ring-indigo-500" name="remember">
                    <span class="ml-2">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-black hover:text-slate-100 underline">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div>
                <x-primary-button class="w-full rounded-2xl bg-blue-700 hover:bg-blue-600">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
