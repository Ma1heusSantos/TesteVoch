<?php

namespace App\Observers;

use App\Models\EconomicGroup;


class EconomicGroupObserver
{
    /**
     * Handle the EconomicGroup "created" event.
     */
    public function created(EconomicGroup $economicGroup): void
    {
        //
    }

    /**
     * Handle the EconomicGroup "updated" event.
     */
    public function updated(EconomicGroup $economicGroup): void
    {
        //
    }

    /**
     * Handle the EconomicGroup "deleted" event.
     */
    public function deleted(EconomicGroup $economicGroup): void
    {
        $economicGroup->load('flags');
        $economicGroup->flags()->delete(); 
    }
    

    /**
     * Handle the EconomicGroup "restored" event.
     */
    public function restored(EconomicGroup $economicGroup): void
    {
        //
    }

    /**
     * Handle the EconomicGroup "force deleted" event.
     */
    public function forceDeleted(EconomicGroup $economicGroup): void
    {
        //
    }
}