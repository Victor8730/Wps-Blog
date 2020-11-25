@include('errors.fields')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                    <form
                        action="{{ isset($typeForm) ? route('post.update', $post->id) : route('post.store') }}"
                        method="POST">
                        <div class="grid grid-cols-3 gap-6">
                            @csrf
                            @if (isset($typeForm))
                                @method('PUT')
                            @endif

                            <div class="py-5 col-span-3 sm:col-span-3">
                                <div class="border-t border-gray-200"></div>
                            </div>

                            <div class="flex items-start grid grid-cols-3">
                                <div class="md:col-span-1 ">
                                    <div class="flex items-center h-10">
                                        <input name="publish" type="checkbox"
                                               class="focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="publish" class="font-medium text-gray-700">Publish</label>
                                        <p class="text-gray-500">Publish or not this post.</p>
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <div class="flex items-center h-10">
                                        <input type="text" name="slug"
                                               class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm"
                                               value="{{ isset($typeForm) ? $post->slug  : null }}">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="slug" class="font-medium text-gray-700">Slug</label>
                                        <p class="text-gray-500">Slug for post</p>
                                    </div>
                                </div>
                            </div>

                            <div class="py-5">
                                <div class="border-t border-gray-200"></div>
                            </div>

                            @foreach($locales as $localeCode => $locale)
                                <div>
                                    <label for="about"
                                           class="block text-sm font-medium text-gray-700">H1 {{$localeCode}}</label>
                                    <div class="mt-1">
                                        <input name="meta[{{$localeCode}}][h1]"
                                               class="mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm">
                                    </div>
                                </div>
                            @endforeach
                            <div class="py-5">
                                <div class="border-t border-gray-200"></div>
                            </div>

                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700">Text ru</label>
                                <div class="mt-1">
                                    <textarea rows="3" name="localization[ru][content]"
                                              class="mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Main text for post.
                                </p>
                            </div>

                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700">Text ua</label>
                                <div class="mt-1">
                                    <textarea rows="3" name="localization[ua][content]"
                                              class="mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Main text for post.
                                </p>
                            </div>

                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700">Preview ru</label>
                                <div class="mt-1">
                                    <textarea rows="3" name="localization[ru][preview]"
                                              class="mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Main text for post.
                                </p>
                            </div>

                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700">Preview ua</label>
                                <div class="mt-1">
                                    <textarea rows="3" name="localization[ua][preview]"
                                              class="mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Main text for post.
                                </p>
                            </div>

                            <div class="py-5">
                                <div class="border-t border-gray-200"></div>
                            </div>

                            <button type="submit"
                                    class="px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900 hover:bg-green-500">
                                {{ isset($typeForm) ? 'Update post' :  'Create new post' }}
                            </button>
                        </div>
                    </form>
                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


