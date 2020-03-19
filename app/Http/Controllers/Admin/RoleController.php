<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Role;
use App\Permission;
use DB;

use Datatables;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $controller = 'roles';

    private function title(){
        return __('main.user_role');
    }

    public function index(Request $request){

        $controller =$this->controller;
        $page_active ="roles";
        $pages_title =$this->title();
        $roles = Role::orderBy('id','DESC')->paginate(5);

        return view('backend.role_index',compact('roles','pages_title','page_active','controller'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $controller =$this->controller;
        $pages_title =$this->title();
        $permission = Permission::orderBy('urutan','ASC')->get();
        $page_active ="roles";

        $arrGroup = [];
        foreach ($permission as $row){
            $splices = explode('-', $row->name);
            if (count($splices) > 1){
                unset($splices[count($splices)-1]);    
            }
            
            $groupName = implode('-', $splices);
            $arrGroup[$groupName][] = $row;
        }
        
        return view('backend.role_create',compact('permission','pages_title','page_active','controller','arrGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function get_roles_byid(Request $request){

        $id = $request->id;
        $data_role = Role::find($id);
        $data_rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")
            ->where("permission_role.role_id",$id)
            ->get();


        $data_return =array('data_role'=>$data_role,'data_rolePermissions'=>$data_rolePermissions);
        return response()->json($data_return);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $controller=$this->controller;
        $page_active ="roles";
        $pages_title =$this->title();
        $page_active ="roles";
        $role = Role::find($id);
        // $permission = Permission::get();
        $permission = Permission::orderBy('urutan','ASC')->get();
        $arrGroup = [];
        foreach ($permission as $row){
            $splices = explode('-', $row->name);
            if (count($splices) > 1){
                unset($splices[count($splices)-1]);    
            }
            
            $groupName = implode('-', $splices);
            $arrGroup[$groupName][] = $row;
        }
        $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)
            ->pluck('permission_role.permission_id','permission_role.permission_id')->all();

        return view('backend.role_edit',compact('role','permission','rolePermissions','pages_title','page_active','controller', 'arrGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        DB::table("permission_role")->where("permission_role.role_id",$id)
            ->delete();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deleted_roles(Request $request){
        $pk = Role::find($request->id);
        $pk->delete();
        $result=array(
                "data_post"=>array(
                    "status"=>TRUE,
                    "class" => "danger",
                    "message"=>"Success ! Deleted data"
                )
            );
        echo json_encode($result);
    }
}