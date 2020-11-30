<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <x-slot name="menu">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <button class="px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-700">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('post.store') }}"
                               class="px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900 hover:bg-green-500">
                                {{ __('Add') }}
                            </a>
                        </div>
                    </div>
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('post.index') }}"
                               class="px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900 hover:bg-red-700">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    @include('post.form', ['typeForm' => 'update'])

</x-app-layout>
