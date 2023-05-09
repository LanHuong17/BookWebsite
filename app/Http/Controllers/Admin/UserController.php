<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Builder\Use_;

class UserController extends Controller
{
    protected $paginationTheme = 'bootstrap';
    public function index()
    {
        $users = User::paginate(3);
        return view('admin.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin/user/edit', compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        
        /* $user = User::findOrFail($user_id);
        $validatedData = $request->validated();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role_as = $validatedData['role_as'];
        $user->password = Hash::make($request->password) ;
        $user->update();

        return redirect('admin/user/')->with('message', 'Update successfully!'); */

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string','email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'role_as' => ['required', 'integer'],
        ]);
        
        User::where('id',$user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as,
        ]);

        return redirect('admin/user')->with('message','Updated successfully');
    }

    public function updateUser(Request $request,int $user_id)
    {
        $user = User::findOrFail($user_id);
        $input = $request->all();
        $user->update($input);

        return redirect('admin/user/')->with('message', 'Update successfully!');
    }

    public function destroy(int $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        return redirect('admin/user')->with('message','Delete successfully');
    }
}
