<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function index(Event $event)
    {
        if ($event->user_id !== Auth::id())
        {
            abort(403);
        }

        $events = Event::where('user_id', Auth::id())->get();

        return view('events.index', [
            'events' => $events,
        ]);
    }




    public function create(Event $event)
    {
        if ($event->user_id !== Auth::id())
        {
            abort(403);
        }
        return view('events.create');
    }




    public function store(Request $request, Event $event)
    {
        if ($event->user_id !== Auth::id())
        {
            abort(403);
        }

        $this->validate($request, [
            'title' => 'required|string|min:5|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|time',
            'location' => 'required|string|min:5|max:255',
        ]);

        $event = Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'location' => $request->input('location'),
            'user_id' => Auth::id(),
        ]);

        // return redirect()->route('events.index')->with('success', 'Event created successfully!');
        return 'Event created successfully!';
    }




    public function show(Event $event)
    {
        if ($event->user_id !== Auth::id())
        {
            abort(403);
        }

        return view('events.show', [
            'event' => $event,
        ]);
    }

    public function edit(Event $event)
    {
        if ($event->user_id !== Auth::id())
        {
            abort(403);
        }

        return view('events.edit', [
            'event' => $event,
        ]);
    }




    public function update(Request $request, Event $event)
    {
        if ($event->user_id !== Auth::id())
        {
            abort(403);
        }

        $this->validate($request, [
            'title' => 'required|string|min:5|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|time',
            'location' => 'required|string|min:5|max:255',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        if ($event->user_id !== Auth::id())
        {
            abort(403);
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }
}
