<?php

require_once __DIR__.'/vendor/autoload.php';

use Cmd\Command;

if (is_file(__DIR__.'/.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
} else {
    // Otherwise try and use the command line values
    $cmd = new Command();
    $args = $cmd->execute($_SERVER['argv']);

    $_ENV = array_merge($_ENV, $args);
}


$client = new GuzzleHttp\Client();

$url = 'https://api.github.com/'.$_ENV['GH_TEAM_URL'];

$res = $client->request('GET', $url, [
    'auth' => [$_ENV['GH_USER'], $_ENV['GH_TOKEN']]
]);
$body = json_decode($res->getBody());

$count = 1;
$output = '';
// $output = "| ---- | \n";
foreach ($body as $members) {
    // $output .= "| ![".$members->login."](".$members->avatar_url.") |\n";
    // $output .= '|<a href="https://github.com/'.$members->login.'"><img src="'.$members->avatar_url.'" height="20" width="20"></a> |';
    $output .= '<a href="https://github.com/'.$members->login.'"><img src="'.$members->avatar_url.'" height="50" width="50"></a>'."\n";

    if ($count % 7 == 0 && $count !== 0) { $output .= "<br/>\n"; }

    $count++;
}
echo $output;