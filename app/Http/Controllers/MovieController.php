<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function getData()
    {
        $response1 = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3MDAyMmJlZDYyMWQxYjE1NTAzYjc4YzUxOGM4OGUxNyIsInN1YiI6IjY0YTJkNjQzODI4OWEwMDBhZTg4YTFiZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.hDUZdjg28kNBx53RI5jSCLSQ7Xg5RVMOCmQNDPCiwBw')->get('https://api.themoviedb.org/3/movie/upcoming?language=en-US&page=1');
        
        $response2 = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3MDAyMmJlZDYyMWQxYjE1NTAzYjc4YzUxOGM4OGUxNyIsInN1YiI6IjY0YTJkNjQzODI4OWEwMDBhZTg4YTFiZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.hDUZdjg28kNBx53RI5jSCLSQ7Xg5RVMOCmQNDPCiwBw')->get('https://api.themoviedb.org/3/discover/movie');
    
        $data1 = $response1->json();
        $data2 = $response2->json();

        $movies = $data1['results'];
        $mivoe = $data2['results']; // Asumsikan 'results' adalah kunci yang berisi data film dalam respons JSON

        return view('welcome', ['movies' => $movies, 'mivoe' => $mivoe]);
    }
}
