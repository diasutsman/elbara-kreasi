<?php

namespace App\Listeners;

use App\Events\DeletedItem;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteImage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\DeletedItem  $event
     * @return void
     */
    public function handle(DeletedItem $event)
    {
        $model = $event->model;
        Log::debug('DeleteEvent: ' . $model->image);

        if ($model->image) {
            Storage::delete($model->image);
        }
    }
}
