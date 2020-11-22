@include('errors.fields')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="bg-gray-100">
                    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                        <form
                            action="{{ isset($typeForm) ? route('post.update', $post->id) : route('post.store') }}"
                            method="POST">

                            @csrf
                            @if (isset($typeForm))
                                @method('PUT')
                            @endif

{{--                            <div>--}}
{{--                                <label for="localization">Slug:</label>--}}
{{--                                <select name="localization">--}}
{{--                                    <option value="ru">ru</option>--}}
{{--                                    <option value="ua">ua</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}

                            <div class="py-5">
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
                                        <input type="text" name="slug" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm"
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

                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700">H1 ru</label>
                                <div class="mt-1">
                                    <input name="meta[ru][h1]"
                                              class="mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm">
                                </div>
                            </div>
                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700">H1 ua</label>
                                <div class="mt-1">
                                    <input name="meta[ua][h1]"
                                              class="mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm">
                                </div>
                            </div>
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
                        </form>
                        <div class="hidden sm:block" aria-hidden="true">
                            <div class="py-5">
                                <div class="border-t border-gray-200"></div>
                            </div>
                        </div>
{{--                        <div class="md:grid md:grid-cols-3 md:gap-6">--}}
{{--                            <div class="md:col-span-1">--}}
{{--                                <div class="px-4 sm:px-0">--}}
{{--                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>--}}
{{--                                    <p class="mt-1 text-sm text-gray-600">--}}
{{--                                        This information will be displayed publicly so be careful what you share.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mt-5 md:mt-0 md:col-span-2">--}}
{{--                                <form--}}
{{--                                    action="{{ isset($typeForm) ? route('post.update', $post->id) : route('post.store') }}"--}}
{{--                                    method="POST">--}}
{{--                                    @csrf--}}
{{--                                    @if (isset($typeForm))--}}
{{--                                        @method('PUT')--}}
{{--                                    @endif--}}
{{--                                    <div class="shadow sm:rounded-md sm:overflow-hidden">--}}
{{--                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">--}}
{{--                                            <div class="grid grid-cols-3 gap-6">--}}

{{--                                                <div class="col-span-3 sm:col-span-2">--}}
{{--                                                    <label for="company_website"--}}
{{--                                                           class="block text-sm font-medium text-gray-700">--}}
{{--                                                        Website slug--}}
{{--                                                    </label>--}}
{{--                                                    <div class="mt-1 flex rounded-md shadow-sm">--}}
{{--                                                                <span--}}
{{--                                                                    class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">--}}
{{--                                                                  http://--}}
{{--                                                                </span>--}}
{{--                                                        <input type="text" id="company_website"--}}
{{--                                                               class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"--}}
{{--                                                               placeholder="www.example.com">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div>--}}
{{--                                                <label for="about" class="block text-sm font-medium text-gray-700">--}}
{{--                                                    About--}}
{{--                                                </label>--}}
{{--                                                <div class="mt-1">--}}
{{--                                                    <textarea id="about" rows="3"--}}
{{--                                                              class="mt-1 block w-full sm:text-sm border-gray-300 rounded-md"--}}
{{--                                                              placeholder="you@example.com"></textarea>--}}
{{--                                                </div>--}}
{{--                                                <p class="mt-2 text-sm text-gray-500">--}}
{{--                                                    Brief description for your profile. URLs are hyperlinked.--}}
{{--                                                </p>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-5 md:mt-0 md:col-span-2">--}}
{{--                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--                                                    <button type="submit"--}}
{{--                                                            class="px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900 hover:bg-green-500">--}}
{{--                                                        {{ isset($typeForm) ? 'Update post' :  'Create new post' }}--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


