<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
{
    $tags = Tag::all();
    return response()->json($tags);
}

public function store(Request $request)
{
    $tag = Tag::create($request->all());
    return response()->json($tag);
}

public function update(Request $request, $id)
{
    $tag = Tag::findOrFail($id);
    $tag->update($request->all());
    return response()->json($tag);
}

public function destroy($id)
{
    $tag = Tag::findOrFail($id);
    $tag->delete();
    return response()->json(['message' => 'Tag deleted successfully']);
}
}
