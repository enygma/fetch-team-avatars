<?php

require_once __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new GuzzleHttp\Client();

$url = 'https://api.github.com/'.$_ENV['GH_TEAM_URL'];

$res = $client->request('GET', $url, [
    'auth' => [$_ENV['GH_USER'], $_ENV['GH_TOKEN']]
]);
$body = json_decode($res->getBody());

$output = "| ---- | \n";
foreach ($body as $members) {
    $output .= "| ![".$members->login."](".$members->avatar_url.") |\n";
}
echo $output;