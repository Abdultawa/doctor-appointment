<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pb-80" style="background-image: url('/ssss.jpegco'); background-size: cover; background-position: center;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Message -->
            <div class="text-5xl font-bold mb-4 pt-20">
                Welcome, {{ Auth::user()->name }}!
            </div>
            <p class="text-2xl">
                We're glad to see you back. Here's what's new on your dashboard.
            </p>
        </div>
    </div>
</x-app-layout>
