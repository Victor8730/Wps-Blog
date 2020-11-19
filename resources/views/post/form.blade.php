@include('errors.fields')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <form
                                action="{{ isset($typeForm) ? route('post.update', $post->id) : route('post.store') }}"
                                method="POST">

                                @csrf
                                @if (isset($typeForm))
                                    @method('PUT')
                                @endif


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Slug:</strong>
                                        <input type="text" name="slug" class="form-control" placeholder="slug"
                                               value="{{ isset($typeForm) ? $post->slug  : null }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Slug:</strong>
                                        <select name="localization">
                                            <option value="ru">ru</option>
                                            <option value="ua">ua</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Publish:</strong>
                                        <select name="publish">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900 hover:bg-green-500">
                                        {{ isset($typeForm) ? 'Update post' :  'Create new post' }}
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
