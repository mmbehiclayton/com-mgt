<?php

namespace App\Observers;

use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;

class ComplaintObserver
{
    public function creating(Complaint $complaint)
    {
        if (Auth::check()) {
            $complaint->user_id = Auth::id();
        }
    }
    /**
     * Handle the Complaint "created" event.
     */
    public function created(Complaint $complaint): void
    {
        //
    }


    /**
     * Handle the Complaint "updated" event.
     */
    public function updated(Complaint $complaint): void
    {
        //
    }

    /**
     * Handle the Complaint "deleted" event.
     */
    public function deleted(Complaint $complaint): void
    {
        //
    }

    /**
     * Handle the Complaint "restored" event.
     */
    public function restored(Complaint $complaint): void
    {
        //
    }

    /**
     * Handle the Complaint "force deleted" event.
     */
    public function forceDeleted(Complaint $complaint): void
    {
        //
    }
}
