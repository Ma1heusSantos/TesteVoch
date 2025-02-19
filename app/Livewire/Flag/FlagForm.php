<?php

namespace App\Livewire\Flag;

use App\Models\EconomicGroup;
use App\Models\Flag;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FlagForm extends Component
{
    public $nome;
    public $economicGroup;
    public $group;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'group'=> 'required'
    ];

    public function mount()
    {
        $this->economicGroup = EconomicGroup::all();
    }

    public function submit()
    {
        $this->validate();
        
        try{
            Flag::create([
                'nome' => $this->nome,
                'economic_group_id'=> $this->group
            ]);
    
            Log::info("Usuário ". Auth::user()->name .'  criou a bandeira '.$this->nome);
            session()->flash('message', 'Bandeira criada com sucesso!');
            return redirect()->route('flag.show');
        }catch(Exception $e){
            Log::info($e->getMessage());
        }
        
    }
    public function render()
    {
        return view('livewire.flag.flag-form');
    }
}