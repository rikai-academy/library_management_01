<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->uploadImageService = new UploadImageService; 
    }
    
    public function index()
    {
        $data_user = User::orderBy('created_at','DESC')->LoadByNameUser()->get();
        return view('Admin.UserPage.user',compact('data_user'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('Admin.UserPage.add_user',compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $user_validation = $request->all();
        $user_validation['password'] = Hash::make($request->password);
        // Image User
        $user_validation['image_user'] = $this->uploadImageService->upload_image($request->image_user);
        $user_save = User::create($user_validation);

        if($user_save){
            return redirect()->route('user.create')->with('success',__('message.author_success'));
        }else{
            return back()->with('fail',__('message.fail'));
        }
    }

    public function edit(User $user)
    {
        $roles = Role::get();
        return view('Admin.UserPage.edit_user',compact('user','roles'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user_validation = $request->except(['_method', '_token','password_confirmation']);
        // check user password
        if ($request->has('password')) {
            $user_validation['password'] = Hash::make($request->password);
        }else{
            $user_validation['password'] =   $user->password;
        }
  
         // check image User
        if ($request->has('image_user')) {
            $user_validation['image_user'] = $this->uploadImageService->upload_image($request->image_user);
        }else{
            $user_validation['image_user'] =  $user->image_user;
        }
        $user_save_update = User::where('id', $user->id)->update($user_validation);
        if($user_save_update){
            return redirect()->route('user.edit', [$user->id])->with('update_success',__('message.update_success') );
        }else{
            return back()->with('fail',__('message.fail'));
        }
    }

    public function destroy(User $user)
    {
        if($user->BorrowedBook->count() > 0){
            return back()->with('fail',__('message.fail'));
        }else{
            $user->delete();
            return redirect()->route('user.index')->with('delete_success',__('message.delete_success') );
        }
    }

    public function export()
    {
      return Excel::download(new UsersExport, 'user_data.xlsx');
    }
}
