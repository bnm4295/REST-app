<?php

namespace Suuty\Http\Controllers;

use Illuminate\Http\Request;
use Suuty\Blog;

class BlogController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function __construct()
   {
       $this->middleware('isVerified');
   }
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        $slug = strtolower($request->title);
        if ($count = Blog::where('slug', 'like', "$slug%")->count()){
          $slug = str_finish($slug, "-$count");
        }
        $inputs['slug'] = preg_replace('/\s+/', '-', $slug);
        
        $imagepaths = array();
        $picture = '';

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = $filename;
                $destinationPath = public_path('images');
                array_push( $imagepaths, $filename);
                $file->move($destinationPath, $picture);
            }
            $encodedArray = array_map("utf8_encode", $imagepaths);
            $encodeimg = json_encode($encodedArray);
            $inputs['images'] = $encodeimg;
        }
        $blogs = Blog::Create($inputs);

        return redirect('/admin')->with('alert','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $blog = Blog::find($id);
      return view('blogs.edit', compact('blog','id'));
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
        $request->validate([
          'title' => 'required',
          'description' => 'required',
        ]);
        $blog = Blog::find($id);

        $blog->title = $request->get('title');
        $blog->description = $request->get('description');

        $slug = strtolower($blog->title);
        //$property->slug = $slug;
        if ($count = Blog::where('slug', 'like', "$slug%")->count()){
          $slug = str_finish($slug, "-$count");
        }
        $blog->slug = preg_replace('/\s+/', '-', $slug);

        $imagepaths = array();
        $picture = '';

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = $filename;
                $destinationPath = public_path('images');
                array_push( $imagepaths, $filename);
                $file->move($destinationPath, $picture);
            }
        }

        $imagepaths = array();
        $picture = '';

        $encodedArray = array_map("utf8_encode", $imagepaths);
        $encodeimg = json_encode($encodedArray);
        $temp = $blog['images'];
        $blog['images'] = $encodeimg;
        if($picture == ''){
          $blog['images'] = $temp;
        }
        $blog->save();
        return redirect('/admin')->with('alert','success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('/admin')->with('alert','success');
    }
}
