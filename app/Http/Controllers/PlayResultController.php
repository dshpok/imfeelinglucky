<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\PlayResultInterface;
use Illuminate\Http\JsonResponse;

class PlayResultController extends Controller
{
    public function __construct(private PlayResultInterface $service)
    {

    }

    public function play(): JsonResponse
    {
        $result = $this->service->play(session('userId'));
        return response()->json([
            'randomNumber' => $result->getRandomNumber(),
            'is_win' => $result->isWin(),
            'win_sum' => $result->getWinSum(),
        ]);
    }


    public function getHistory()
    {
        $userId = session('userId');
        $history = $this->service->getHistory($userId);
        return response()->json(['history' => $history]);
    }
}
