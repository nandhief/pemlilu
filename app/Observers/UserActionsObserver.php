<?php

namespace App\Observers;

use Auth;
use App\UserAction;

class UserActionsObserver
{
    public function saved($model)
    {
        if ($model->wasRecentlyCreated == true) {
            // Data was just created
            $action = 'created';
        } else {
            // Data was updated
            $action = 'updated';
        }
        if (Auth::check()) {
            UserAction::create([
                'user_name'     => Auth::user()->name,
                'action'        => $action,
                'action_model'  => $model->getTable(),
                'action_id'     => $model->id
            ]);
        }
    }


    public function deleting($model)
    {
        if (Auth::check()) {
            UserAction::create([
                'user_name'     => Auth::user()->id,
                'action'        => 'deleted',
                'action_model'  => $model->getTable(),
                'action_id'     => $model->id
            ]);
        }
    }
}