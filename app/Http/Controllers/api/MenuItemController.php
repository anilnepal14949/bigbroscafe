<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuItemResource;
use App\Menu;
use App\MenuItem;
use Illuminate\Http\Request;

use Image;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function getMenuItems(Menu $menu)
    {
        $items = MenuItem::where('menu_id', $menu->id)->orderBy('item_order', 'asc')->get();

        return MenuItemResource::collection($items);
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
        $request->validate([
            'menu_id' => 'required|numeric|min:1',
            'item_name' => 'required|unique:menu_items',
            'item_description' => 'required',
            'item_price' => 'required|min:1',
            'item_image' => 'required',
            'status' => 'required'
        ]);

        $image = $this->uploadImage($request->item_image);

        $menuitem = MenuItem::create([
            'menu_id' => $request->menu_id,
            'item_name' => $request->item_name,
            'item_description' => $request->item_description,
            'item_price' => $request->item_price,
            'item_image' => $image,
            'item_order' => MenuItem::max('item_order') + 1,
            'status' => $request->status
        ]);

        return response()->json($menuitem);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItem $menuItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItem $menuItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItem $item)
    {
        unlink(public_path() . '/' . $item->item_image);

        $item->delete();
        return response(['success' => 'Menu Item deleted successfully'], 200);
    }

    public function getAllItems()
    {
        $items = MenuItem::all();

        return response()->json($items);
    }

    public function uploadImage($image)
    {
        $position = strpos($image, ';');
        $sub = substr($image, 0, $position);
        $ext = explode('/', $sub)[1];

        $name = time() . "." . $ext;
        $img = Image::make($image);
        $upload_path = 'items/';
        $image_url = $upload_path . $name;
        $img->save($image_url);

        return $image_url;
    }
}
