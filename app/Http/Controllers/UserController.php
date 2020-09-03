<?php
namespace App\Http\Controllers;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class UserController extends Controller {

    public function index(){
        $data = UserInfo::all();
        return view('user.index', compact('data'));
    }

    public function update(Request $request){
        if($request->ajax()){
            UserInfo::find($request->input('pk'))->update([$request->input('name') => $request->input('value')]);
            return response()->json(['success' => true]);
     }

    }



    public function fetch_data(Request $request){

        if($request->ajax())
        {
            $data = UserInfo::OrderBy("created_at", 'desc')->get();
            echo json_encode($data);
        }
    }

    public function userDelete($del_id){
        $User = UserInfo::find($del_id);
        $User -> delete();

        return redirect()->back();
    }

}



    // old edit method, cannot used in editable table
    // public function userEditPage($user_id){
    //     // 撈取使用者資料
    //     $User = UserInfo::findOrFail($user_id);
    //     $binding = [
    //         'User'=>$User,
    //     ];

    //     return view("user.editUser", $binding);
    // }


    // old create method, not used anymore
    // public function userCreateProcess(){
    //     $user_data = [
    //         'lineID' => '',
    //         'name' => '',

    //     ];
    //     $User = UserInfo::create($user_data);

    //     return redirect('/user/' . $User->id . '/edit');

    // }

    // public function userEditProcess($user_id){
    //     $User = UserInfo::findOrFail($user_id);
    //     $input = request() -> all();
    //     $rules = [
    //         'lineID' => [
    //             'required',
    //             'max:80',
    //         ],
    //         'name' => [
    //             'required',
    //             'max:80',
    //         ],
    //     ];
    //     $validator = Validator::make($input, $rules);
    //     if($validator->fails()){
    //         return redirect('/user/' . $User->id . '/edit')->withErrors($validator)->withInput();
    //     }

    //     $User->update($input);

    //
    //     return redirect('/user/manage');

    //

    // }

    // public function userManagePage(){
    //     $row_per_page = 10;
    //     $UserPaginate = UserInfo::OrderBy("created_at", 'desc')->paginate($row_per_page);
    //     $binding=['UserPaginate'=>$UserPaginate,];
    //     return view('user.manageUser', $binding);
    // }



