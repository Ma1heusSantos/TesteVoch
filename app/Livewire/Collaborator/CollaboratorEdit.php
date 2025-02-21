<?php

namespace App\Livewire\Collaborator;

use App\Models\Collaborator;
use App\Models\Unit;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CollaboratorEdit extends Component
{
    public $nome;
    public $collaborator;
    public $email;
    public $cpf;
    public $units;
    public $unit;

    protected $rules = [
        'nome' => 'string|max:255',
        'email' => 'email|string|max:255|unique:collaborators,email',
        'cpf' => 'unique:collaborators,cpf'
    ];

    public function submit()
    {
        $this->validate();
        try{

            $collaborator = Collaborator::find($this->collaborator->id);
            $campos = [
             'nome' => !empty($this->nome) ?  $this->nome : $collaborator->nome,
             'email' => !empty($this->email) ? $this->email : $collaborator->email,
             'cpf'=> !empty($this->cpf) ? $this->cpf : $collaborator->cpf,
             'unit_id'=>!empty($this->unit) ? $this->unit : $collaborator->unit_id,
         ];
            $collaborator->update($campos);
     
             session()->flash('message', 'Collaborador alterado com sucesso!');
             return redirect()->route('unit.show');
        }catch(Exception $e){
            Log::info($e->getMessage());
        }
    }

 
    public function mount(){
        $this->units = Unit::all();
    }
    public function render()
    {
        return view('livewire.collaborator.collaborator-edit');
    }
}