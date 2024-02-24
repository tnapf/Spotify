<?php

namespace Tnapf\Spotify\Rest;

use Tnapf\Spotify\Abstractions\Audiobook\Audiobook;
use Tnapf\Spotify\Abstractions\Audiobook\Chapters;
use Tnapf\Spotify\Enums\Method;

class Audiobooks extends RestBase
{
    public function get(string $id, ?string $market = null): Audiobook
    {
        return $this->http->mapRequest(
            Audiobook::class,
            Method::GET,
            Endpoint::bind(Endpoint::AUDIOBOOKS_ID, compact('id'), market: $market),
            headers: $this->http->mergeHeaders()
        );
    }

    /** @return Audiobook[] */
    public function getSeveral(array $ids, ?string $market = null): array
    {
        $ids = implode(',', $ids);

        return $this->http->mapArrayRequest(
            Audiobook::class,
            Method::GET,
            Endpoint::bind(Endpoint::AUDIOBOOKS, getParams: compact('ids'), market: $market),
            headers: $this->http->mergeHeaders(),
            callback: static fn (array $res) => $res['audiobooks']
        );
    }

    public function getChapters(string $id, int $limit = 20, int $offset = 0, ?string $market = null): Chapters
    {
        return $this->http->mapRequest(
            Chapters::class,
            Method::GET,
            Endpoint::bind(Endpoint::AUDIOBOOKS_CHAPTERS, compact('id'), getParams: compact('limit', 'offset'), market: $market),
            headers: $this->http->mergeHeaders()
        );
    }
}
