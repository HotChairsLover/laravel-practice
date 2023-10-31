<?php

namespace App\Http\Factories\Adv;

use App\Models\AdvPost;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AdvPostFactory
{

    public static function create($data)
    {
        $advPost = new AdvPost($data);

        AdvPostFactory::setData($advPost);

        return $advPost;

    }

    public static function update($post, $data)
    {
        $advPost = $post;
        $advPost->fill($data);

        AdvPostFactory::setData($advPost);

        return $advPost;
    }

    private static function setData(AdvPost $advPost)
    {
        AdvPostFactory::setPublishedAt($advPost);
        AdvPostFactory::setUser($advPost);
        AdvPostFactory::setSlug($advPost);
    }

    private static function setSlug(AdvPost $advPost)
    {
        if (empty($advPost->slug)) {
            $advPost->slug = Str::slug($advPost->title);
        }
    }

    private static function setPublishedAt(AdvPost $advPost)
    {
        if (empty($advPost->published_at) && $advPost->is_published) {
            $advPost->published_at = Carbon::now();
        }

    }

    private static function setUser(AdvPost $advPost)
    {
        $advPost->user_id = auth()->id() ?? AdvPost::UNKNOWN_USER;
    }
}
