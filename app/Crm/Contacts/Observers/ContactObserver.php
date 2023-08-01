<?php

namespace Crm\Contacts\Observers;

use App\Models\User;
use Crm\Contacts\Models\Contact;
use Crm\Contacts\Notifications\ContactNotification;
use Illuminate\Support\Facades\Notification;

class ContactObserver
{
    /**
     * Handle the Contact "created" event.
     *
     * @param  \Crm\Contacts\Models\Contact  $contact
     * @return void
     */
    public function created(Contact $contact)
    {
        $users = User::where('id', auth()->id())->get();
        Notification::send($users, new ContactNotification($contact->content,
                auth()->id()
            )
        );
    }

    /**
     * Handle the Contact "updated" event.
     *
     * @param  \Crm\Contacts\Models\Contact  $contact
     * @return void
     */
    public function updated(Contact $contact)
    {
        //
    }

    /**
     * Handle the Contact "deleted" event.
     *
     * @param  \Crm\Contacts\Models\Contact  $contact
     * @return void
     */
    public function deleted(Contact $contact)
    {
        //
    }

    /**
     * Handle the Contact "restored" event.
     *
     * @param  \Crm\Contacts\Models\Contact  $contact
     * @return void
     */
    public function restored(Contact $contact)
    {
        //
    }

    /**
     * Handle the Contact "force deleted" event.
     *
     * @param  \Crm\Contacts\Models\Contact  $contact
     * @return void
     */
    public function forceDeleted(Contact $contact)
    {
        //
    }
}
