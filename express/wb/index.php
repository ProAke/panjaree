<?php
# scraping books to scrape: https://books.toscrape.com/
require 'vendor/autoload.php';
$httpClient = new \GuzzleHttp\Client();
$response = $httpClient->get('https://th.kerryexpress.com/th/track/v2/?track=YjY3YmVjMDZhMzc0NGY2ZWIyNDk0ODMyNmYxNDM0MGJmSHg4ZDdjNTVmNjg2ZjQ1NDFhYzg3N2QwMzljNjUxOGQ4ZDZmSHg4TkFJTjAwMDExMTYyNUVKZkh4ODk4ZDAyYzljNGU5ODRlMDBhZWZkZmYyYjUyYjNmNGI1Zkh4ODg1YTBjNGRmNjhhYzRkY2M5ZDg3NDAxM2QyNDBlZGEz');
$htmlString = (string) $response->getBody();
//add this line to suppress any warnings
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);

$titles = $xpath->evaluate('//ol[@class="row"]//li//article//h3/a');
$extractedTitles = [];
foreach ($titles as $title) {
    $extractedTitles[] = $title->textContent . PHP_EOL;
    echo $title->textContent . PHP_EOL;
}
