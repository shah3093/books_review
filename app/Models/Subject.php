<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function getAll()
    {
        return Subject::get();
    }

    public function storeData($data)
    {
        $user = new Subject();

        $user->name = $data['name'];

        $user->save();
        return $user;
    }

    public function updateData($id, $data)
    {
        $statusCode = 100;

        $user = Subject::find($id);

        if (!empty($user)) {
            $user->name = $data['name'];

            $user->save();

        } else {
            $statusCode = 2;
        }

        return $statusCode;
    }

    public function deleteData($id)
    {
        $statusCode = 100;

        $user = Subject::find($id);

        if (!empty($user)) {
            $user->delete();
        } else {
            $statusCode = 2;
        }

        return $statusCode;
    }
}
