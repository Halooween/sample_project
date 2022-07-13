<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;


class DashboardController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')
        ->except('logout');
    }
        public function index(Request $request){
            // if ($request->ajax()) {
            //     $data = User::select('*')->orderBy('id', 'DESC')->get();
            //     //datatable
            //     return DataTables::of($data)
            //         ->addIndexColumn()
            //         ->addColumn('action', function ($row) {
            //             $actionBtn = '<a class="btn btn-sm btn-info"
            //             href="' . route('backend.user.show', $row->id) . '">Show</a>
            //         <a class="btn btn-sm btn-success edit-item-btn"
            //             href="' . route('backend.user.edit', $row->id) . '">Edit</a>
            //         <form method="POST" class="d-inline-block" action="' . route('backend.user.destroy', $row->id) . '">
            //             ' . csrf_field() . '
            //             <input name="_method" type="hidden" value="DELETE">
            //             <button type="submit" id="delete_user"
            //                 class="btn btn-sm btn-danger remove-item-btn show_confirm"
            //                 data-toggle="tooltip" title="Delete">Delete</button>
            //         </form>';
            //             return $actionBtn;
            //         })
            //         // ->editColumn('full_name', function ($row) {
            //         //     return $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name;
            //         // })
            //         ->rawColumns(['action'])
            //         ->make(true);
            // }
            $search_result= $request['search'];
            if($search_result!= ''){
                $data= User:: where('name', 'LIKE', '%'.$search_result.'%')->paginate(3);


            }
            else{
                $data= User::get();

            }
            //  $data = User::paginate(2);


            return view('backend.user.index', compact('data')); 
            // return response()->json($data);
    
        }
    
        public function create(Request $req){
            $data = Role::pluck('name', 'id')->all();
            return view('backend.user.create', compact('data'));
        }

        public function store(Request $req){
            // $data= new User;
            // $data->name= $req->input('name');
            // $data->email= $req->input('email');
            // $data->password= Hash::make($req->input('password'));
            // $data->attachRole($req->input('category'));   
            // event(new Registered($data));
            // $data->save();


             
            $input = $req->all();
            $input['password'] = Hash::make($input['password']);
        
            $user = User::create($input);
            $user->assignRole($req->input('category'));

            return redirect()->route('backend.user.index');
        }


        public function show(){
            return view('backend.user.show');
        }

        public function edit(){
            return view('backend.user.edit');
        }
    

        public function update(){
            // return view('backend.edit');
        }

        public function destroy($id){
            $data=User::find($id);
            $data->delete();
            return view('backend.user.index');
        }

        public function logout(){
            Auth::logout();

            return redirect('login');
        }

       
    
    
}