<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{


    public function bookSubject()
    {
        return $this->hasMany(BookSubjects::class);
    }

    public function getAll()
    {
        return Subject::get();
    }

    public function getAllWithNameId()
    {
        return Subject::select('name as subject_name','id as subject_id')->get();
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
