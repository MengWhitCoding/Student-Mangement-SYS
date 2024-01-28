<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-7">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                </div>
            </div>
            <div>
                <a href="{{ url('/home') }}" class=" bg-blue-800 text-white mt-5 sm:rounded-lg px-5 py-3 hover:bg-blue-400">Come To System</a>
            </div>
        </div>
    </div>
</x-app-layout>
