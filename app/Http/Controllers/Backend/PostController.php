<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\Post;
use App\Models\tag;
use Conner\Tagging\Model\Tag as ModelTag;
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
        if ($request->ajax()) {
            $post = Post::with(['category', 'tags'])->orderBy('created_at', 'DESC');
            # code...
            return datatables()->of($post)
                ->addColumn('publish', function ($post) {
                    if ($post->published_at == 1) {
                        # code...
                        $publish = '<center>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                       <button class="btn btn-sm btn-link" onclick="change_publish_status(' . $post->id . ')"><i class="fas fa-eye"></i></button>
                                </div>
                                </center>';
                        return $publish;
                    } else {
                        # code...
                        $publish = '<center>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button class="btn btn-sm btn-link-secondary" onclick="change_publish_status(' . $post->id . ')"><i class="fas fa-eye-slash"></i></button>
                                    </div>
                                </center>';
                        return $publish;
                    }
                })
                ->addColumn('image', function ($post) {
                    $image = '<center>
                    <img src="' . asset('storage/Image/Post/' . $post->image) . '"  class="img-thumbnail" style="width:50px" >
                </center>';
                    return $image;
                })
                ->addColumn('aksi', function ($post) {
                    $button = '<center>
                    <a href="admin-post/' . $post->id . '/edit" type="button" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    <button type="button" class="btn btn-sm btn-danger" onclick="delete_data(' . $post->id . ')"><i class="fas fa-trash"></i></button>
                </center>';
                    return $button;
                })
                ->rawColumns(['image', 'publish', 'aksi'])
                ->make(true);
        }

        // return $tag;
        return view('Backend.Post', []);
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
            'tag'       => $tag,
            'category'  => $category
        ]);
    }

    public function update_status_publish(Request $request)
    {
        $cek = Post::select('id', 'published_at')
            ->where('id', $request->id)->first();
        if ($cek->published_at == 0) {
            # code...
            Post::where('id', $request->id)
                ->update([
                    'published_at'   => 1,
                ]);
        } else {
            # code...
            Post::where('id', $request->id)
                ->update([
                    'published_at'   => 0,
                ]);
        }

        return response()->json(true);
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

        return redirect()->back()->with('status', 'Post telah dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addTags(Request $request)
    {
        tag::create([
            'tag'     => $request->tag,
        ]);
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
        $data = Post::find($id);
        return view('Backend.Create-post')->with('post', $data);
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
        Post::find($id)->delete();
    }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug'  => $slug]);
    }
}
