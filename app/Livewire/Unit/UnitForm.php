<?php

namespace App\Livewire\Unit;

use App\Models\Flag;
use App\Models\Unit;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UnitForm extends Component
{
    public $nomeFantasia;
    public $razaoSocial;
    public $cnpj;

    public $flags;
    public $flag;

    protected $rules = [
        'nomeFantasia' => 'required|string|max:255',
        'razaoSocial'=> 'required|string|max:255',
        'cnpj'=> 'required|unique:units,cnpj'
    ];
    
    public function mount()
    {
        $this->flags = Flag::all();
    }

    public function submit()
    {
        $this->validate();
        try{
            $unit = Unit::create([
                'nome_fantasia'=> $this->nomeFantasia,
                'razao_social'=> $this->razaoSocial,
                'cnpj'=> $this->cnpj,
                'flag_id'=> $this->flag
            ]);
    
            $this->sendRegisterToLog($unit);
            session()->flash('message', 'unidade criada com sucesso!');
            return redirect()->route('unit.show');

        } catch (Exception $e) {
            Log::info("error: " . $e->getMessage());
        }
      
    }

    public function sendRegisterToLog($unit){
        Log::info("Usuário ". Auth::user()->email .' criou uma unidade com os seguintes dados: ' . 
            'nome_fantasia: ' . $unit->nome_fantasia . ', ' .
            'razao_social: ' . $unit->razao_social . ', ' .
            'cnpj: ' . $unit->cnpj . ', ' .
            'flag ID: ' . $unit->flag_id
        );
    }
    public function render()
    {
        return view('livewire.unit.unit-form');
    }
}