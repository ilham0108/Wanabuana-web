<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $peserta = Recruitment::all();
        // return response()->json($peserta);
        if ($request->ajax()) {
            # code...
            return datatables()->of($peserta)
                ->addColumn('surat_sehat', function ($peserta) {
                    if ($peserta->surat_sehat != null) {
                        # code...
                        $surat_sehat = '<center><i class="fas fa-check" style="color: green"></i></center>';
                    } else {
                        $surat_sehat = '<center><i class="fas fa-times" style="color: red"></i></center>';
                    }
                    return $surat_sehat;
                })
                ->addColumn('surat_izin', function ($peserta) {
                    if ($peserta->surat_izin_orang_tua != null) {
                        # code...
                        $surat_izin = '<center><i class="fas fa-check" style="color: green"></i></center>';
                    } else {
                        $surat_izin = '<center><i class="fas fa-times" style="color: red"></i></center>';
                    }
                    return $surat_izin;
                })
                ->addColumn('foto', function ($peserta) {
                    if ($peserta->foto != null) {
                        # code...
                        $foto = '<center><img src="' . asset('storage/Recruitment/foto/' . $peserta->foto) . '"  class="img-thumbnail" style="width:50px" ></center>';
                    } else {
                        $foto = '<center></center>';
                    }
                    return $foto;
                })
                ->addColumn('bukti_pembayaran', function ($peserta) {
                    if ($peserta->bukti_pembayaran != null) {
                        # code...
                        $bukti_pembayaran = '<center><i class="fas fa-check" style="color: green"></i></center>';
                    } else {
                        $bukti_pembayaran = '<center><i class="fas fa-times" style="color: red"></i></center>';
                    }
                    return $bukti_pembayaran;
                })
                ->addColumn('aksi', function ($peserta) {
                    $button = '<center>
                    <button type="button" class="btn btn-sm btn-danger" onclick="delete_data(' . $peserta->id . ')"><i class="fas fa-trash"></i></button>
                    </center>';
                    return $button;
                })
                ->rawColumns(['surat_sehat', 'surat_izin', 'foto', 'bukti_pembayaran', 'aksi'])
                ->make(true);
        }
        return view('Backend.Recruitment');
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
        Recruitment::find($id)->delete();
    }
}
