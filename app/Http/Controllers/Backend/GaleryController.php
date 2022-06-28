<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category_galery;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category_galery::select('category')->get();

        $filter_category =  DB::table('db_galery')
            ->select('category', DB::raw('count(*) as total'))
            ->groupBy('category')
            ->orderByRaw('count(category) DESC')
            ->get();
        // return $filter_category;

        $galery = Galery::select('id', 'image', 'category')->get();
        return view('Backend.Galery', [
            'category'          => $category,
            'image_galery'      => $galery,
            'category_filter'   => $filter_category
        ]);
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
        //

        $validatedData = $request->validate([
            'image'     =>  'image|file',
            'category'  =>  'required',
        ]);

        $pathname = $request->file('image')->getClientOriginalName();

        if ($request->file('image')) {
            # code...  
            $validateData['image'] = $request->file('image')->storeAs('Image/Galery', $pathname);
        }

        Galery::create([
            'image'       => $pathname,
            'category'  => $request->category
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $path = Galery::find($id);
        if (Storage::disk('public')->exists('Image/Galery/' . $path->image)) {
            // ...
            Storage::delete('Image/Galery/' . $path->image);
        }
        Galery::where('id', $path->id)->delete();
    }

    public function multiple_delete(Request $request)
    {
        DB::beginTransaction();
        try {
            //code...
            $documents = Galery::whereIn('id', $request->id)->get();
            foreach ($documents as $document) {
                // Storage::disk('userfiles')->delete($document->name);
                if (Storage::disk('public')->exists('Image/Galery/' . $document->image)) {
                    // ...
                    Storage::delete('Image/Galery/' . $document->image);
                }
            }
            $data = Galery::whereIn('id', $request->id)->delete();
            DB::commit();
            return response()->json('sukses');
        } catch (\Exception $th) {
            //throw $th;
            DB::rollBack();
        }
    }
}
