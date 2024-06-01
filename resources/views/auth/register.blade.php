<x-guest-layout>
    <!-- バリデーションエラーがある場合は表示 -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>        
        
        <!-- ニックネーム -->
        <div class="mb-4">
            <x-input-label for="nickname" :value="__('ニックネーム')" />
            <x-text-input id="nickname" class="block mt-1 w-full" type="text" name="nickname" :value="old('nickname')" required autofocus autocomplete="nickname" />
            <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
        </div>        
        
        <!-- 電話番号 -->
        <div class="mb-4">
            <x-input-label for="phone_number" :value="__('電話番号')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autofocus autocomplete="phone_number" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- 職業 -->
        <div class="mb-4">
            <x-input-label for="occupation" :value="__('職業')" />
            <x-text-input id="occupation" class="block mt-1 w-full" type="text" name="occupation" :value="old('occupation')" required autofocus autocomplete="occupation" />
            <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
        </div>

        <!-- 年令 -->
        <div class="mb-4">
            <x-input-label for="age" :value="__('年令')" />
            <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required autofocus autocomplete="age" />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>       

        <!-- サブスク終了日（非表示） -->
        <div class="mb-4" style="display: none;">
            <x-input-label for="subscription_end_date" :value="__('サブスク終了日')" />
            <x-text-input id="subscription_end_date" class="block mt-1 w-full" type="date" name="subscription_end_date" :value="old('subscription_end_date')" autofocus autocomplete="subscription_end_date" />
            <x-input-error :messages="$errors->get('subscription_end_date')" class="mt-2" />
        </div>

        <!-- サブスクフラグ -->
        <div class="mb-4" style="display: none;">
            <x-input-label for="subscription_flag" :value="__('サブスクフラグ')" />
            <x-text-input id="subscription_flag" class="block mt-1 w-full" type="text" name="subscription_flag" :value="old('subscription_flag')" autofocus autocomplete="subscription_flag" />
            <x-input-error :messages="$errors->get('subscription_flag')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
