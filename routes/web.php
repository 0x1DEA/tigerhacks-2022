<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/planner', function () {
    return Inertia::render('Nav');
});

Route::get('/offsets', function () {
    return Inertia::render('Offsets');
});

Route::get('/calculator', function () {
    return Inertia::render('Impact');
});

Route::get('/celebrity-jets', function () {
    $res = ['meta' => []];
    $tweets = [];
    do {
        $res = Http::withHeaders([
            'Authorization' => ''
        ])->get('https://api.twitter.com/2/users/1450174360346574850/tweets?start_time=' . substr(now()->subDays(30)->toRfc3339String(), 0, -6) . 'Z&max_results=100' . (array_key_exists('next_token', $res['meta']) ? ('&pagination_token=' . $res['meta']['next_token']) : ''))->json();
        usleep(100);
        if (array_key_exists('data', $res)) {
            $tweets = array_merge($res['data'], $tweets);
        }

    } while(array_key_exists('next_token', $res['meta']));
    $data = [];
    $totals = [
        'gallons' => 0,
        'lbs' => 0,
        'cost' => 0,
        'tons' => 0,
        'trips' => 0,
    ];
    foreach ($tweets as $tweet) {
        if(!str_contains($tweet['text'], 'emissions')) {
            continue;
        }
        $name = $gallons = $lbs = $cost = $tons = null;
        preg_match('/^(.*?)\'s/', $tweet["text"], $name);
        preg_match('/ (.*?) gallons/', $tweet["text"], $gallons);
        preg_match('/ (.*?) lbs/', $tweet["text"], $lbs);
        preg_match('/\$(.*?) /', $tweet["text"], $cost);
        preg_match('/ (.*?) tons/', $tweet["text"], $tons);
        if(!array_key_exists($name[1], $data)) {
            $data[$name[1]] = [
                'gallons' => 0,
                'lbs' => 0,
                'cost' => 0,
                'tons' => 0,
                'trips' => 0
            ];
        }
        $data[$name[1]] = [
            'gallons' => (int)preg_replace("~\D~", "", $gallons[1]),
            'lbs' => (int)preg_replace("~\D~", "", $lbs[1]),
            'cost' => (int)preg_replace("~\D~", "", $cost[1]),
            'tons' => (int)preg_replace("~\D~", "", $tons[1]),
            'trips' => (int)preg_replace("~\D~", "", $data[$name[1]]['trips']) + 1
        ];
        $totals["gallons"] += $data[$name[1]]['gallons'];
        $totals["lbs"] += $data[$name[1]]['lbs'];
        $totals["cost"] += $data[$name[1]]['cost'];
        $totals["tons"] += $data[$name[1]]['tons'];
        $totals["trips"] += $data[$name[1]]['trips'];
    }

    return Inertia::render('CelebrityJets', [
        'data' => $data,
        'totals' => $totals
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
