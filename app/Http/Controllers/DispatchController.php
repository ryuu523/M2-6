<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use App\Models\Event;
use App\Models\Worker;
use Illuminate\Http\Request;

class DispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dispatchs = Dispatch::with("worker", "event")->get();
        return view("dispatchs.index", compact("dispatchs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events=Event::all();
        $workers=Worker::all();
        return view("dispatchs.create",compact("events","workers"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "event" => "required",
            "workers" => "required",
        ]);
        foreach ($request->workers as $worker) {
            $dispatch = Dispatch::where("event_id", $request->event)->where("worker_id", $worker);
            if (!$dispatch->exists()) {
                Dispatch::create([
                    "event_id" => $request->event,
                    "worker_id" => $worker,
                    "memo" => isset($request->memo) ? $request->memo : "",
                ]);
            }
        }
        return redirect()->route("dispatch.index")->with("message", "派遣情報が登録されました");
    }

    /**
     * Display the specified resource.
     */
    public function show(dispatch $dispatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dispatch $dispatch)
    {
        $events=Event::all();
        $workers=Worker::all();
        return view("dispatchs.edit", compact("dispatch","events","workers"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dispatch $dispatch)
    {
        $request->validate([
            "event" => "required",
            "worker" => "required",
        ]);
        $dispatch->update([
            "event_id" => $request->event,
            "worker_id" => $request->worker,
            "memo" => isset($request->memo) ? $request->memo : "",
        ]);
        return redirect()->route("dispatch.index")->with("message", "派遣情報が更新されました");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dispatch $dispatch)
    {
        $dispatch->delete();
        return redirect()->route("dispatch.index")->with("message", "削除しました");
    }
}
