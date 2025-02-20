<?php

namespace App\Observers;

use App\Models\Flag;


class FlagObserver
{
    /**
     * Handle the Flag "created" event.
     */
    public function created(Flag $flag): void
    {
        //
    }

    /**
     * Handle the Flag "updated" event.
     */
    public function updated(Flag $flag): void
    {
        //
    }

    /**
     * Handle the Flag "deleted" event.
     */
    public function deleted(Flag $flag): void
    {
        $flag->load('units');
        dd($flag);
        $flag->unit()->delete(); 
    }

    /**
     * Handle the Flag "restored" event.
     */
    public function restored(Flag $flag): void
    {
        //
    }

    /**
     * Handle the Flag "force deleted" event.
     */
    public function forceDeleted(Flag $flag): void
    {
        //
    }
}