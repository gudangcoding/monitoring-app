<?php

// namespace App\Livewire;

// use Livewire\Component;

// class SiswaTable extends Component
// {
//     public function render()
//     {
//         return view('livewire.siswa-table');
//     }
// }

namespace App\Http\Livewire;

use App\Models\Siswa;
use Livewire\Component;

class SiswaTable extends Component
{
    public $siswaList = []; // Array untuk menyimpan siswa yang diambil berdasarkan kelas_id
    public $absensiData = []; // Data absensi yang akan disimpan

    public function mount($siswaList = [])
    {
        $this->siswaList = $siswaList;
    }

    public function render()
    {
        return view('livewire.siswa-table', [
            'siswaList' => $this->siswaList,
        ]);
    }
}
