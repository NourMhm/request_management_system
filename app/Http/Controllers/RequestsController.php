<?php

namespace App\Http\Controllers;

use App\Models\requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $requests = requests::all();
        return view('requests.requests', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('requests.add_request');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        requests::create([
            'description' => $request->description,
            'Status' => 'قيد الانتظار ',
            'Created_by' => (Auth::user()->name),

        ]);
        session()->flash('Add', 'تم اضافة الطلب بنجاح ');
        return redirect('/requests');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $requests = requests::where('id', $id)->first();
        return view('requests.status_update', compact('requests'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $requests = requests::where('id', $id)->first();
        return view('requests.edit_request', compact('requests'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $requests = requests::findOrFail($request->request_id);
        $requests->update([
            'description' => $request->description,
        ]);

        session()->flash('edit', 'ﺗﻢ ﺗﻌﺪﻳﻞ الطلب ﺑﻨﺠﺎﺡ');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->request_id;
        requests::find($id)->delete();
        session()->flash('delete','تم حذف الطلب بنجاح');
        return redirect('/requests');




    }
    public function Status_Update($id, Request $request)
    {
        $requests = requests::findOrFail($id);

        if ($request->Status === 'مقبول') {

            $requests->update([
                'Value_Status' => 1,
                'Status' => $request->Status,
            ]);


        }

        else {
            $requests->update([
                'Value_Status' => 2,
                'Status' => $request->Status,
            ]);

        }
        session()->flash('Status_Update');
        return redirect('/requests');

    }


}
