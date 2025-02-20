<?php

namespace App\Livewire\Flag;

use App\Models\EconomicGroup;
use App\Models\Flag;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class FlagEdit extends Component
{
    public $group;
    public $nome;
    public $flag;
    public $economicGroup;
    
    protected $rules = [
        'nome' => 'string|max:255',
    ];
    public function submit()
    {
        $this->validate();
        try{
            $flag = Flag::find($this->flag->id);
            
            $campos = [
             'nome' => !empty($this->nome) ?  $this->nome : $flag->nome ,
             'economic_group_id' => !empty($this->group) ? $this->group : $flag->economic_group_id 
         ];
            $flag->update($campos);
            $this->sendRegisterToLog($flag);
     
             session()->flash('message', 'Grupo Econômico alterado com sucesso!');
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
        $this->economicGroup = EconomicGroup::all();
        return view('livewire.flag.flag-edit');
    }
}