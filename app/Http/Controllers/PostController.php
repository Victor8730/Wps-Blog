<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Category;
use App\Models\Meta;
use App\Models\MetaLocalization;
use App\Models\Post;
use App\Models\PostLocalization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $locale = App::getLocale();
        // $posts = Post::withLocalizations()->get();
        // $posts = Post::find(36)->meta->withLocalizations()->get();
        $posts = Post::withLocalizations()->with(['meta' => function ($query) {
            $query->withLocalizations();
        }])->paginate(5);

        return view('post.index', compact('posts', 'locale'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $locales = LaravelLocalization::getSupportedLocales();

        return view('post.create', compact('locales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $post = Post::create([
            'slug' => $request->input('slug'),
            'publish' => $request->input('publish') == 'on' ? 1 : 0,
            'user_id' => Auth::id(),
        ]);

        foreach ($request->input('localization', []) as $k => $i) {
            /** @var PostLocalization $locale */
            $post->localizations()
                ->create($i + ['lang' => $k]);
        }

        $meta = Meta::create([
            'post_id' => $post->id,
        ]);

        foreach ($request->input('meta', []) as $k => $i) {
            /** @var MetaLocalization $locale */
            $meta->localizations()
                ->create($i + ['lang' => $k]);
        }

//        $cat = Category::create([
//            'post_id' => $post->id,
//        ]);

        return redirect()
            ->route('post.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $locales = LaravelLocalization::getSupportedLocales();
        $categories = Category::all('id','name');
        $post = Post::withLocalizations()->with(['meta' => function ($query) {
            $query->withLocalizations();
        }])->findOrFail($id);

        return view('post.edit', compact('post', 'locales', 'categories', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePost $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(StorePost $request, Post $post)
    {
        $post->update([
            'slug' => $request->input('slug'),
            'publish' => $request->input('publish') == 'on' ? 1 : 0,
        ]);

        foreach ($request->input('localization', []) as $k => $i) {
            /** @var PostLocalization $locale */
            $locale = $post->localizations()
                ->updateOrCreate(['lang' => $k], $i);
        }

        $meta = Meta::where('post_id', $post->id)->get();
        $metas = Meta::find($meta[0]->id);

        foreach ($request->input('meta', []) as $k => $i) {
            /** @var MetaLocalization $locale */
            $locale = $metas->localizations()
                ->updateOrCreate(['lang' => $k], $i);
        }

        return redirect()
            ->back()
            ->with('success', 'Post update successfully.');
    }

    /**
     * Change publish state with scope and redirect to index
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switch(int $id)
    {
        $post = Post::find($id);
        $post->PublishSwitch();

        return redirect()->back()
            ->with('success', 'Post state update');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index')
            ->with('success', 'Post deleted successfully');
    }
}
