<?php

namespace App\Observers;

use App\Models\Document;

class DocumentObserver
{
    /**
     * Handle the Document "created" event.
     */
    public function created(Document $document): void
    {
        //
    }

    /**
     * Handle the Document "updated" event.
     */
    public function updated(Document $document): void
    {
        //
        $reviewers = $document->reviewers;

        if ($reviewers->every(fn ($reviewer) => $reviewer->review_status === 'Reviewed')) {
            // Update the status column in the documents table
            $document->update(['status' => 'Reviewed']);
        }
        
    }

    /**
     * Handle the Document "deleted" event.
     */
    public function deleted(Document $document): void
    {
        //
    }

    /**
     * Handle the Document "restored" event.
     */
    public function restored(Document $document): void
    {
        //
    }

    /**
     * Handle the Document "force deleted" event.
     */
    public function forceDeleted(Document $document): void
    {
        //
    }

    public function updating(Document $document)
    {
        // Check if all reviewers for a document have "Reviewed" status
        $reviewers = $document->reviewers;

        if ($reviewers->every(fn ($reviewer) => $reviewer->review_status === 'Reviewed')) {
            // Update the status column in the documents table
            $document->update(['status' => 'Reviewed']);
        }
    }
}
