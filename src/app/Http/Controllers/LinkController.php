<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\LinkVisit;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    public function createLink(Request $request): RedirectResponse
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        // в любом случае генерим новую ссылку,
        // т.к. в будущем нужен функционал привязки ссылки к пользователю для разграничения доступов
        $shortLink = $this->generateShortLink();

        Link::create([
            'short_link' => $shortLink,
            'long_link'  => $request->link,
            'user_id'    => 1,
        ]);

        $shortUrl = url('/' . $shortLink);

        return back()->with('shortLink', $shortUrl);
    }

    public function getLink(Request $request, string $shortLink)
    {
        $longLink = Link::where('short_link', $shortLink)->firstOrFail();

        LinkVisit::create([
            'link_id'    => $longLink->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'visited_at' => Carbon::now()
        ]);

        return redirect($longLink->long_link, 301);
    }

    private function generateShortLink(int $length = 5): string
    {
        $symbols = [
            ...range(0, 9),
            ...range('A', 'Z'),
            ...range('a', 'z'),
        ];

        $shortLink = '';
        $maxIndex = count($symbols) - 1;

        for ($i = 0; $i < $length; $i++) {
            $shortLink .= $symbols[mt_rand(0, $maxIndex)];
        }

        return $shortLink;
    }
}
