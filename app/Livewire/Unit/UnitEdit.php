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

    protected $rules = [
        'nomeFantasia' => 'string|max:255',
        'razaoSocial'=> 'string|max:255',
        'cnpj'=> 'unique:units,cnpj'
    ];

    public function submit()
    {
        $this->validate();
        try{
            $unit = Unit::findOrFail($this->unit->id);

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