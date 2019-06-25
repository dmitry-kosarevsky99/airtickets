<?php

namespace Airtickets\Http\Controllers;

use Illuminate\Http\Request;
use Airtickets\Ticket;
use Validator;
use Airtickets\UserTicket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _construct()
    {
        $this->middleware('auth',['except' =>['show']]);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }
    public function createUserTicket(Request $request)
    {
        $ticket = $request->session()->get('ticket');
        $cells = $request->session()->get('cells');
        //dd($ticket);
        return view('ticket_user_create',array('ticket'=>$ticket,'cells'=>$cells));
    }
    public function storeUserTicket(Request $request)
    {
        $data = $request->all();
        $ticekt = $request->session()->get('ticket');
        Validator::make($request->all(),[
            'cell' => 'required'
        ])->validate();
        $userID = Auth::user()->id;
        // dd($data['cell']);
        $userTicket = new UserTicket();
        $userTicket->ticket_id = $ticekt[0]->ticket_id;
        $userTicket->user_id = Auth::user()->id;
        $userTicket->ticket_cell = $data['cell'];
        $userTicket->save();
        return redirect()->action('FlightController@index')->with('message','Ticket have been purchased, have a nice flight');
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
    public function show($id, Request $request)
    {
        $ticket = DB::table('tickets')
        ->join('flights','tickets.flight_id','flights.flight_id')
        ->join('planes','flights.flight_plane_id','planes.plane_id')
        ->join('airports as s','s.airport_id','source_airport_id')
        ->join('airports as d','d.airport_id','destination_airport_id')
        ->select('depart_date_time','arrival_date_time','s.city as source','d.city as destination','price','plane_name','ticket_class',
        'tickets.description','s.address as Airport_Address','s.airport_name','cell_amount','tickets.ticket_id')
        ->where('tickets.ticket_id','=',$id)
        ->get();
        $occupiedSeats = UserTicket::where('ticket_id','=',$id)->count();
        $availableSeats = $ticket[0]->cell_amount - $occupiedSeats;
        $CellArray = array();
        for($i = 0;$i < $ticket[0]->cell_amount;$i++)
        {   
            $OccupiedSeat = UserTicket::where('ticket_id','=',$id)->where('ticket_cell','=',$i+1);
            if( $OccupiedSeat == null ) continue;
            else $CellArray[$i] = $i+1;
        }
        $request->session()->put('ticket',$ticket);
        $request->session()->put('availableSeats',$availableSeats);
        $request->session()->put('cells',$CellArray);
        return view('ticket_show',array('ticket'=> $ticket,'availableSeats'=>$availableSeats));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
