<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Team;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $anggota = Anggota::select('id', 'nama', 'posisi', 'foto');
            # code...
            return datatables()->of($anggota)
                ->addColumn('image', function ($anggota) {
                    $image = '<center>
                    <img src="' . asset('storage/Image/Anggota/' . $anggota->foto) . '"  class="img-thumbnail" style="width:50px" >
                </center>';
                    return $image;
                })
                ->addColumn('aksi', function ($anggota) {
                    $button = '<center>
                    <button type="button" class="btn btn-sm btn-danger" onclick="delete_data(' . $anggota->id . ')"><i class="fas fa-trash"></i></button>
                </center>';
                    return $button;
                })
                ->rawColumns(['image', 'aksi'])
                ->make(true);
        }
        // return response()->json($anggota);
        return view('Backend.Member');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Add-teams');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'     =>  'required',
            'posisi'      =>  'required',
            'image'     =>  'required'
        ]);

        $pathname = $request->file('image')->getClientOriginalName();

        $post = Anggota::create([
            'nama'         => $request->nama,
            'posisi'       => $request->posisi,
            'foto'        => $pathname,
        ]);

        if ($request->file('image')) {
            # code...  
            $validateData['image'] = $request->file('image')->storeAs('Image/Anggota', $pathname);
        }

        return response()->json(['true']);
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
