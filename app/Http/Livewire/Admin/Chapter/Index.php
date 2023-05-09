<?php

namespace App\Http\Livewire\Admin\Chapter;

use App\Models\Chapter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{
    public int $IDchap;
    public int $IDbook;
    public function deleteChapter($IDbook, $IDchap) 
    {
            $this->IDchap = $IDchap;
            $this->IDbook = $IDbook;
        
    }
        
    public function destroyChapter()
    {

            $deleted = DB::table('tbl_chapter')->where('IDbook', $this->IDbook)->where('IDchap', $this->IDchap);
            $deleted->delete();
            
            // $chapter->delete();
            session()->flash('message','Chapter Deleted');
            $this->dispatchBrowserEvent('close-modal');
    }

    
    public function render()
    {
        $chapters = Chapter::orderBy('IDbook', 'DESC')->paginate(3);
        return view('livewire.admin.chapter.index', ['chapters' => $chapters]);
    }
}
