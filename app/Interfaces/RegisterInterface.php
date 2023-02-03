<?php

declare(strict_types=1);

namespace App\Interfaces;

interface RegisterInterface
{
    /**
     * @param string $name
     * @param string $phoneNumber
     * @return string
     */
    public function create(string $name, string $phoneNumber): string;
}
