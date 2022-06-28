<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\Post;
use App\Models\tag;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\True_;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $post = Post::with(['category', 'tags'])->get();
        if ($request->ajax()) {
            # code...
            return datatables()->of($post)
                ->addColumn('publish', function ($post) {
                    if ($post->published_at == 1) {
                        # code...
                        $publish = '<center>
                                       <button class="btn btn-sm btn-link"><i class="fas fa-eye"></i></button>
                                    </center>';
                    } else {
                        # code...
                        $publish = '<center>
                                       <button class="btn btn-sm btn-link"><i class="fas fa-eye-slash"></i></button>
                                    </center>';
                    }
                    return $publish;
                })
                ->addColumn('image', function ($post) {
                    $image = '<center>
                    <img src="' . asset('storage/Image/Post/' . $post->image) . '"  class="img-thumbnail" style="width:50px" >
                </center>';
                    return $image;
                })
                ->addColumn('aksi', function ($post) {
                    $button = '<center>
                    <button type="button" class="btn btn-sm btn-warning" onclick="edit_data(' . $post->id . ')"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="delete_data(' . $post->id . ')"><i class="fas fa-trash"></i></button>
                </center>';
                    return $button;
                })
                ->rawColumns(['image', 'publish', 'aksi'])
                ->make(true);
        }

        // return $tag;
        return view('Backend.Post', [
            'post'      => $post
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
        $tag = tag::all();
        $category = categories::all();
        return view('Backend.Create-post', [
            'tag'   => $tag,
            'category'  => $category
        ]);
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
        // return $request->all();
        $validatedData = $request->validate([
            'title'     =>  'required',
            'slug'      =>  'required',
            'category'  =>  'required',
            'image'     =>  'required',
            'body'      =>  'required'
        ]);

        $pathname = $request->file('image')->getClientOriginalName();

        $post = Post::create([
            'title'         => $request->title,
            'slug'          => $request->slug,
            'category_id'   => $request->category,
            'image'         => $pathname,
            'excerpt'       => Str::limit(strip_tags($request->body), 200),
            'body'          => $request->body,
        ]);

        $post->tags()->attach($request->tags);

        if ($request->file('image')) {
            # code...  
            $validateData['image'] = $request->file('image')->storeAs('Image/Post', $pathname);
        }

        return response()->json(true);
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

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug'  => $slug]);
    }
}
