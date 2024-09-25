<?php

namespace Modules\User\Actions;

use Exception;
use Modules\User\Models\User;

class ChangeStatusAction {
    /**
     * @throws Exception
     */
    public function execute(User $user, int $transition): void
    {
        try {
            if ($user->canApply($transition)){
                $user->apply($transition);
                $user->save();
            }
            else {
                 throw new Exception(__("Unable to apply transition."));
            }
        }
        catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }

    }
}
