<?php

namespace App\Livewire\EconomicGroup;

use App\Models\EconomicGroup;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EconomicGroupForm extends Component
{
    public $nome;

    protected $rules = [
        'nome' => 'required|string|max:255',
    ];

    public function submit()
    {
        $this->validate();
        try{

            EconomicGroup::create([
                'nome' => $this->nome,
            ]);
    
            session()->flash('message', 'Grupo Econômico criado com sucesso!');
            return redirect()->route('economicGroup.show');
        }catch(Exception $e){
            Log::info($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.economic-group.economic-group-form');
    }
}