<?php

namespace App\Livewire\Collaborator;

use App\Models\Collaborator;
use App\Models\Unit;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CollaboratorForm extends Component
{
    public $units;
    public $nome;
    public $email;
    public $cpf;
    public $unit;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'email' => 'required|email|string|max:255|unique:collaborators,email',
        'cpf' => 'required|unique:collaborators,cpf'
    ];
    


    public function mount()
    {
        $this->units = Unit::all();
    }

    public function submit()
    {
        $this->validate();
        try{
            Collaborator::create([
                'nome'=> $this->nome,
                'email'=> $this->email,
                'cpf'=> $this->cpf,
                'unit_id'=> $this->unit
            ]);
    

            session()->flash('message', 'colaborador criado com sucesso!');
            return redirect()->route('collaborator.show');

        } catch (Exception $e) {
            Log::info("error: " . $e->getMessage());
        }
      
    }


    public function render()
    {
        return view('livewire.collaborator.collaborator-form');
    }
}