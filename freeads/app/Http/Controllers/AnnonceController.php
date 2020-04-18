<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Http\Requests\AdStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = DB::table('ads')->orderBy('created_at', 'DESC')->paginate(4);
        
        return view('ads', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdStore $request)
    {
            $validated = $request->validated();
            
            $ad = new Annonce();
            $ad->title = $validated['title'];
            $ad->description = $validated['description'];
            $ad->price = $validated['price'];
            $ad->user_id = auth()->user()->id;
            $ad->save();

            return redirect()->route('welcome')->with('success', "Your add has been post.");

    }

    
    public function search($request)
    {

        $words = $request->words;

        $ads = DB::table('ads')
        ->where('title', 'LIKE', "%$words%")
        ->orWhere('description', 'LIKE', "%$words%")
        ->orderBy('created_at', 'DESC')
        ->get();

        return response()->json(['success' => true, 'ads' => $ads]);


    }






}
