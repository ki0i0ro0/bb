<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bb;
use App\Http\Requests\bbRequest;

class bbController extends Controller
{
    public function index()
    {
        // DBよりBookテーブルの値を全て取得
        $bbs = bb::all();

        // 取得した値をビュー「book/index」に渡す
        return view('bb/index', compact('bbs'));
    }

    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つBookの情報を取得
        $bb = bb::findOrFail($id);

        // 取得した値をビュー「book/edit」に渡す
        return view('bb/edit', compact('bb'));
    }

    public function update(bbRequest $request, $id)
    {
        $bb = bb::findOrFail($id);
        $bb->name = $request->name;
        $bb->price = $request->price;
        $bb->author = $request->author;
        $bb->save();

        return redirect("/bb");
    }
    public function destroy($id)
    {
        $bb = bb::findOrFail($id);
        $bb->delete();

        return redirect("/bb");
    }
    public function create()
    {
        // 空の$bookを渡す
        $bb = new bb();
        return view('bb/create', compact('bb'));
    }

    public function store(bbRequest $request)
    {
        $bb = new bb();
        $bb->name = $request->name;
        $bb->price = $request->price;
        $bb->author = $request->author;
        $bb->save();

        return redirect("/bb");
    }
}
