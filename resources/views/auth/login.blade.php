@extends('layouts.app')

@include('app')
@section('content')
<div class="flex items-center mt-[200px] justify-center">
    <div class="bg-[#383B42] p-8 rounded-xl shadow-xl w-96">
        <h2 class="text-2xl text-white font-semibold mb-6">{{ __('Login to Alist') }}</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-white">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="mt-1 p-2 block w-full border rounded-md focus:ring focus:ring-blue-200">
                @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-white">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 p-2 block w-full border rounded-md focus:ring focus:ring-blue-200">
                @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <input id="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring focus:ring-blue-200"
                        name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="ml-2 text-sm text-white">{{ __('Remember Me') }}</label>
                </div>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                {{ __('Login') }}
            </button>
        </form>
    </div>
</div>
@endsection
