<?php

namespace App\Http\Controllers;

use App\Models\EconomicGroup;
use App\Models\Flag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FlagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $economicGroup = EconomicGroup::all();
        return view('flag.create',['economicGroup'=>$economicGroup]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $flag= Flag::with('economicGroup')->get();
        return view('flag.show',['flag'=>$flag]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $flag = Flag::with('economicGroup')->where('id', '=', $id)->first();
        return view('flag.edit',['flag'=>$flag]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            DB::beginTransaction();
            $flag = Flag::find($id);
            if (!$flag){
                return redirect()->back()->withErrors('Bandeira não encontrada.')->withInput();
            }
            
            $flag->delete();
            $this->sendRegisterToLog($flag);
            
            DB::commit();
            return redirect()->route('flag.show');
        }catch(Exception $e){
            DB::rollBack();
            Log::info($e->getMessage());
        }
    }

    public function sendRegisterToLog($flag){
        Log::info("Usuário ". Auth::user()->email .' criou uma Bandeira com os seguintes dados: ' . 
            'nome: ' . $flag->nome . ', ' .
            'economic_group_id: ' . $flag->economic_group_id . ', ' 
        );
    }
}