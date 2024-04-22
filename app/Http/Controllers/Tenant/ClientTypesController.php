<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientTypesRequest;
use App\Http\Requests\UpdateClientTypesRequest;
use App\Models\ClientTypes;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;

class ClientTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenant.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientTypesRequest $request)
    {

        try {

            ClientTypes::create(
                ["name" => $request->input("category_name")]
            );
            return redirect()->route('tenant.admin')->with('success', 'New category created successfully');
        } catch (Exception $e) {
            if ($e instanceof AuthorizationException) {
                return redirect()->back()->with('error', "You're not allowed create a new category!.");
            } else {
                return redirect()->back()->with('error', "Error while creating new category: " . $e->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientTypes $clientTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientTypes $category)
    {
        return view('tenant.categories.edit', ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientTypesRequest $request, ClientTypes $category)
    {
        try {
            $category->name = $request->category_name;
            $category->save();
            return redirect()->route('tenant.admin')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {

            $errorMsg = $e->getMessage();
            return back()->with('error', $errorMsg);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientTypes $category)
    {
        try{
            $category->delete();
            return redirect()->route('tenant.admin')->with('success', 'Category deleted successfully');
        }catch (\Exception $e) {
            
            if ($e instanceof AuthorizationException) {
                return redirect()->back()->with('error', "You're not allowed to delete this category.");
            } else {
                return redirect()->back()->with('error', "Error while deleting category: " . $e->getMessage());
            }
        }
    }
}
