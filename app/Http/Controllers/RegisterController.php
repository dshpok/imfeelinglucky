<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Interfaces\RegisterInterface;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
   public function index(): View
    {
        return view('register.index');
    }

    /**
     * @param RegisterRequest $request
     * @param RegisterInterface $registerService
     * @return JsonResponse
     */
    public function create(
        RegisterRequest $request,
        RegisterInterface $registerService
    ): JsonResponse
    {
        $inputs = $request->validated();
        $link = $registerService->create($inputs['name'], $inputs['phone_number']);
        return response()->json([
            'link' => route('link.index', ['link' => $link])
        ]);
    }
}
