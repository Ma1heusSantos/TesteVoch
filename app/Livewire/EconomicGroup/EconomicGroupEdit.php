<?php

namespace App\Livewire\EconomicGroup;

use App\Models\EconomicGroup;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EconomicGroupEdit extends Component
{
    public $economicGroup;
    public $nome;

    protected $rules = [
        'nome' => 'nullable|string|max:255',
    ];
    


    public function mount($economicGroup)
    {
        $this->economicGroup = $economicGroup;
        $this->nome = $economicGroup->nome;
    }

    public function submit()
    {
        $this->validate();
       try{
            $economicGroup = EconomicGroup::find($this->economicGroup->id);
            
            $economicGroup->update([
                'nome' => $this->nome,  
            ]);
            
            session()->flash('message', 'Grupo Econômico alterado com sucesso!');
            return redirect()->route('economicGroup.show');
       }catch(Exception $e){
        Log::info($e->getMessage());
       }
    }
    public function render()
    {
        return view('livewire.economic-group.economic-group-edit');
    }
}