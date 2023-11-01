<?php

namespace App\Http\Factories\Adv;

use App\Exceptions\Adv\FailedUpdateCategoryException;
use App\Models\AdvPost;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AdvPostFactory
{

    public static function create($data, int $userId = null)
    {
        $advPost = new AdvPost($data);

        AdvPostFactory::setData($advPost, $userId);

        return $advPost;

    }

    public static function update($post, $data, $userId)
    {
        throw_if($post->user_id != $userId, FailedUpdateCategoryException::class);
        $advPost = $post;
        $advPost->fill($data);

        AdvPostFactory::setData($advPost, $userId);

        return $advPost;
    }

    private static function setData(AdvPost $advPost, $userId)
    {
        AdvPostFactory::setPublishedAt($advPost);
        AdvPostFactory::setUser($advPost, $userId);
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

    private static function setUser(AdvPost $advPost, $userId)
    {
        $advPost->user_id = auth()->id() ?? $userId ?? AdvPost::UNKNOWN_USER;
    }
}
