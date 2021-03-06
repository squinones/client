<?php

require __DIR__ . "/../vendor/autoload.php";

use Undemanding\Client\Session;
use Undemanding\Client\Page;

$client = new GuzzleHttp\Client(["base_uri" => "http://localhost:4321"]);

$session = Session::create($client);

$page = Page::create($client, $session);

print "body: " . $page
    ->visit("http://assertchris.io")
    ->run("document.write('hello world'); return 'success';")
    ->body();

print "\n";

print "returned: " . $page->returned();
