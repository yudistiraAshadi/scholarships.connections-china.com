<?php

namespace App\Observers;

use App\University;

class UniversityObserver
{
    /**
     * Listen to the University created event.
     *
     * @param  \App\University  $university
     * @return void
     */
    public function created(University $university)
    {
        
    }

    /**
     * Listen to the University deleting event.
     *
     * @param  \App\University  $university
     * @return void
     */
    public function deleting(University $university)
    {
        
    }
}