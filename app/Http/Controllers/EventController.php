<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view("events.index", compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("events.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string",
            "place" => "required|string",
            "date" => "required|date",
        ]);
        Event::create([
            "title" => $request->title,
            "place" => $request->place,
            "date" => $request->date,
        ]);
        return redirect()->route("event.index")->with("message", "イベント情報が登録されました");
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view("events.edit", compact("event"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            "title" => "required|string",
            "place" => "required|string",
            "date" => "required|date",
        ]);
        $event->update([
            "title" => $request->title,
            "place" => $request->place,
            "date" => $request->date,
        ]);
        return redirect()->route("event.index")->with("message", "イベント情報が更新されました");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route("event.index")->with("message", "削除しました");
    }
}
