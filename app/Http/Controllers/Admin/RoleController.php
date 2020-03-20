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

    public function store(Request $request){
        $this->validate($request, [
            'name'          => 'required|unique:roles,name',
            'display_name'  => 'required',
            'status'        => 'required',
            'description'   => 'required',
            'permission'    => 'required',
        ]);

        $role = new Role();
        $role->name         = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->status       = $request->input('status');
        $role->description  = $request->input('description');
        $role->save();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }

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

    public function update(Request $request, $id){
        $this->validate($request, [
            'display_name'  => 'required',
            'description'   => 'required',
            'status'        => 'required',
            'permission'    => 'required',
        ]);

        $role               = Role::find($id);
        $role->display_name = $request->input('display_name');
        $role->description  = $request->input('description');
        $role->save();

        DB::table("permission_role")->where("permission_role.role_id",$id)
            ->delete();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }

    public function change_status_active($id){
        $pk = Role::find($id);
        $pk->status = "Y";
        $pk->save();
        $result=array(
                "data_post"=>array(
                "status"=>TRUE,
                "class" => "info",
                "message"=> __('main.data_already_active')
            )

        );
        echo json_encode($result);
    }

    public function change_status_inactive($id){
        $pk = Role::find($id);
        $pk->status = "N";
        $pk->save();
        $result=array(
                "data_post"=>array(
                "status"=>TRUE,
                "class" => "warning",
                "message"=> __('main.data_inactive')
            )
        );
        echo json_encode($result);
    }

    public function delete(Request $request){
        $pk = Role::find($request->id);
        $pk->delete();
        $result=array(
                "data_post"=>array(
                    "status"=>TRUE,
                    "class" => "danger",
                    "message"=> __('main.data_succesfully_deleted')
                )
            );
        echo json_encode($result);
    }

    public function delete_all($id){
        DB::table("roles")->whereIn('id',explode(",",$id))->delete();
        $result=array(
                "data_post"=>array(
                    "status"=>TRUE,
                    "class" => "danger",
                    "message"=> __('main.data_succesfully_deleted')
                )
            );
        echo json_encode($result);
    }

    public function get_roles_byid(Request $request){

        $id = $request->id;
        $data_role = Role::find($id);
        $data_rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")
            ->where("permission_role.role_id",$id)
            ->get();

        $data_return =array('data_role'=>$data_role,'data_rolePermissions'=>$data_rolePermissions);
        return response()->json($data_return);
    }

}