<?php

namespace Airtickets\Http\Controllers;

use Illuminate\Http\Request;
use Airtickets\Flight;
use Airtickets\Airport;
use Airtickets\Plane;
use Validator;
use Illuminate\Support\Facades\DB;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flights = DB::table('flights')
        ->join('airports as s','s.airport_id','source_airport_id')
        ->join('airports as d','d.airport_id','destination_airport_id')
        ->join('tickets','tickets.flight_id','flights.flight_id')
        ->select('depart_date_time','arrival_date_time','s.city as source','d.city as destination','price','ticket_id')
        ->get();
        return view('flights',array('flights' => $flights));
    }
    public function search(Request $request)
    {
        $from = $request->get('from');
        $to   = $request->get('to');
        $flights = DB::table('flights')
        ->join('airports as s','s.airport_id','source_airport_id')
        ->join('airports as d','d.airport_id','destination_airport_id')
        ->join('tickets','tickets.flight_id','flights.flight_id')
        ->select('depart_date_time','arrival_date_time','s.city as source','d.city as destination','price','ticket_id')
        ->where('s.city','=',$from)
        ->where('d.city','like',$to)
        ->get();
        return view('flights')->with('flights', $flights);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdmin()
    {
        $flights = DB::table('flights')
        ->join('airports as s','s.airport_id','source_airport_id')
        ->join('airports as d','d.airport_id','destination_airport_id')
        ->join('planes','planes.plane_id','flights.flight_plane_id')
        ->select('depart_date_time','arrival_date_time','s.city as source',
        'd.city as destination','flights.flight_id','plane_name')
        ->get();
        return view('flights_show_admin',array('flights'=> $flights));
    }
    public function create()
    {
        $airports = DB::table('airports')
        ->select('airport_name')
        ->get();
        $planes = DB::table('planes')
        ->select('plane_name')
        ->get();
        $air = $airports->pluck('airport_name');
        $pl  = $planes->pluck('plane_name');

        return view('flight_create',array(
            'airport' =>$air->toArray(),
            'plane'   =>$pl->toArray()
        ));
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
        Validator::make( $request->all(),[
            'source_airport' => 'required',
            'destination_airport' => 'required',
            'plane_name' => 'required',
            'depart_date_time' => 'required|regex:/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/',
            'arrival_date_time' => 'required|regex:/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/',
        ])->validate();
        $flight = new Flight();
        $flight->depart_date_time = $data['depart_date_time'];
        $flight->arrival_date_time = $data['arrival_date_time'];
        $sourceAirportID = Airport::where('airport_id','=',$data['source_airport']+1)
        ->pluck('airport_id')->toArray();
        $destAirportID = Airport::where('airport_id','=',$data['destination_airport']+1)
        ->pluck('airport_id')->toArray();
        $plane = Plane::where('plane_id','=',$data['plane_name']+1)->pluck('plane_id')->toArray();
        $flight->flight_plane_id = $plane[0];
        $flight->source_airport_id = $sourceAirportID[0];
        $flight->destination_airport_id = $destAirportID[0];
        $flight->save();
        return redirect()->action('FlightController@showAdmin')->with('message','Flight added');   
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
        $flight = DB::table('flights')
        ->where('flight_id','=',$id)->get();
        $airports = DB::table('airports')
        ->select('airport_name')
        ->get();
        $planes = DB::table('planes')
        ->select('plane_name')
        ->get();
        $air = $airports->pluck('airport_name');
        $pl  = $planes->pluck('plane_name');

        return view('edit_flight',array(
            'flight'  =>$flight->toArray(),
            'airport' =>$air->toArray(),
            'plane'   =>$pl->toArray()
        ));
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
        $data = $request->all();
        Validator::make( $request->all(),[
            'source_airport' => 'required',
            'destination_airport' => 'required',
            'plane_name' => 'required',
            'depart_date_time' => 'required|regex:/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/',
            'arrival_date_time' => 'required|regex:/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/',
        ])->validate();
        $sourceAirportID = Airport::where('airport_id','=',$data['source_airport']+1)
        ->pluck('airport_id')->toArray();
        $destAirportID = Airport::where('airport_id','=',$data['destination_airport']+1)
        ->pluck('airport_id')->toArray();
        $plane = Plane::where('plane_id','=',$data['plane_name']+1)->pluck('plane_id')->toArray();
        Flight::where('flight_id','=',$id)
        ->update(array(
            'depart_date_time' => $data['depart_date_time'],
            'arrival_date_time'=> $data['arrival_date_time'],
            'flight_plane_id' => $plane[0],
            'source_airport_id'=> $sourceAirportID[0],
            'destination_airport_id'=>$destAirportID[0]
        ));
        return redirect()->action('FlightController@showAdmin')->with('message','Flight edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Flight::where('flight_id','=',$id)->delete();
        return redirect()->action('FlightController@showAdmin')->with('message','Flight deleted');
    }
}
