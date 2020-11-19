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
                            <a href="{{ route('post.create') }}"
                               class="px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900 hover:bg-gray-700">
                                {{ __('Create') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    @include('errors.session')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Slug
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">

                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                                            {{$post->name}}
                                                        </div>
                                                        <div class="text-sm leading-5 text-gray-500">

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap">
                                                <div class="text-sm leading-5 text-gray-900">
                                                    ///
                                                </div>
                                                <div class="text-sm leading-5 text-gray-500">{{$post->slug}}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap">
                                                {!! $post->publish === 1 ? "<span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800'>Active</span>"  : null !!}
                                            </td>
                                            <td class="px-8 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                                <a href="{{ route('post.edit', $post->id) }}"
                                                   class="text-cool-gray-600 hover:text-cool-gray-900">
                                                    edit
                                                </a>
                                                <form action="{{ route('post.destroy', $post->id) }}" method="POST">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" title="delete"
                                                            class="text-cool-gray-600 hover:text-cool-gray-900">
                                                        delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>


