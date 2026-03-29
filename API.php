<?php

$url = "https://cdn1.discoveryftp.net/Movies/";

$html = file_get_contents($url);

preg_match_all('/href="([^"]+\.(mp4|mkv|avi))"/i', $html, $matches);

$movies = [];

foreach ($matches[1] as $m) {
    $movies[] = [
        "name" => basename($m),
        "url" => $url.$m
    ];
}

header('Content-Type: application/json');
echo json_encode($movies);

?>