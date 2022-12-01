## Planetary Distance Hello World

### Installation

- Clone Repository
- Run `composer install`
- Run `sail up`

### Usage

- Using your favourite Postman Client, run a get request to `0.0.0.0/api/hello-world`
  - URI Params
    - `from` - Planet request is coming from, possible values: `["uranus","saturn","jupiter","mars","earth","venus","mercury"]`
    - `to` - Planet request is going to, possible values: `["uranus","saturn","jupiter","mars","earth","venus","mercury"]`


- CLI `php artisan hello:world $from $to`
  - `from` - Planet request is coming from, possible values: `["uranus","saturn","jupiter","mars","earth","venus","mercury"]`
  - `to` - Planet request is going to, possible values: `["uranus","saturn","jupiter","mars","earth","venus","mercury"]`
