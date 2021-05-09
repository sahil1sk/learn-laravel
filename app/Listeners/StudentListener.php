<?php

namespace App\Listeners;

use App\Events\StudentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Log; // to show logs

class StudentListener
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
     * @param  StudentEvent  $event
     * @return void
     */
    public function handle(StudentEvent $event)
    {
        // because this listener file attach with student event file so that student event file data will available here
        Log::info("Event Creating method is firing" . $event->student);
    }
}
