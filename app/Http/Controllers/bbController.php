<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bb;
use App\Http\Requests\bbRequest;
use Illuminate\Support\Facades\Auth;
class bbController extends Controller
{
    /**
     * 初期
     * @access public
     * @param bbRequest $request
     */
    public function index()
    {        
        if (!Auth::check()) {
            return view('home');
        }        
        // DBよりBookテーブルの値を全て取得
        $bbs = bb::all();
        // 取得した値をビュー「book/index」に渡す
        return view('bb/index', compact('bbs'));

    }

    /**
     * 編集
     * @access public
     * @param bbRequest $request
     */
    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つBookの情報を取得
        $bb = bb::findOrFail($id);

        // 取得した値をビュー「book/edit」に渡す
        return view('bb/edit', compact('bb'));
    }
    /**
     * 更新
     * @access public
     * @param bbRequest $request
     */
    public function update(bbRequest $request, $id)
    {
        $bb = bb::findOrFail($id);
        $bb->name = $request->name;
        $bb->price = $request->price;
        $bb->author = $request->author;
        $bb->save();

        return redirect("/bb");
    }

    /**
     * 削除
     * @access public
     * @param bbRequest $request
     */
    public function destroy($id)
    {
        $bb = bb::findOrFail($id);
        $bb->delete();

        return redirect("/bb");
    }

    /**
     * 新規作成ボタン
     * @access public
     * @param bbRequest $request
     */
    public function create()
    {
        // 空の$bookを渡す
        $bb = new bb();
        return view('bb/create', compact('bb'));
    }
    /**
     * 新規作成処理
     * @access public
     * @param bbRequest $request
     */
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
