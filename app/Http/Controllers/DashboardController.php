<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Gear;
use App\Models\GearRequest;
use App\Models\IssuedGear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application Frontend Home Page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homePage()
    {
        return view('frontend.index');
    }


    /**
     * Show the application Backend dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasrole('Admin')) {

            $students = Client::count();
            $newRegistrations = User::doesntHave('roles')->get();
            $recentRequests = GearRequest::where('status', 0)->orderBy('created_at', 'desc')->take(10)->with('user', 'gear')->get();
            $newStudents = $newRegistrations->count();
            $gearRequests = GearRequest::count();
            $issuedRequests = IssuedGear::count();

            $status = GearRequest::status;
            $sports = Gear::sports;

            return view('dashboard')->with([

                'students' => $students,
                'status' => $status,
                'sports' => $sports,
                'newStudents' => $newStudents,
                'gearRequests' => $gearRequests,
                'recentRequests' => $recentRequests,
                'issuedRequests' => $issuedRequests,
                'newRegistrations' => $newRegistrations,
            ]
            );
        } elseif ($user->hasrole('Student')) {

            $students = Client::count();
            $newRegistrations = User::doesntHave('roles')->get();
            $approvedRequests = GearRequest::where('user_id', $user->id)->where('status', 1)->orderBy('created_at', 'desc')->take(10)->with('user', 'gear')->get();
            $pendingRequests = GearRequest::where('user_id', $user->id)->where('status', 0)->count();
            $waitingIssueRequests = GearRequest::where('user_id', $user->id)->where('status', 1)->count();
            $newStudents = $newRegistrations->count();
            $gearRequests = GearRequest::where('user_id', $user->id)->count();
            $issuedRequests = $user->issued_gear->count();

            $status = GearRequest::status;
            $sports = Gear::sports;


            return view('student_dashboard')->with([

                'students' => 50,
                'status' => $status,
                'sports' => $sports,
                'newStudents' => $newStudents,
                'approvedRequests' => $approvedRequests,
                'waitingIssueRequests' => $waitingIssueRequests,
                'gearRequests' => $gearRequests,
                'pendingRequests' => $pendingRequests,
                'issuedGear' => $user->issued_gear,
                'issuedRequests' => $issuedRequests,
                'newRegistrations' => $newRegistrations,
            ]
            );
        } else {

            return view('welcome');
        }
    }
}
