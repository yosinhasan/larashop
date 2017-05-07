<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller {

    private $itemService;

    function __construct(\App\Factory\Impl\ServiceFactory $factory) {
        $this->itemService = $factory->getItemService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $items = $this->itemService->readAll();
        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\ItemRequest $request) {
        $hasError = false;
        try {
            $this->itemService->create($request);
        } catch (\Exception $ex) {
            $hasError = true;
        }
        if (!$hasError) {
            return redirect('/items')->with('success', '1');
        }
        return redirect('item/new')->with('errors', '1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        try {
            $item = $this->itemService->read($id);
        } catch (\Exception $ex) {
            $item = null;
        }
        return view('item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $item = $this->itemService->read($id);
        return view('item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\ItemRequest $request, $id) {
        $hasError = false;
        try {
            $this->itemService->update($request, $id);
        } catch (\Exception $ex) {
            $hasError = true;
        }
        if (!$hasError) {
            return redirect('/items?success=true');
        }
        return redirect('/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->itemService->delete($id);
        return redirect('/items');
    }

}
