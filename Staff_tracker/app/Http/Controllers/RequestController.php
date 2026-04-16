<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    public function index()
    {
        $requests = Request::latest()->get();
        return view('requests.index', compact('requests'));
    }

    public function store(HttpRequest $request)
    {
        Request::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => 'new',
        ]);

        return redirect()->route('requests.index');
    }
// UPDATE STATUS
public function update(\Illuminate\Http\Request $request, $id)
{
    $req = \App\Models\Request::findOrFail($id);

    if (auth()->user()->role !== 'admin') {
        abort(403);
    }

    $req->status = $request->status;
    $req->save();

    return redirect()->back();
}

// DELETE
public function destroy($id)
{
    $req = \App\Models\Request::findOrFail($id);

    if (auth()->user()->role !== 'admin') {
        abort(403);
    }

    $req->delete();

    return redirect()->back();
}
}