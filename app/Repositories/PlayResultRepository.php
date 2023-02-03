<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\PlayResult;
use App\Services\DTO\PlayResultDTO;
use Illuminate\Support\Collection;

class PlayResultRepository
{

    private const COUNT_LAST_RESULTS = 3;

    /**
     * @param int $userId
     * @return Collection
     */
    public function getHistory(int $userId): Collection
    {
        return PlayResult::where('user_id', $userId)
            ->orderBy('id', 'desc')
            ->limit(self::COUNT_LAST_RESULTS)
            ->get()
            ;
    }

    /**
     * @param PlayResultDTO $dto
     * @return void
     */
    public function setResult(PlayResultDTO $dto): void
    {
        $result = new PlayResult();
        $result->user_id = $dto->getUserId();
        $result->random_number = $dto->getRandomNumber();
        $result->win_sum = $dto->getWinSum();
        $result->is_win = $dto->isWin();
        $result->save();
    }
}
