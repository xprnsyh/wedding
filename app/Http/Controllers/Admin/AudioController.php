<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AudioRequest;
use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AudioController extends Controller
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
        //
        $data_audio = Audio::orderBy('name', 'ASC')->get();

        return view('admin.audio.index', [
            'data_audio' => $data_audio
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
    public function store(AudioRequest $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|unique:audio',
        //     'file_audio' => 'required|file|max:3001'
        // ]);



        if ($request->hasFile('file_audio')) {
            $audio = $request->file('file_audio');
            $extension = $audio->getClientOriginalExtension();
            if ($extension == "mp3") {
                $filename = Str::slug($request->name) . '.' . $extension;
                if (File::exists($audio)) {
                    $audio->move('admin/assets/audio/', $filename);
                    File::delete($audio);
                }
                Audio::create([
                    'name' => $request->name,
                    'path' => $filename
                ]);
            } else {
                return redirect()->back()->with([
                    'error' => 'File harus audio'
                ]);
            }
        }




        return redirect()->back()->with([
            'success' => 'Berhasil menambah audio baru'
        ]);
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
        $audio = Audio::find($id);
        if ($audio->path != null) {
            if (File::exists('admin/assets/audio/' . $audio->path)) {
                File::delete('admin/assets/audio/' . $audio->path);
            }
        }
        $audio->delete($audio);

        return redirect()->back()->with([
            'success' => 'Berhasil menghapus audio'
        ]);
    }
}
