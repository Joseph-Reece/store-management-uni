<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Client::with('user')->get();
        // dd($users);

        // foreach ($data as $key => $user) {
        //     dd($user->status);
        // }


        $status = Client::status;


        return view('backend.Clients.index', compact('data', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Client  $Client
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $id = $request->id;

        $client = User::where('id',$id)->with('gearRequest', 'client', 'issuedGear')->first();

        $requests = $client->gearRequest;
        $pendingRequests = $client->gearRequest->where('status', 0)->count();
        $approvedRequests = $client->gearRequest->where('status', 1)->count();
        $deniedRequests = $client->gearRequest->where('status', 2)->count();
        // dd();

        $issued_gear = $client->issued_gear;
        $pending_return = $issued_gear->where('status', 0)->count();
        $returned_gear = $issued_gear->where('status', 1 || 2)->count();
        $lost_gear = $issued_gear->where('status', 3)->count();

        $client->client->course = Client::courses[$client->client->course];
        $client->client->status= Client::status[$client->client->status];


        // dd($requests->where('status', 0)->count());
        return response()->json([
            "client" => $client,
            "issued_gear" => $issued_gear->count(),
            "pending_return" => $pending_return,
            "returned_gear" => $returned_gear,
            "lost_gear" => $lost_gear,
            "total_requests" => $requests->count(),
            "pendingRequests" => $pendingRequests,
            "approvedRequests" => $approvedRequests,
            "deniedRequests" => $deniedRequests,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $Client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $Client)
    {
        //
        $user = Auth::user();
        $details = Client::where('user_id', $user->id)->first();
        $courses = Client::courses;

        return view('users.accountSetting', compact('user', 'courses', 'details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $Client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $Client)
    {
        //
        $user = Auth::id();

        $save = Client::updateOrCreate(
            ['user_id' => $user],
            [
                'reg_no' => $request->reg_no,
                'phone' => $request->phone,
                'course' => $request->course,
            ]
        );

        return response()->json(['success'=>'Info updated successfully !'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $Client
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        //
        $input = $request->all();

        $user = User::find($id);

        if($request->has('password')){
            $input['password'] = Hash::make($input['password']);
            $user->update($input);

            return response()->json(['success'=>'Password is Changed Successfully!'], 200);

        }

        $user->update($input);
        // dd($user);

        $notification = [
            'message' => 'User Updated successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function updateStatus(Request $request)
    {

        $client = Client::find($request->id);
        // dd($client);

        $client -> update([
            "status" => $request->status
        ]);

        $notification = [
            'message' => 'Status Changed successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $Client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $Client)
    {
        //
    }
}
