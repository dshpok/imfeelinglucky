<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

class RegisterRepository
{
    /**
     * @param string $name
     * @param string $phoneNumber
     * @return int
     */
    public function create(string $name, string $phoneNumber): int
    {
        $user = new User();
        $user->name = $name;
        $user->phone_number = $phoneNumber;
        $user->save();
        return $user->id;
    }
}
