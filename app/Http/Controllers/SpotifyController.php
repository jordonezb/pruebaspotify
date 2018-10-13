<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rennokki\Larafy\Larafy;

class SpotifyController extends Controller
{
    protected $api;
    public function __construct()
    {
        //$this->middleware('auth');
        $this->api = new Larafy('61c78f4bd7ab4ab898376a3a4acafcfc', '64667de426f0413886f6492f7857ef21');
        $this->api->setLocale('es_ES');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        try {
            $limit = 5;
            $offset = 5;
            
            $list = $this->api->getNewReleases($limit, $offset); // limit 15 with 5 offset.
            /*echo '<pre>';
            print_r($list->items);
            echo '</pre>';*/
        } catch(\Rennokki\Larafy\Exceptions\SpotifyAuthorizationException $e) {
            // invalid ID & Secret provided
            $e->getAPIResponse(); // Get the JSON API response.
        }

        return view('index', array('lista'=>$list->items));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        try {            
            $limit = 5;
            $offset = 0;
            $artista = $this->api->getArtist($id); 
            $artistaAlbums = $this->api->getArtistTopTracks($id); 
        } catch(\Rennokki\Larafy\Exceptions\SpotifyAuthorizationException $e) {
            // invalid ID & Secret provided
            $e->getAPIResponse(); // Get the JSON API response.
        }

        return view('vista', array('artista'=>$artista,'artistaAlbums'=>$artistaAlbums->tracks));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo $id;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   
}
