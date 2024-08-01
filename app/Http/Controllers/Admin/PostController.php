<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        LogActivity::addToLog('','List semua artikel');
        return view('admin.post.index', ['posts' => $posts]);
    }

    public function search(Request $request)
    {
        $posts = Post::where('title', 'like', "%" . $request->search . "%")->get();
        $kalimat = 'Kata kunci: '. $request->search;
        LogActivity::addToLog($kalimat,'Cari artikel');
        return view('admin.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        LogActivity::addToLog('','Akses halaman membuat artikel');
        return view('admin.post.create', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::id();
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            // 'tags' => 'required',
            'publish_date' => 'required',
        ]);

        try {


            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file[0]->getClientOriginalExtension();
                $filename = 'blog_' . time() . '.' . $extension;
                $file[0]->move('admin/assets/images/blogs/', $filename);
            }

            $post = Post::create([
                'slug' => Str::slug($request->title),
                'title' => $request->title,
                'excerpt' => 'excerpt',
                'body' => $request->body,
                'published' => $user,
                'publish_date' => $request->publish_date,
                'featured_image' => $filename,
                'featured_image_caption' => $request->caption,
                'user_id' => $user,
                'meta' => 'meta',
                'markdown' => '1'
            ]);

            if ($post) {
                $tags = explode(', ', $request->tags);
                $tagIds = [];
                foreach ($tags as $i => $tag) {
                    $tagcheck = Tag::where('name', '=', $tag)->first();
                    if ($tagcheck) {
                        $tagIds[] = $tagcheck->id;
                    }

                    if (!Tag::where('name', '=', $tag)->first()) {
                        // $val = $val . ",". $tag;
                        $tag = Tag::create([
                            'name' => $tag,
                            'slug' => $tag
                        ]);

                        $tagIds[] = $tag->id;
                    }
                }
                $post->tag()->attach($tagIds);
            }
            return redirect()->back()->with(['success' => "Berhasil tambah post"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with('tag')->first();
        LogActivity::addToLog('','Akses halaman artikel');
        return view('admin.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->with('tag')->first();
        $tag = Tag::all();
        return view('admin.post.edit', [
            'post' => $post,
            'tag' => $tag
        ]);
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
        $post = Post::where('id', $id)->with('tag')->first();
        $user = Auth::id();
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'tags' => 'required',
            'date' => 'required'
        ]);

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file[0]->getClientOriginalExtension();
                $filename = 'blog_' . time() . '.' . $extension;
                if (File::exists($file[0])) {
                    $file[0]->move('admin/assets/images/blogs/', $filename);
                    File::delete($file[0]);
                }
                $post->update([
                    'slug' => Str::slug($request->title),
                    'title' => $request->title,
                    'excerpt' => 'excerpt',
                    'body' => $request->body,
                    'published' => $user,
                    'published_date' => $request->date,
                    'featured_image' => $filename,
                    'featured_image_caption' => $request->caption,
                    'user_id' => $user,
                    'meta' => 'meta',
                    'markdown' => '1'
                ]);
            } else {
                $post->update([
                    'slug' => Str::slug($request->title),
                    'title' => $request->title,
                    'excerpt' => 'excerpt',
                    'body' => $request->body,
                    'published' => $user,
                    'published_date' => $request->date,
                    'featured_image_caption' => $request->caption,
                    'user_id' => $user,
                    'meta' => 'meta',
                    'markdown' => '1'
                ]);
            }
            if ($post) {
                $post->tag()->sync(request('tags')); //sync tag ke db

            }
            LogActivity::addToLog('','Update artikel');
            return redirect()->back()->with(['success' => "Berhasil update post"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete($post);
        LogActivity::addToLog('','Hapus artikel');
        return redirect()->back()->with(['success' => "Berhasil hapus data"]);
    }
}
