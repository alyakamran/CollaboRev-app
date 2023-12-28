<?php

namespace App\Observers;

use App\Models\Reviewer;
use App\Models\Document;

class ReviewerObserver
{
    /**
     * Handle the Reviewer "created" event.
     */
    public function created(Reviewer $reviewer): void
    {
        //
    }

    /**
     * Handle the Reviewer "updated" event.
     */
    public function updated(Reviewer $reviewer): void
    {
        //
        $document = Document::find($reviewer->document_id);

        if ($document && $document->reviewer1_status === 'Reviewed' &&
            $document->reviewer2_status === 'Reviewed' &&
            $document->reviewer3_status === 'Reviewed') {
            // Update the status column in the documents table
            $document->status = 'Reviewed';
            $document->save();
        }
    }

    /**
     * Handle the Reviewer "deleted" event.
     */
    public function deleted(Reviewer $reviewer): void
    {
        //
    }

    /**
     * Handle the Reviewer "restored" event.
     */
    public function restored(Reviewer $reviewer): void
    {
        //
    }

    /**
     * Handle the Reviewer "force deleted" event.
     */
    public function forceDeleted(Reviewer $reviewer): void
    {
        //
    }
}
