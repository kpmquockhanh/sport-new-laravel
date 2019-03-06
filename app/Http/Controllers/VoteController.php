<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = [
            'votes' => Vote::with('user', 'new')->paginate(10),
        ];

        return view('be.votes.index')->with($viewData);
    }
}
