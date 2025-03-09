<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()  //データ一覧ページの表示
    {
        $authors = Author::all();
        return view('index', ['authors' => $authors]);
    }

    public function add()  //データ追加用ページの表示
    {
        return view('add');
    }

    public function create(Request $request)  //データ追加機能
    {
        $form = $request->all();
        Author::create($form);
        return redirect('/');
    }

    public function edit(Request $request)  //データ編集ページの表示
    {
        $author = Author::find($request->id);
        return view('edit', ['form' => $author]);
    }

    public function update(Request $request)  //更新機能
    {
        $form = $request->all();
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
        return redirect('/');
    }
}
