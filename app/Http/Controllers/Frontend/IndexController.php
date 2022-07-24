<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Galery;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galery = Galery::with('category')
            ->limit(9)
            ->orderBy('created_at', 'DESC')
            ->get();

        $galery_category = DB::table('db_galery')
            ->join('db_category_galery', 'db_category_galery.id', '=', 'db_galery.category_id')
            ->select('db_category_galery.category')
            ->groupBy('db_category_galery.category')
            ->get();

        $anggota = Anggota::select('id', 'nama', 'posisi', 'foto')->get();


        $post = Post::with(['category', 'tags'])
            ->where('published_at', 1)
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->get();

        // return response()->json($galery_category);
        return view('index', [
            'galery_category'   => $galery_category,
            'galery'            => $galery,
            'post'              => $post,
            'anggota'           => $anggota
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
