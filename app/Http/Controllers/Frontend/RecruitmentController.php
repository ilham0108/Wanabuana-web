<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Frontend.Recruitment');
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
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nim'                   => ['required', 'unique:recruitment,nim'],
            'nama_lengkap'          => ['required'],
            'nama_panggilan'        => ['required'],
            'tanggal_lahir'         => ['required'],
            'handphone'             => ['required', 'numeric'],
            'fakultas'              => ['required'],
            'program_studi'         => ['required'],
            'surat_sehat'           => ['required', 'mimes:pdf', 'max:2048'],
            'surat_izin_orang_tua'  => ['required', 'mimes:pdf', 'max:2048'],
            'foto'                  => ['required', 'mimes:jpeg,jpg', 'max:2048'],
            'bukti_pembayaran'      => ['required', 'mimes:pdf', 'max:2048'],
            'g-recaptcha-response'  => 'required|captcha'
        ]);

        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return Redirect::back()->withErrors($validator);
        } else {
            Recruitment::create([
                'nim'                       => $request->nim,
                'nama_lengkap'              => $request->nama_lengkap,
                'nama_panggilan'            => $request->nama_panggilan,
                'handphone'                 => $request->handphone,
                'tanggal_lahir'             => $request->tanggal_lahir,
                'fakultas'                  => $request->fakultas,
                'program_studi'             => $request->program_studi,
                'surat_sehat'               => $request->file('surat_sehat')->getClientOriginalName(),
                'surat_izin_orang_tua'      => $request->file('surat_izin_orang_tua')->getClientOriginalName(),
                'foto'                      => $request->file('foto')->getClientOriginalName(),
                'bukti_pembayaran'          => $request->file('bukti_pembayaran')->getClientOriginalName(),
            ]);


            if ($request->file('surat_sehat')) {
                # code...  
                $validateData['surat_sehat'] = $request->file('surat_sehat')->storeAs('Image/Recruitment/Surat_sehat', $request->file('surat_sehat')->getClientOriginalName());
            }
            if ($request->file('surat_izin_orang_tua')) {
                # code...  
                $validateData['surat_izin_orang_tua'] = $request->file('surat_izin_orang_tua')->storeAs('Image/Recruitment/Surat_izin_orang_tua', $request->file('surat_izin_orang_tua')->getClientOriginalName());
            }
            if ($request->file('foto')) {
                # code...  
                $validateData['foto'] = $request->file('foto')->storeAs('Image/Recruitment/foto', $request->file('foto')->getClientOriginalName());
            }
            if ($request->file('butkti_pembayaran')) {
                # code...  
                $validateData['butkti_pembayaran'] = $request->file('butkti_pembayaran')->storeAs('Image/Recruitment/butkti_pembayaran', $request->file('butkti_pembayaran')->getClientOriginalName());
            }
            return Redirect::back()->with('status', 'Terima kasih telah mendaftar menjadi anggota wanabuana, kami akan menghubungi anda secepatnya.');
        }
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
