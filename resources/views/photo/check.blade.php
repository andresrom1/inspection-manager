<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('photo.performCheck') }}">
        @csrf


        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <input type="text" value="{{ $inspection->taker_id }} " id="taker_id" name="taker_id" hidden>
            <input type="text" value="{{ $token }} " id="token" name="token" hidden>
        </div>


        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ml-3">
                {{ __('Validar e-mail') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
