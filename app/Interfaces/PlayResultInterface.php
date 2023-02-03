<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Services\DTO\PlayResultDTO;
use Illuminate\Support\Collection;

interface PlayResultInterface
{
    /**
     * @param int $userId
     * @param int $min
     * @param int $max
     * @return void
     */
    public function play(int $userId): PlayResultDTO;

    /**
     * @param int $userId
     * @return array
     */
    public function getHistory(int $userId): Collection;
}
