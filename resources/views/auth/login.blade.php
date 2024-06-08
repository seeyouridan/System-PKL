{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required
                autofocus autocomplete="username" placeholder="Masukan NIS atau Email..." />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" placeholder="Masukan Password..." />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Button -->
        <div class="flex items-center justify-end mt-6">
            <button type="submit" class="btn btn-danger w-full sm:w-auto rounded-lg">
                {{ __('Masuk') }}
            </button>
        </div>
    </form>
</x-guest-layout> --}}
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full rounded-3xl" type="text" name="username"
                :value="old('username')" required autofocus autocomplete="username" placeholder="Masukan NIS atau Email..." />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full rounded-3xl" type="password" name="password" required
                autocomplete="current-password" placeholder="Masukan Password..." />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Button -->
        <div class="flex items-center justify-end mt-10">
            <button type="submit" class="btn btn-danger w-full sm:w-24 rounded-3xl">
                {{ __('Masuk') }}
            </button>
        </div>
    </form>
</x-guest-layout>
