@include('errors.fields')
@include('errors.session')
<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                    <form
                        action="{{ isset($typeForm) ? route('post.update', $post->id) : route('post.store') }}"
                        method="POST" id="send-form">
                        <div class="grid grid-cols-6 gap-3">
                            @csrf
                            @if (isset($typeForm))
                                @method('PUT')
                            @endif

                            <div class="col-span-6 sm:col-span-6">
                                <div class="flex items-center h-10">
                                    <label for="name" class="font-medium text-gray-700">Name</label>
                                    @foreach($locales as $localeCode => $locale)
                                        <div class="ml-2 w-full">
                                            <input name="localization[{{$localeCode}}][name]"
                                                   class="mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm"
                                                   value="{{ (isset($typeForm) && isset($post->localizations) && $post->localizations[$loop->index]->lang == $localeCode) ? $post->localizations[$loop->index]->name : null }}">
                                            <p class="mb-2 text-sm text-gray-500">
                                                {{$locale['native']}}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="py-5 col-span-6 sm:col-span-6">
                                <div class="border-t border-gray-200"></div>
                            </div>

                            <div class="col-span-6 sm:col-span-1">
                                <div class="flex items-center h-10">
                                    <label for="publish"
                                           class="block text-sm font-medium text-gray-700">Publish</label>
                                    <div class="ml-2">
                                        <input name="publish" type="checkbox"
                                               class="block focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300 rounded"
                                            {{ (isset($typeForm) && $post->publish ===1) ? 'checked' : null }}>
                                    </div>
                                </div>
                                <div class="ml-3 text-sm">
                                    <p class="text-gray-500">Publish or not.</p>
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <div class="flex items-center h-10">
                                    <label for="slug" class="font-medium text-gray-700">Slug</label>
                                    <div class="ml-2 w-full">
                                        <input type="text" name="slug"
                                               class="mt-1 block w-full h-8 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm"
                                               value="{{ isset($typeForm) ? $post->slug  : null }}">
                                    </div>
                                </div>
                                <div class="ml-3 text-sm">
                                    <p class="text-gray-500">Slug for post</p>
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <div class="flex items-center h-10">
                                    <label for="category" class="font-medium text-gray-700">Category</label>
                                    <div class="ml-2 w-full">
                                        <select id="category"
                                                class="mt-1 block w-full h-8 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-indigo-500 sm:text-sm">
                                            <option value="1">United States</option>
                                            <option value="2">Canada</option>
                                            <option value="1">Mexico</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ml-3 text-sm">
                                    <p class="text-gray-500">Select category for post</p>
                                </div>
                            </div>

                            <div class="py-3 col-span-6 sm:col-span-6">
                                <div class="border-t border-gray-200"></div>
                            </div>
                        </div>
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4">
                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">

                                    <div class="px-4 py-5 sm:px-6 bg-gray-50">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                                            Content data
                                        </h3>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                            Preview and content data.
                                        </p>
                                    </div>

                                    <div class="border-t border-gray-200 py-2"></div>

                                    <div class="px-4 py-1 sm:px-3">
                                        <h4 class="px-4 py-1 inline-flex w-full leading-5 rounded-md bg-gray-100 text-green-800">
                                            Content
                                        </h4>
                                        @foreach($locales as $localeCode => $locale)
                                            <div class="col-span-6 sm:col-span-4">
                                                <div class="mt-1">
                                    <textarea rows="5" name="localization[{{$localeCode}}][content]"
                                              class="block w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm">{{ (isset($typeForm) && isset($post->localizations) && $post->localizations[$loop->index]->lang == $localeCode) ? $post->localizations[$loop->index]->content : null }}</textarea>
                                                </div>
                                                <p class="mb-2 text-sm text-gray-500">
                                                    {{$locale['native']}}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="px-4 py-1 sm:px-3">
                                        <div class="border-t border-gray-200 py-2"></div>
                                        <h4 class="px-4 py-1 inline-flex w-full leading-5 rounded-md  bg-gray-100 text-green-800">
                                            Preview
                                        </h4>
                                        @foreach($locales as $localeCode => $locale)
                                            <div class="col-span-6 sm:col-span-4">
                                                <div class="mt-1">
                                    <textarea rows="5" name="localization[{{$localeCode}}][preview]"
                                              class="block w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm">{{ (isset($typeForm) && isset($post->localizations) && $post->localizations[$loop->index]->lang == $localeCode) ? $post->localizations[$loop->index]->preview : null }}</textarea>
                                                </div>
                                                <p class="mb-2 text-sm text-gray-500">
                                                    {{$locale['native']}}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 sm:px-6 bg-gray-50">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                                            Meta
                                        </h3>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                            Other meta data.
                                        </p>
                                    </div>

                                    <div class="border-t border-gray-200 py-1"></div>

                                    <div class="px-4 py-1 sm:px-3">
                                        <h4 class="px-4 py-1 inline-flex w-full leading-5 rounded-md bg-gray-100 text-green-800">
                                            Title
                                        </h4>
                                        @foreach($locales as $localeCode => $locale)
                                            <div>
                                                <input name="meta[{{$localeCode}}][title]"
                                                       class="mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm"
                                                       value="{{ (isset($typeForm) && isset($post->localizations) && $post->meta->localizations[$loop->index]->lang == $localeCode) ? $post->meta->localizations[$loop->index]->title : null }}">
                                                <p class="mb-2 text-sm text-gray-500">
                                                    {{$locale['native']}}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="px-4 py-1 sm:px-3">
                                        <div class="border-t border-gray-200 py-2"></div>
                                        <h4 class="px-4 py-1 inline-flex w-full leading-5 rounded-md  bg-gray-100 text-green-800">
                                            H1
                                        </h4>
                                        @foreach($locales as $localeCode => $locale)
                                            <div>
                                                <input name="meta[{{$localeCode}}][h1]"
                                                       class="mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm"
                                                       value="{{ (isset($typeForm) && isset($post->localizations) && $post->meta->localizations[$loop->index]->lang == $localeCode) ? $post->meta->localizations[$loop->index]->h1 : null }}">
                                                <p class="mb-2 text-sm text-gray-500">
                                                    {{$locale['native']}}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="px-4 py-1 sm:px-3">
                                        <div class="border-t border-gray-200 py-2"></div>
                                        <h4 class="px-4 py-1 inline-flex w-full leading-5 rounded-md bg-gray-100 text-green-800">
                                            Description
                                        </h4>
                                        @foreach($locales as $localeCode => $locale)
                                            <div>
                                                <textarea name="meta[{{$localeCode}}][description]"
                                                          class="mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm">{{ (isset($typeForm) && isset($post->localizations) && $post->meta->localizations[$loop->index]->lang == $localeCode) ? $post->meta->localizations[$loop->index]->description : null }}</textarea>
                                                <p class="mb-2 text-sm text-gray-500">
                                                    {{$locale['native']}}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="px-4 py-1 sm:px-3">
                                        <div class="border-t border-gray-200 py-2"></div>
                                        <h4 class="px-4 py-1 inline-flex w-full leading-5 rounded-md  bg-gray-100 text-green-800">
                                            Keywords
                                        </h4>
                                        @foreach($locales as $localeCode => $locale)
                                            <div>
                                                <textarea name="meta[{{$localeCode}}][keywords]"
                                                          class="mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm">{{ (isset($typeForm) && isset($post->localizations)&& $post->meta->localizations[$loop->index]->lang == $localeCode) ? $post->meta->localizations[$loop->index]->keywords : null }}</textarea>
                                                <p class="mb-2 text-sm text-gray-500">
                                                    {{$locale['native']}}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="hidden sm:block" aria-hidden="true">
                            <div class="py-5">
                                <div class="border-t border-gray-200"></div>
                            </div>
                        </div>
                        <button type="submit"
                                class="px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900 hover:bg-green-500">
                            {{ isset($typeForm) ? 'Update post' :  'Create new post' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


