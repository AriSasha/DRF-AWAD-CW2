@extends('layouts.main')

@section('title', 'Sign in')

@section('content')
<div class="max-w-md mx-auto px-4 py-16">

    <div class="rounded-2xl border border-[#333333] bg-[#1A1A1A] p-6 sm:p-8">
        <h1 class="text-xl font-bold text-[#E5D5C1]">Sign in</h1>
        <p class="mt-1 mb-6 text-sm text-[#B9AC9B]">Use your university email and password.</p>

        <!-- Start: Sign in form -->
        <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-[#D6C7B4] mb-2">Email</label>
                <input type="email" id="email" name="email" class="input-field" placeholder="you@mubs.ac.ug">
                @error('email') <p class="text-sm text-[#F28B8F] mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-[#D6C7B4] mb-2">Password</label>
                <input type="password" id="password" name="password" class="input-field">
                @error('password') <p class="text-sm text-[#F28B8F] mt-1">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-[#0F0F0F] bg-[#ECC412] hover:bg-[#F5D54A]">Sign in</button>
        </form>
        <!-- End: Sign in form -->
    </div>

</div>
@endsection
