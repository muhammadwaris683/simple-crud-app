<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class itemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = item::all();

        return view('items.index', compact('items'));

        //  SQL Raw Qeuries

        // $items = DB::select('SELECT * FROM items');
        // return view('items.index', compact('items'));
        
        /*

        * This method with Query builder

        $items = DB::table('items')->get();
        return view('items.index', compact('items'));
        */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Item::create($request->only('name', 'description'));

        return redirect()->route('items.index');


        // SQL Raw Queries


        // $name = $request->input('name');
        // $description = $request->input('description');


        // DB::insert('INSERT INTO items(name, description, created_at, updated_at) VALUES (?, ?, NOW(), NOW())', [$name, $description]);

        // return redirect()->route('items.index');


        /*
        * This method with Query builder


        *    DB::table('items')->insert([
               'name' => $request->input('name'),
                'description' =>$request->input('description'),
               'created_at' => now(),
                'updated_at' => now()
           ]);

            return redirect()->route('items.index');
        */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $items = Item::findOrFail($id);

        return view('items.edit', compact('items'));


        // SQL Raw Queries

        // $items = DB::select('SELECT * FROM items WHERE id = ?', [$id])[0];

        
        // return view('items.edit', compact('items'));


        /*
        * This method with query builder
        $items = DB::table('items')->find($id);

        if(!$items){
            return redirect()->route('items.index')->with('error', 'Item not found');
        }

        return view('items.edit', compact('items'));
        */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the item by ID and update it
        $items = Item::findOrFail($id);
        $items->update($request->only('name', 'description'));

        return redirect()->route('items.index');


        // SQL Raw Queries

        // $name = $request->input('name');
        // $description = $request->input('description');

        // DB::update('UPDATE items SET name = ?, description = ?, updated_at = NOW() WHERE id = ?', [$name, $description, $id]);

        // return redirect()->route('items.index');


        /*
        * This method is query builder


        DB::table('items')->where('id', $id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'updated_at' => now(),
        ]);
    
        return redirect()->route('items.index');
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $items = Item::findOrFail($id);
        $items->delete();
    
        return redirect()->route('items.index');

        // SQL Raw Queries

        // DB::delete('DELETE FROM items WHERE id = ?', [$id]);

        // return redirect()->route('items.index');
       
        /*
        * This method for Query builder

        DB::table('items')->where('id', $id)->delete();
        return redirect()->route('items.index');
        
        */
    }
}
