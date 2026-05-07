<x-guest-layout>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Password" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label class="inline-flex items-center">
                <input type="checkbox"
                       name="remember"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">

                <span class="ms-2 text-sm text-gray-600">
                    Remember me
                </span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">

            <div class="flex gap-4">

                @if (Route::has('register'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('register') }}">
                        Register
                    </a>
                @endif

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif

            </div>

            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded">
                Log in
            </button>

        </div>

    </form>

</x-guest-layout>