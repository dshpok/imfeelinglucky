<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\LinkInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
class LinkController extends Controller
{

    public function __construct(private LinkInterface $service)
    {
    }
    public function index(string $link): View
    {
        $link = $this->service->get($link);

        if ($link) {
            return view('link.index', [
                'link' => route('link.index', ['link' => $link])
            ]);
        }

        return view('link.expired');
    }

    /**
     * @return JsonResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function update(): JsonResponse
    {
        $newLink = $this->service->update(session()->get('userId'));

        return response()->json([
            'link' => route('link.index', ['link' => $newLink]),
        ]);
    }

    /**
     * @param string $link
     * @return JsonResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function deactivate(string $link): JsonResponse
    {
        $this->service->deactivate($link, session()->get('user_id'));

        return response()->json([
            'result' => 'ok',
        ]);
    }
}
