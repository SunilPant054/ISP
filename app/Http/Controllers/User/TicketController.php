<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
use Illuminate\Support\Facades\Auth;

;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(TicketRequest $request)
    { 
        $ext = $request->file('attachment')->getClientOriginalExtension();
        $image_name = time(). '.' .$ext;
        $path = $request->file('attachment')->storeAs('uploads', $image_name);
        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'title' => $request->title,
            'content' => $request->content,
            'attachment' => $image_name,
        ]); 
        return response()->json($ticket, Response::HTTP_CREATED);
        // return response(['message'=>'Ticket Created'],
        // Response::HTTP_CREATED);
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
