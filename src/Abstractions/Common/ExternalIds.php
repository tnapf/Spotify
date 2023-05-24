<?php

namespace Tnapf\Spotify\Abstractions\Common;

class ExternalIds
{
    /**
     * @var string The [International Standard Recording Code](https://en.wikipedia.org/wiki/International_Standard_Recording_Code) (ISRC) for the album.
     */
    public ?string $isrc;

    /**
     * @var string The [International Article Number](https://en.wikipedia.org/wiki/International_Article_Number) (EAN) for the album.
     */
    public ?string $ean;

    /**
     * @var string The [Universal Product Code](https://en.wikipedia.org/wiki/Universal_Product_Code) (UPC) for the album.
     */
    public ?string $upc;
}
