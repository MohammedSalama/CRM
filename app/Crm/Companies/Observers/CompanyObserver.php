<?php

namespace Crm\Companies\Observers;

use App\Models\User;
use Crm\Companies\Models\Company;
use Crm\Companies\Notifications\CompanyNotification;
use Illuminate\Support\Facades\Notification;

class CompanyObserver
{
    /**
     * Handle the Company "created" event.
     *
     * @param  \Crm\Companies\Models\Company  $company
     * @return void
     */
    public function created(Company $company)
    {
        $users = User::where('id', auth()->id())->get();
        Notification::send($users, new CompanyNotification($company->email,
                auth()->id()
            )
        );
    }

    /**
     * Handle the Company "updated" event.
     *
     * @param  \Crm\Companies\Models\Company   $company
     * @return void
     */
    public function updated(Company $company)
    {
        //
    }

    /**
     * Handle the Company "deleted" event.
     *
     * @param  \Crm\Companies\Models\Company   $company
     * @return void
     */
    public function deleted(Company $company)
    {
        //
    }

    /**
     * Handle the Company "restored" event.
     *
     * @param  \Crm\Companies\Models\Company   $company
     * @return void
     */
    public function restored(Company $company)
    {
        //
    }

    /**
     * Handle the Company "force deleted" event.
     *
     * @param  \Crm\Companies\Models\Company   $company
     * @return void
     */
    public function forceDeleted(Company $company)
    {
        //
    }
}
