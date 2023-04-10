<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.category', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name = $request->name;
        $category = Category::firstOrCreate([
            'name' => $name
        ]);

        $category->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        $categories = Category::all();
        $contacts = Contact::all();
        $articles = Article::latest()->take(20)->get();
        $category2 = Category::findOrFail($category->id);

        $datas = $category2->articles()->orderBy('updated_at', 'desc')->get();
        return view('category-page', ['categories'=>$categories, 'contacts'=>$contacts, 'articles' => $articles, 'datas'=>$datas, 'category' => $category2]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $name = $request->name;
        $category = Category::find($category->id);
        $category->name = $name;
        $category->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category = Category::find($category->id);
        if ($category->articles()->count() > 0)
        return back()->with(['message' => 'Không thể xóa. Hãy xóa các bài viết thuộc danh mục ' . $category->name. ' trước rồi thực hiện lại.']);
        $categoryName = $category->name;
        $category->delete();
        return back()->with(['message' => 'Đã xóa danh mục ' . $categoryName]);
    }


    public function readArticle(Request $request, $category, $article) {
        $categories = Category::all();
        $contacts = Contact::all();
        $articles = Article::latest()->get();
        $category2 = Category::findOrFail($category);
        $article = Article::findOrFail($article);
        return view('view-article', ['categories'=>$categories, 'contacts'=>$contacts, 'articles' => $articles,'article' => $article, 'category' => $category2]);
    }
}
