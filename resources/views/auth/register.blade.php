@extends('layouts.app')

@include('app')

@section('content')
<div class="container mx-auto">
    <div class="w-96 mx-auto  mt-[200px]">
        <div class="bg-[#383B42] shadow-md rounded-lg p-6">
            <h2 class="text-2xl text-white font-semibold mb-4">{{ __('Register') }}</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-white">{{ __('Name') }}</label>
                    <input id="name" type="text" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-200 @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-white">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-200 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-white">{{ __('Password') }}</label>
                    <input id="password" type="password" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-200 @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="block text-sm font-medium text-white">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-200" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
