<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function index()  //データ一覧ページの表示
    {
        $authors = Author::Paginate(4);
        // dd($authors);
        return view('index', ['authors' => $authors]);
    }

    public function add()  //データ追加用ページの表示
    {
        return view('add');
    }

    public function create(AuthorRequest $request)  //データ追加機能
    {
        $form = $request->all();
        // dd($form);
        Author::create($form);
        return redirect('/');
    }

    public function edit(Request $request)  //データ編集ページの表示
    {
        $author = Author::find($request->id);
        return view('edit', ['form' => $author]);
    }

    public function update(AuthorRequest $request)  //更新機能
    {
        $form = $request->all();
        // dd($form);
        unset($form['_token']);
        Author::find($request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)  //データ削除ページの表示
    {
        $author = Author::find($request->id);
        return view('delete', ['author' => $author]);
    }

    public function remove(Request $request)  //削除機能
    {
        Author::find($request->id)->delete();
        // dd($request->id);
        return redirect('/');
    }

    public function find()
    {
        return view('find', ['input' => '']);
    }

    public function search(Request $request)
    {
        $item = Author::where('name', 'LIKE', "%{$request->input}%")->first();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('find', $param);
    }

    public function bind(Author $author)
    {
        $data = [
            'item'=>$author,
        ];
        return view('author.binds', $data);
    }

    public function relate()
    {
        $items = Author::all();
        return view('author.index', ['items' => $items]);
    }
}
