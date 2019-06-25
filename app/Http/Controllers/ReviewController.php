<?php

namespace Airtickets\Http\Controllers;

use Airtickets\Review;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() 
    {
        $this->middleware('auth',['except'=>['index']]);
    }
    public function index()
    {
        $reviews = DB::table('reviews')
        ->join('users','users.id','reviews..user_id')
        ->select('first_name','last_name','review_text','reviews.created_at','user_id','review_id')
        ->get();
        return view('reviews',array('reviews' => $reviews));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('review_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Validator::make($request->all(),[
            'review_text' => 'required|max:191'
        ])->validate();
        $review = new Review();
        $review->review_text = $data['review_text'];
        $review->user_id = Auth::user()->id;
        $review->save();
        return redirect()->action('ReviewController@index', array($review->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = DB::table('reviews')
        ->where('review_id','=',$id)
        ->get();
        return view('review_edit', array('review'=>$review));
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
        Review::where('review_id','=',$id)->update(array('review_text'=>$request->review_text));
        return redirect('/reviews');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Review::where('review_id','=',$id)->delete();
       return redirect('/reviews');  
    }
}
