<?php

namespace App\Http\Controllers;

use App\Models\Gear;
use Illuminate\Http\Request;
use Image;

class GearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Gear::categories;
        $sports = Gear::sports;

        $gears = Gear::all();
        // dd($gears);

        return view('backend.Gear.index', compact('sports', 'categories', 'gears'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Gear::categories;
        $sports = Gear::sports;

        return view('backend.Gear.addGear', compact('sports', 'categories'));
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
        $this->validate($request, [
            'name' => 'required',
            'brand' => 'required',
            'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'quantity' => 'required',
            'price' => 'required',
            'category' => 'required',
            'sport' => 'required',
        ]);

        $sports = [
            'Football',
            'NetBall',
            'Rugby',
        ];

        $categories = [
            'Indoor game',
            'Outdoor game',
        ];

        $formData = $request->all();
        // dd($formData);
        $sport = $formData['sport'];

        if($request->has('file')){
            $image = $request->file('image');
            $formData['image'] = time().'.'.$image->getClientOriginalExtension();

            // dd($formData);

            $destinationPath = public_path('/thumbnail');

            $imgFile = Image::make($image->getRealPath());
            // dd($imgFile);

            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$formData['image']);

            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $formData['image']);
        }

        // dd($sports[$sport]);

        $gear = new Gear();

        $gear->fill($formData);

        $gear->save();

        $notification = array(
            'message' => 'Gear created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('gear.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gear  $Gear
     * @return \Illuminate\Http\Response
     */
    public function show(Gear $Gear, $slug)
    {
        //
        $gear = Gear::where('slug', $slug)->first();

        return view('backend.Gear.showGear', compact('gear'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gear  $Gear
     * @return \Illuminate\Http\Response
     */
    public function edit(Gear $Gear, $slug)
    {
        //
        $gear = Gear::where('slug', $slug)->first();
        // dd($gear->id);
        $categories = Gear::categories;
        $sports = Gear::sports;

        return view('backend.Gear.editGear', compact('sports', 'categories', 'gear'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gear  $Gear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gear $Gear, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'category' => 'required',
            'sport' => 'required',
        ]);

        $gear = $Gear->find($id);
        $formData = $request->all();

        if($request->has('file')){
            $image = $request->file('file');
            $formData['image'] = time().'.'.$image->getClientOriginalExtension();

            // dd($formData);

            $destinationPath = public_path('/thumbnail');

            $imgFile = Image::make($image->getRealPath());
            // dd($imgFile);

            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$formData['image']);

            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $formData['image']);
        }


        $gear->update($formData);

        $notification = [
            'message' => 'Gear Updated successfully',
            'alert-type' => 'success'
    ];
        return redirect()->route('gear.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gear  $Gear
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gear $Gear, $id)
    {
        //
        $gear = Gear::find($id);

        if ($gear->issued_gear()->first()) {
            # code...
            // dd($gear->issued_gear);
            $notification = [
                'message' => 'Has transactions. Cannot Delete',
                'alert-type' => 'error'
        ];
            return redirect()->back()->with($notification);
        }

        $Gear->destroy($id);

        $notification = [
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
