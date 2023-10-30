<?php

namespace App\Observers;

use App\Models\AdvCategory;
use Illuminate\Support\Str;

class AdvCategoryObserver extends BaseObserver
{

    public function creating(AdvCategory $advCategory)
    {

    }

    /**
     * Handle the AdvCategory "created" event.
     */
    public function created(AdvCategory $advCategory): void
    {
        //
    }

    public function updating(AdvCategory $advCategory)
    {

    }

    /**
     * Handle the AdvCategory "updated" event.
     */
    public function updated(AdvCategory $advCategory): void
    {
        //
    }

    /**
     * Handle the AdvCategory "deleted" event.
     */
    public function deleted(AdvCategory $advCategory): void
    {
        //
    }

    /**
     * Handle the AdvCategory "restored" event.
     */
    public function restored(AdvCategory $advCategory): void
    {
        //
    }

    /**
     * Handle the AdvCategory "force deleted" event.
     */
    public function forceDeleted(AdvCategory $advCategory): void
    {
        //
    }
}
