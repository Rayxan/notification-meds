<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Item::get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
               'name' => ['required', 'unique:items', 'max:255'],
            ]);

            $createdItem =Item::create([
                    'name' => $request->name,
                ]
            );

            return $this->responseOK('The med was saved', $createdItem, Response::HTTP_CREATED);
        } catch (\Throwable $e) {
            return $this->responseFail($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Item::find($id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $item = Item::find($id);

        $item->name = $request->name;

        $item->save();

         return $this->responseOK('The med was updated', '', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);

        $item->delete();

        return $this->responseFail('The med was deleted', [], Response::HTTP_CREATED);
    }
}
