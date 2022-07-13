<?php

namespace App\Http\Controllers;

use App\Models\Permission as ModelsPermission;
// use App\Models\Role;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
// use Spatie\Permission\Contracts\Permission;
// use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str; 
use Spatie\Permission\Models\Permission;



class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
       
        if ($req->ajax()) {
            $data = Role::select('*')->orderBy('id', 'DESC')->get();
            //datatable
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('check', function($row){
                    return '<input type="checkbox" name="check" class="sub_check" value="'. $row->id.'"><label></label>';
                })

                ->addColumn('action', function ($row) {
                    $actionBtn = '<a class="btn btn-sm btn-info"
                    href="' . route('backend.role.show', $row->id) . '">Show</a>
                <a class="btn btn-sm btn-success edit-item-btn"
                    href="' . route('backend.role.edit', $row->id) . '">Edit</a>
                <form method="POST" class="d-inline-block" action="' . route('backend.role.destroy', $row->id) . '">
                    ' . csrf_field() . '
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="submit" id="delete_user"
                        class="btn btn-sm btn-danger remove-item-btn show_confirm"
                        data-toggle="tooltip" title="Delete">Delete</button>
                </form>';
                    return $actionBtn;
                })
                // ->rawColumns([])
               
                ->rawColumns(['action','check'])
                ->make(true);
        }
        return view('backend.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission_data= Permission::get();
        return view('backend.role.create', compact('permission_data'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create(['name'=>$request->input('name')]);
        // dd($request->input('permission'));
        $role->syncPermissions($request->input('permission'));

        // $data= Role::create(['name'=> $request->input('name') ]);
        return redirect()->route('backend.role.index');
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

    public function destroyAll(Request $req)
    {
        $ids = $req->id;
        Role::whereIn('id' ,$ids)->delete();
        return response()-> json(['success'=>'data delete successfully']);
        // return redirect()->route('backend.role.index');
    }
}
