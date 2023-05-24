# Tnapf/Spotify

A proper Spotify API client for PHP (still in development)

# Installation

```bash
composer require tnapf/spotify
```

# Usage

Creating a new Spotify object

```php
use Tnapf\Spotify\Client;
use Psr\Http\Client\ClientInterface;

$httpClient = ClientInterface::class; // <- must be a client interface implementation

$spotify = new Client($httpClient, $clientId, $clientSecret);
```

## Making requests

```php
/** @var Album */
$spotify->albums->get('0rGKEhiSyEwmcpQoU5Gg61');
```

Since everything will eventually be mapped you'll get autocomplete from your IDE so you don't have to look up the documentation all the time.