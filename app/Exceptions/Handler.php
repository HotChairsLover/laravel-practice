<?php

namespace App\Exceptions;

use App\Exceptions\Adv\FailedStoreCategoryException;
use App\Exceptions\Adv\FailedStorePostException;
use App\Exceptions\Adv\FailedUpdateCategoryException;
use App\Exceptions\Adv\FailedUpdatePostException;
use App\Exceptions\Adv\UnknownCategoryException;
use App\Exceptions\Adv\UnknownPostException;
use App\Exceptions\Profile\FailedForceDeleteProfileException;
use App\Exceptions\Profile\FailedUpdateProfileException;
use App\Http\Resources\FailedJsonResource;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof FailedStorePostException) {
            return response()->json(FailedJsonResource::make($e->context()), 422);
        } elseif ($e instanceof FailedUpdatePostException) {
            return response()->json(FailedJsonResource::make($e->context()), 422);
        } elseif ($e instanceof UnknownPostException) {
            return response()->json(FailedJsonResource::make($e->context()), 404);
        } elseif ($e instanceof FailedStoreCategoryException) {
            return response()->json(FailedJsonResource::make($e->context()), 422);
        } elseif ($e instanceof FailedUpdateCategoryException) {
            return response()->json(FailedJsonResource::make($e->context()), 422);
        } elseif ($e instanceof UnknownCategoryException) {
            return response()->json(FailedJsonResource::make($e->context()), 404);
        } elseif ($e instanceof FailedUpdateProfileException) {
            return response()->json(FailedJsonResource::make($e->context()), 404);
        } elseif ($e instanceof FailedForceDeleteProfileException) {
            return response()->json(FailedJsonResource::make($e->context()), 404);
        }
        return parent::render($request, $e);
    }
}
