<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User; // Certifique-se de importar a Model correta

class Teste extends Component
{
    public $json = 1;

    public function render()
    {
        // Buscar todos os usuários
        $users = User::all();

        // Passar os usuários para a view
        return view('livewire.teste', ['users' => $users]);
    }
}
