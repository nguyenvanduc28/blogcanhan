<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    use StorageImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::with('category')
        ->orderBy('updated_at', 'desc')
        ->get();
        return view('admin/article', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.create-article', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->storageImage($request, 'feature_image_path', 'featureImages');
        $category_id = $request->category_id;
        $title = $request->title;
        $feature_image_name = $data['file_name'];
        $feature_image_path = $data['file_path'];
        $content = $request->content;
        $abstract = $request->abstract;

        $article = Article::firstOrCreate([
            'category_id' => $category_id,
            'title' => $title,
            'feature_image_name' => $feature_image_name,
            'feature_image_path' => $feature_image_path,
            'content' => $content,
            'abstract' => $abstract
        ]);

        $article->save();
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
        $categories = Category::all();
        return view('admin.edit-article', [
            'article' => $article,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
        $data = null;
        $category_id = $request->category_id;
        $title = $request->title;
        $content = $request->content;
        $abstract = $request->abstract;



        $articleU = Article::findOrFail($article->id);
        $articleU->title = $title;
        $articleU->category_id = $category_id;
        $articleU->content = $content;
        $articleU->abstract = $abstract;

        if ($request->hasFile('feature_image_path')) {
            $data = $this->storageImage($request, 'feature_image_path', 'featureImages');
            $feature_image_name = $data['file_name'];
            $feature_image_path = $data['file_path'];
            $articleU->feature_image_name = $feature_image_name;
            $articleU->feature_image_path = $feature_image_path;
        }

        $articleU->save();

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        $article = Article::findOrFail($article->id);
        $article->delete();
        return redirect()->back();
    }
}
