<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class SettingController extends Controller
{
    private $controller = 'my_profile';
    //
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function my_profile(){

        $data['page_active'] ="profile";
    	$data['pages_title'] =__('main.profile');
		$data['id_users'] = Auth::user()->id_users;
		$data['nik'] = Auth::user()->nik;
		$data['name'] = Auth::user()->name;
		$data['password'] = Auth::user()->password;
		$data['email'] = Auth::user()->email;
		$data['gender'] = Auth::user()->gender;
        $data['id_level_user'] = Auth::user()->id_level_user;
        $data['id_pos'] = Auth::user()->id_pos;
        $data['image'] = Auth::user()->image;
        $data['remember_token'] = Auth::user()->remember_token;
        $data['controller'] =$this->controller;
        $get_roles = DB::table('roles')->select('name')->where('id',Auth::user()->id_level_user)->first();

        $data_user = DB::table('users')
            ->select('users.id_users','users.nik','users.name','users.date_birth','users.address','users.email','users.telephone','users.address')
            ->where('users.id_users',Auth::user()->id_users)
        ->first();

        return view('backend.my_profile',compact('get_roles','data_user'))->with($data);
    }

    public function UpdateInlineName(Request $request){
        $id     = $request->pk;
        $name   = $request->value;
        DB::table('users')->where('id_users',$id)->update(['name' => $name]);

        echo json_encode($id);
    } 

    public function UpdateInlineEmail(Request $request){
        $id= $request->pk;
        $email = $request->value;
            DB::table('users')->where('id_users',$id)
            ->update(['email' => $email]);

        echo json_encode($id);
    } 

    public function UpdateInlineTelephone(Request $request){
        $id= $request->pk;
        $telephone = $request->value;
            DB::table('users')->where('id_users',$id)
            ->update(['telephone' => $telephone]);

        echo json_encode($id);
    } 

    public function UpdateInlineAddress(Request $request){
        $id= $request->pk;
        $address = $request->value;
            DB::table('users')->where('id_users',$id)
            ->update(['address' => $address]);
        echo json_encode($id);
    } 


    public function update_profile(Request $request){


        $this->validate($request, [
            'email' => 'required|email',
        ]);
        $names =$request->names;
        $email =$request->email;
        $image =$request->image;
        $gender=$request->gender;

        $id_users =Auth::user()->id_users;
        $data = User::find($id_users);
        $data->name = $request->names;
        $data->gender = $request->gender;
        $data->email = $request->email;
        if(!empty($request->file('image'))){
            $file       = $request->file('image');
            $fileName   = $file->getClientOriginalName();
            $request->file('image')->move("images/profile/", $fileName);
            $data->image = $fileName;
        }
        $data->updated_by=$id_users;
        $data->save();
        
        return redirect(LaravelLocalization::getCurrentLocale().'/admin/my_profile')->with('message', 'success update data.');

        // return redirect('dashboard//my_profile')->with('message', 'success update data.');
    }

    public function update_password_profile(Request $request){
        $data = User::find($request->id_users);
        $data->password = bcrypt($request->password);
        $data->updated_by=$request->id_users;
        $data->save();
        $result=array(
                    "data_result"=>array(
                        "class" => "success",
                        "message"=>"Success ! Change Password Success."
                    )
                );
        echo json_encode($result);
    }

    public function check_username(Request $request){
        $id = $request->id;

        $check_username = "";
        $result         = "";
        $type_check     = $request->type_check;
        $username       = $request->username;
        $username_old   = $request->username_old;

        if ($type_check == "1") {

            $check_username = DB::table('users')->select('nik')
            ->where('nik',$username)
            ->first();

        }else if ($type_check == "2") {

            $check_username = DB::table('users')->select('nik')
            ->where('nik', '=' ,$username)
            ->where('nik', '!=' ,$username_old)
            ->first();
        }

        // jika_ada
        if ($check_username != "") {
            $result = 1;
        }else{
            $result = 0;
        }

        echo json_encode($result);
    }


}
