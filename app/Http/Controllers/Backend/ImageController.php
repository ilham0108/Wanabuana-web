<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = Image::select('id', 'img', 'position', 'publish');
        if ($request->ajax()) {
            # code...
            return datatables()->of($data)
                ->addColumn('image', function ($data) {
                    $image = '<img src="' . asset('storage/Image/Tumbnail/' . $data->img) . '" alt="image" class="img-thumbnail" style="width:80px">';
                    return $image;
                })
                ->addColumn('published', function ($data) {
                    $published = '<div class="custom-control custom-switch">
                    <input onclick="switch_publish(' . $data->id . ')" type="checkbox" class="custom-control-input switch-publish" id="customSwitch' . $data->id . '">
                    <label class="custom-control-label" for="customSwitch' . $data->id . '">switch</label>
                  </div>';
                    return $published;
                })
                ->addColumn('aksi', function ($data) {
                    $button = '<center>
                    <button type="button" class="btn btn-sm btn-warning" onclick="edit_data(' . $data->id . ')"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="delete_data(' . $data->id . ')"><i class="fas fa-trash"></i></button>
                </center>';
                    return $button;
                })
                ->rawColumns(['image', 'published', 'aksi'])
                ->make(true);
        }

        return view('Backend.Manage-image');
    }


    public function publish_image($id, Request $request)
    {
        $data = Image::find($id)
            ->update([
                'publish'       => $request->status,
            ]);
        return response()->json($data);
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
        // return $request->file('image')->store('Image/Tumbnail');

        $validatedData = $request->validate([
            'img'     =>  'image|file|max:1024',
            'position'  =>  'required',
        ]);

        $pathname = $request->file('img')->getClientOriginalName();
        if ($request->file('img')) {
            # code...  
            $validateData['img'] = $request->file('img')->storeAs('Image/Tumbnail', $pathname);
        }

        Image::create([
            'img'       => $pathname,
            'position'  => $request->position
        ]);

        return response()->json(['Status' => true]);
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
    }
}
