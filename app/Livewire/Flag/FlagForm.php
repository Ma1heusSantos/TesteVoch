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
            $flag = Flag::create([
                'nome' => $this->nome,
                'economic_group_id'=> $this->group
            ]);
            $this->sendRegisterToLog($flag);
            session()->flash('message', 'Bandeira criada com sucesso!');
            return redirect()->route('flag.show');
        }catch(Exception $e){
            Log::info($e->getMessage());
        }
        
    }

    public function sendRegisterToLog($flag){
        Log::info("Usuário ". Auth::user()->email .' criou uma Bandeira com os seguintes dados: ' . 
            'nome: ' . $flag->nome . ', ' .
            'economic_group_id: ' . $flag->economic_group_id . ', ' 
        );
    }
    public function render()
    {
        return view('livewire.flag.flag-form');
    }
}