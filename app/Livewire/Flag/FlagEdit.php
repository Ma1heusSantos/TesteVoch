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

    public function submit()
    {
        try{
            $flag = Flag::find($this->flag->id);
            Log::info("Usuário ". Auth::user()->name .' atualizou da bandeira '.$flag->nome." para ".$this->nome);
            $campos = [
             'nome' => !empty($this->nome) ?  $this->nome : $flag->nome ,
             'economic_group_id' => !empty($this->group) ? $this->group : $flag->economic_group_id 
         ];
            $flag->update($campos);
     
             session()->flash('message', 'Grupo Econômico alterado com sucesso!');
             return redirect()->route('flag.show');
        }catch(Exception $e){
            Log::info($e->getMessage());
        }
    }
    public function render()
    {
        $this->economicGroup = EconomicGroup::all();
        return view('livewire.flag.flag-edit');
    }
}