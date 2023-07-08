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

        $response3 = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3MDAyMmJlZDYyMWQxYjE1NTAzYjc4YzUxOGM4OGUxNyIsInN1YiI6IjY0YTJkNjQzODI4OWEwMDBhZTg4YTFiZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.hDUZdjg28kNBx53RI5jSCLSQ7Xg5RVMOCmQNDPCiwBw')->get('https://api.themoviedb.org/3/movie/now_playing');
    
        $data1 = $response1->json();
        $data2 = $response2->json();
        $data3 = $response3->json();

        // Asumsikan 'results' adalah kunci yang berisi data film dalam respons JSON
        $movies = $data1['results'];
        $mivoe = $data2['results']; 
        $movie = $data3['results']; 

        return view('welcome', ['movies' => $movies, 'mivoe' => $mivoe, 'movie' => $movie]);
    }

    public function getDetails() {

        $response = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3MDAyMmJlZDYyMWQxYjE1NTAzYjc4YzUxOGM4OGUxNyIsInN1YiI6IjY0YTJkNjQzODI4OWEwMDBhZTg4YTFiZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.hDUZdjg28kNBx53RI5jSCLSQ7Xg5RVMOCmQNDPCiwBw')->get('https://api.themoviedb.org/3/movie/upcoming?language=en-US&page=1');

        $data = $response->json();

        $details = $data['results'];

        return view('details', ['details' => $details]);
    }
    public function getGenre() {

        $response4 = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3MDAyMmJlZDYyMWQxYjE1NTAzYjc4YzUxOGM4OGUxNyIsInN1YiI6IjY0YTJkNjQzODI4OWEwMDBhZTg4YTFiZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.hDUZdjg28kNBx53RI5jSCLSQ7Xg5RVMOCmQNDPCiwBw')->get('https://api.themoviedb.org/3/genre/movie/list');

        $data4 = $response4->json();

        $genre = $data4['genres'];

        return view('genre', ['genre' => $genre]);
    }
    public function getTvlist() {

        $response5 = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3MDAyMmJlZDYyMWQxYjE1NTAzYjc4YzUxOGM4OGUxNyIsInN1YiI6IjY0YTJkNjQzODI4OWEwMDBhZTg4YTFiZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.hDUZdjg28kNBx53RI5jSCLSQ7Xg5RVMOCmQNDPCiwBw')->get('https://api.themoviedb.org/3/genre/tv/list');

        $data5 = $response5->json();

        $tvlist = $data5['genres'];

        return view('tvlist', ['tvlist' => $tvlist]);
    }
    public function getMovieGenre($genreId) {

        $apiKey = '70022bed621d1b15503b78c518c88e17';
        $url = "https://api.themoviedb.org/3/discover/movie?api_key={$apiKey}&with_genres={$genreId}";

        // Mengambil daftar film berdasarkan ID genre dari API
        $response = Http::get($url);
        $moviesData = $response->json();

        // Menampilkan daftar film
        $moviesID = $moviesData['results'];

        return view('detailGenre', ['moviesID' => $moviesID]);
    }
    public function getDetailTvlist($genreId) {

        $apiKey = '70022bed621d1b15503b78c518c88e17';
        $url = "https://api.themoviedb.org/3/discover/tv?api_key=70022bed621d1b15503b78c518c88e17&with_genres={$genreId}";

        // Mengambil daftar film berdasarkan ID genre dari API
        $response = Http::get($url);
        $tvlistData = $response->json();

        // Menampilkan daftar film
        $tvlistID = $tvlistData['results'];

        return view('detailsTvlist', ['tvlistID' => $tvlistID]);
    }
}
