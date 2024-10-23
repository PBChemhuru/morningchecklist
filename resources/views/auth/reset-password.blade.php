<x-app-layout>
    <center>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <!-- USERNAME -->
        <div>
            <x-input-label for="username" :value="__('Username')" />

            <select name="user" id="user">
                <option>Select Users</option>
                @foreach($allusers as $users)
                <option value={{$users->Username}}>{{$users->Username}}</option>
                @endforeach
                @if(Auth::user()->Role=="Admin")
                  <option value="Admin">Admin</option>
                  @endif
            </select>
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1" type="password" name="password"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
    </center>
</x-app-layout>
