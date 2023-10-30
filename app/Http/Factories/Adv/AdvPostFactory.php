<?php

namespace App\Http\Factories\Adv;

use App\Models\AdvPost;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AdvPostFactory
{

    public function create($data)
    {
        $advPost = new AdvPost($data);

        $this->setData($advPost);

        return $advPost;

    }

    public function update($post, $data)
    {
        $advPost = $post;
        $advPost->fill($data);

        $this->setData($advPost);

        return $advPost;
    }

    private function setData(AdvPost $advPost)
    {
        $this->setPublishedAt($advPost);
        $this->setUser($advPost);
        $this->setSlug($advPost);
    }

    private function setSlug(AdvPost $advPost)
    {
        if (empty($advPost->slug)) {
            $advPost->slug = Str::slug($advPost->title);
        }
    }

    private function setPublishedAt(AdvPost $advPost)
    {
        if (empty($advPost->published_at) && $advPost->is_published) {
            $advPost->published_at = Carbon::now();
        }

    }

    private function setUser(AdvPost $advPost)
    {
        $advPost->user_id = auth()->id() ?? AdvPost::UNKNOWN_USER;
    }
}
