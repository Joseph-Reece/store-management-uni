<?php

namespace App\Http\Controllers;

use App\Models\Gear;
use App\Models\GearRequest;
use App\Models\IssuedGear;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class IssuedGearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $RequestStatus = GearRequest::status;
        $status = IssuedGear::status;
        $sports = Gear::sports;


        $gears = GearRequest::where('status', 1)->where("issue_date", null)->get();
        $issuedGear = IssuedGear::where('status', 0)->with('gearRequest')->get();
        $returnedGear = IssuedGear::where('status', 1)->orWhere('status', 2)->with('gearRequest')->get();

        // dd($issuedGear[0]->gearRequest);

        return view('backend.Gear_Issue.index', compact('status', 'RequestStatus', 'gears', 'sports', 'issuedGear', 'returnedGear'));
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
        $requestID = $request->requestID;
        $gearRequest = GearRequest::where('id', $requestID)->first();

        $due_date = Carbon::now()->addDays(7);

        // dd($due_date);

        if(IssuedGear::where("gear_request_id", $requestID)->doesntExist()){

            $issueGear = IssuedGear::create([
                "gear_request_id" => $requestID,
                "status" => $request->status,
                "due_date" => $due_date
            ]);

            $gearRequest->update([
                "issue_date" => $issueGear->created_at,
                "status" => 3
            ]);

            $notification = [
                'message' => 'Gear Issued',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }else {
            $notification = [
                'message' => 'Gear already Issued',
                'alert-type' => 'warning'
            ];

            return redirect()->back()->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IssuedGear  $issuedGear
     * @return \Illuminate\Http\Response
     */
    public function show(IssuedGear $issuedGear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IssuedGear  $issuedGear
     * @return \Illuminate\Http\Response
     */
    public function edit(IssuedGear $issuedGear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IssuedGear  $issuedGear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IssuedGear $issuedGear, $id)
    {
        //
        // dd($id);

        $issue = IssuedGear::find($id);

        $issue->update([
            "status" => $request->status,
        ]);

        $notification = [
            'message' => 'Status changed',
            'alert-type' => 'success'
        ];
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IssuedGear  $issuedGear
     * @return \Illuminate\Http\Response
     */
    public function destroy(IssuedGear $issuedGear, $id)
    {
        //make issue date null on gearRequest table
        // set status to approved on gearRequest table
        // reset increment on gears table

        $issue = $issuedGear->find($id);
        $gearRequest = GearRequest::find($issue->gearRequest->id);
        $gear = $gearRequest->gear;

        $gearRequest -> update([
            'issue_date' => null
        ]);

        $issuedGear->destroy($id);

        $notification = [
            'message' => 'Gear Issue Cancelled',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
