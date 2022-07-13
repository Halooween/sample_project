<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="'.route('backend.post.show',$row->id).'" class="fa fa-eye"></a> <a href="'.route('backend.post.edit',$row->id).'" class="fa fa-edit"></a> <a href="'.route('backend.post.destroy',$row->id).'" class="delete fa fa-trash"></a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
       return view('backend.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input= new Post();
        $input->title= $request->input('title');
        $input->slug= $request->input('slug');
        $input->content= $request->input('content');
        $input->status= $request->input('status');
        $input->category= $request->input('category');
         if($request->hasfile('uploadfile'))
        {
            $file = $request->file('uploadfile');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('images/', $filename);
            $input->images = $filename;
        }
    
        $input->save();;

        return redirect()->route('backend.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas= Post::find($id);
        return view('backend.post.read',compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas= Post::find($id);
        return view('backend.post.update',compact('datas'));
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
        $input=Post::find($id);
        $input->title= $request->input('title');
        $input->slug= $request->input('slug');
        $input->content= $request->input('content');
        $input->status= $request->input('status');
        $input->category= $request->input('category');
       
         if($request->hasfile('uploadfile'))
        {
            $image_path = '/images/'.$input->images; 
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $file = $request->file('uploadfile');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('images/', $filename);
            $input->images = $filename;
        }
    
        $input->update();;

        return redirect()->route('backend.post.index');
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

    public function destroyAll(Request $req)
    {
        
    }
}
