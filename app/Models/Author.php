<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Author extends Model
{
    public function getAll()
    {
        return Author::get();
    }

    public function storeData($data)
    {
        $user = new Author();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->address = $data['address'];
        $user->details = $data['details'];

        $user->save();
        return $user;
    }

    public function updateData($id, $data)
    {
        $statusCode = 100;

        $user = Author::find($id);

        if (!empty($user)) {
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->address = $data['address'];
            $user->details = $data['details'];

            $user->save();

        } else {
            $statusCode = 2;
        }

        return $statusCode;
    }

    public function deleteData($id)
    {
        $statusCode = 100;

        $user = Author::find($id);

        if (!empty($user) ) {
            $user->delete();
        } else {
            $statusCode = 2;
        }

        return $statusCode;
    }
}
