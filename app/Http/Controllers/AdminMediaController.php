<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $photos = Photo::paginate(10);

        return view('admin.media.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        //
        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

//        $file->move(public_path(), $name);

        $file->move('images', $name);

        Photo::create(['file'=>$name]);

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        $photo = Photo::findOrFail($id);

        unlink(public_path().$photo->file);

        $photo->delete();

        return redirect()->route('admin.media.index')
            ->with('warning', 'Media deleted successfully');
    }

    public function deleteMedia(Request $request){
        //
        $photos = Photo::findOrFail($request->checkBoxArray);

        foreach ($photos as $photo){

            $photo->delete();
            unlink(public_path().$photo->file);
        }

        return redirect()->back()->with('success', 'Deleted successfully');
    }


}
