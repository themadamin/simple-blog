<?php

namespace Modules\Actions;

class FileUploadAction
{
    public function execute($thumbnail)
    {
        $filename = uniqid().'.'.$thumbnail->getClientOriginalName();

        return $thumbnail->storeAs('project', $filename, 'public');
    }
}
