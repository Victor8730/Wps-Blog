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
                                            Short Name
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
{{--{{$posts}}--}}
{{print_r($posts)}}
{{$posts->localizations[0]->h1}}
{{--                                    @foreach ($posts as $post)--}}
{{--                                        <tr>--}}
{{--                                            <td class="px-6 py-4 whitespace-no-wrap">--}}
{{--                                                <div class="flex items-center">--}}
{{--                                                    <div class="ml-4">--}}
{{--                                                        <div class="text-sm leading-5 font-medium text-gray-900">--}}
{{--                                                            {{$post->localizations[0]->name}}--}}
{{--                                                        </div>--}}
{{--                                                        <div class="text-sm leading-5 text-gray-500">--}}
{{--                                                            {{$post->localizations[1]->name}}--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="px-6 py-4 whitespace-no-wrap">--}}
{{--                                                <div class="text-sm leading-5 text-gray-900">--}}
{{--                                                    {{$post->slug}}--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="px-6 py-4 whitespace-no-wrap">--}}
{{--                                                {!! $post->publish === 1 ? "<span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800'>Active</span>"  : "<span class='px-4 inline-flex text-xs leading-5 rounded-full bg-red-100 text-red-800'>Off</span>" !!}--}}
{{--                                            </td>--}}
{{--                                            <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">--}}
{{--                                                <a href="{{ route('post.show', $post->id) }}"--}}
{{--                                                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">--}}
{{--                                                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                                        <path d="M9 9a2 2 0 114 0 2 2 0 01-4 0z" />--}}
{{--                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a4 4 0 00-3.446 6.032l-2.261 2.26a1 1 0 101.414 1.415l2.261-2.261A4 4 0 1011 5z" clip-rule="evenodd" />--}}
{{--                                                    </svg>View--}}
{{--                                                </a>--}}
{{--                                                <a href="{{ route('post.edit', $post->id) }}"--}}
{{--                                                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">--}}
{{--                                                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                                        <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />--}}
{{--                                                    </svg>Edit--}}
{{--                                                </a>--}}
{{--                                                <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="inline-flex">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button type="submit" title="delete"--}}
{{--                                                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">--}}
{{--                                                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                                            <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />--}}
{{--                                                        </svg>--}}
{{--                                                        Delete--}}
{{--                                                    </button>--}}
{{--                                                </form>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}

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


