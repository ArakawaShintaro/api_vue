<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Http\Requests\ItemStoreFormRequest;
use App\Http\Requests\ItemUpdateFormRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return response($items);
        /*どうやらresponseをすることでステータスコードとかも返せている*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStoreFormRequest $request)
    {
        $item = new Item();
        // todo: ログインユーザのidが入るようにする
        $item->user_id = \App\User::query()->first()->id;
        $item->content = $request->input('content');
        $item->save();
        return response($item, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return response($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateFormRequest $request, Item $item)
    {
        if ($request->input('content')) {
            $item->content = $request->input('content');
        }
        if ($request->input('checked')) {
            $item->checked = $request->input('checked');
        }

        $item->save();
        return response($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return response('{}'); // 返すものがないので空のJSONを返す
    }
}
