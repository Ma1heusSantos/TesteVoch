<?php

namespace App\Livewire\Unit;

use App\Models\Flag;
use App\Models\Unit;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class UnitEdit extends Component
{
    
    public $nomeFantasia;
    public $razaoSocial;
    public $cnpj;
    public $flags;
    public $flag;
    public $unit;

    public function submit()
    {
        try{
            $unit = Unit::findOrFail($this->unit->id);
            Log::info("Usuário ". Auth::user()->name .' atualizou a unidade '.$unit->nomeFantasia." para ".$this->nomeFantasia);
            $campos = [
             'nome_fantasia' => !empty($this->nomeFantasia) ?  $this->nomeFantasia : $unit->nome_fantasia,
             'razao_social' => !empty($this->razaoSocial) ? $this->razaoSocial : $unit->razao_social,
             'cnpj'=> !empty($this->cnpj) ? $this->cnpj : $unit->cnpj,
             'flag_id'=>!empty($this->flag) ? $this->flag : $unit->flag_id,
         ];
            $unit->update($campos);
     
             session()->flash('message', 'unidade alterada com sucesso!');
             return redirect()->route('unit.show');
        }catch(Exception $e){
            Log::info($e->getMessage());
        }
    }
    public function mount(){
        $this->flags = Flag::all();
    }
    public function render()
    {
        return view('livewire.unit.unit-edit');
    }
}