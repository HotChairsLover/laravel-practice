<?php

namespace App\Observers;

use App\Models\AdvPost;

class AdvPostObserver extends BaseObserver
{

    public function creating(AdvPost $advPost)
    {

    }

    /**
     * Handle the AdvPost "created" event.
     */
    public function created(AdvPost $advPost): void
    {
        //
    }

    public function updating(AdvPost $advPost)
    {

    }

    /**
     * Handle the AdvPost "updated" event.
     */
    public function updated(AdvPost $advPost): void
    {
        //
    }

    /**
     * Handle the AdvPost "deleted" event.
     */
    public function deleted(AdvPost $advPost): void
    {
        //
    }

    /**
     * Handle the AdvPost "restored" event.
     */
    public function restored(AdvPost $advPost): void
    {
        //
    }

    /**
     * Handle the AdvPost "force deleted" event.
     */
    public function forceDeleted(AdvPost $advPost): void
    {
        //
    }
}
