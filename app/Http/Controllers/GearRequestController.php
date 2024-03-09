<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Gear;
use App\Models\GearRequest;
use App\Models\IssuedGear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GearRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dd($request->all());

        $user = Auth::user();
        $status = GearRequest::status;
        $gearRequests = GearRequest::where('user_id', $user->id)->with('gear')->orderByDesc('created_at')->paginate(5);
        // dd($gearRequests->gear);
        return view('backend.Gear.MyRequests', compact('user', 'status', 'gearRequests'));
    }

    public function adminIndex()
    {
        $status = GearRequest::status;
        $sports = Gear::sports;

        $pendingRequests = GearRequest::where('status', 0)->with('gear', 'user')->orderByDesc('created_at')->get();
        $approvedRequests = GearRequest::where('status', 1)->where('issue_date', null)->with('gear', 'user')->orderByDesc('created_at')->get();
        $deniedRequests = GearRequest::where('status', 2)->with('gear', 'user')->orderByDesc('created_at')->get();

        return view('backend.Orders.request_Manager', compact('pendingRequests','status', 'sports', 'approvedRequests', 'deniedRequests'));
    }

    public function getReport(Request $request)
    {
        // dd();
        $id =$request->id;

        $client = User::where('id',$id)->with('gearRequest', 'client', 'issued_gear')->first();

        $pendingRequests = $client->gearRequest->where('status', 0)->count();
        $approvedRequests = $client->gearRequest->where('status', 1)->count();
        $deniedRequests = $client->gearRequest->where('status', 2)->count();

        $client->client->course = Client::courses[$client->client->course];
        $client->client->status= Client::status[$client->client->status];

        // dd($requests->where('status', 0)->count());
        return response()->json([
            "client" => $client,
            "pendingRequests" => $pendingRequests,
            "approvedRequests" => $approvedRequests,
            "deniedRequests" => $deniedRequests,
        ]);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->requestID;

        $gearRequest = GearRequest::where('id', $id)->first();
        if ($request->has('status')) {
            $gearRequest->update([
                "status" => $request->status
            ]);
        }

        $notification = [
            'message' => 'Request Approved!!',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gearListing(Request $request)
    {
        //
        $params = $request->except('_token');

        $categories = Gear::categories;
        $sports = Gear::sports;

        $gears = Gear::filter($params)->paginate(6);

        $query_keyword = $request->query('keyword');
        $query_category = $request->query('category');
        $query_sport = $request->query('sport');

        $results = Gear::count();

        return view('backend.Orders.index', compact(
            'categories',
            'sports',
            'gears',
            'results',
            'query_keyword',
            'query_category',
            'query_sport'
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
        //
        $gearID = $request->id;
        $userId = Auth::id();

        $gearRequest = new GearRequest();

        $gearRequest->user_id = $userId;
        $gearRequest->gear_id = $gearID;
        $gearRequest->status = 0;

        $gearRequest -> save();

        $notification = [
            'message' => 'Request Sent successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('request.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GearRequest  $gearRequest
     * @return \Illuminate\Http\Response
     */
    public function show(GearRequest $gearRequest, $slug)
    {
        //
        $categories = Gear::categories;
        $sports = Gear::sports;
        $gear = Gear::where('slug',$slug)->first();

        // dd($gear->name);

        return view('backend.Orders.show', compact('gear', 'categories', 'sports'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GearRequest  $gearRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(GearRequest $gearRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GearRequest  $gearRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GearRequest $gearRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GearRequest  $gearRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(GearRequest $gearRequest , $id)
    {

        if (IssuedGear::where('gear_request_id', $id)->exists()) {
            $notification = [
                'message' => 'Request Was Issued Cannot Delete this Item',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }

        $gearRequest->destroy($id);

        $notification = [
            'message' => 'Request Deleted successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
