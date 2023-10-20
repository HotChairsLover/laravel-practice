<?php

namespace App\Observers;

use App\Models\AdvPost;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AdvPostObserver
{
    protected function setPublishedAt(AdvPost $advPost)
    {
        if (empty($advPost->published_at) && $advPost->is_published) {
            $advPost->published_at = Carbon::now();
        }

    }

    protected function setSlug(AdvPost $advPost)
    {
        if (empty($advPost->slug)) {
            $advPost->slug = Str::slug($advPost->title);
        }
    }

    protected function setUser(AdvPost $advPost)
    {
        $advPost->user_id = auth()->id() ?? AdvPost::UNKNOWN_USER;
    }


    public function creating(AdvPost $advPost)
    {
        $this->setPublishedAt($advPost);
        $this->setSlug($advPost);
        $this->setUser($advPost);
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
        $this->setPublishedAt($advPost);
        $this->setSlug($advPost);
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
