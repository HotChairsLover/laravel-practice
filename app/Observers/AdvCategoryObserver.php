<?php

namespace App\Observers;

use App\Models\AdvCategory;
use Illuminate\Support\Str;

class AdvCategoryObserver
{
    protected function setSlug(AdvCategory $advCategory)
    {
        if (empty($advCategory->slug)) {
            $advCategory->slug = Str::slug($advCategory->title);
        }
    }

    public function creating(AdvCategory $advCategory)
    {
        $this->setSlug($advCategory);
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
        $this->setSlug($advCategory);
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
