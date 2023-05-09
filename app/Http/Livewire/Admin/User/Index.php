<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $showModal = false;


    public function deleteUser($IDuser) 
    {
        // dd($this->id);
        $this->IDuser = $IDuser;
        
    }
        

    public function destroyUser()
    {



        // $user = new User;
            // User::where('id', $this->id)->delete();

            $user = User::find($this->IDuser);
            // /* $path = 'uploads/category/'.$author->image;
            // if(File::exists($path)) {
            //     File::delete($path);
            // } */
            $user->delete();
            session()->flash('message','User Deleted');
            // sleep(5);
            $this->dispatchBrowserEvent('close-modal');

    }


    
    public function render()
    {
        $users = User::orderBy('id', 'DESC')->paginate(3);
        return view('livewire.admin.user.index', ['users' => $users]);
    }
}

