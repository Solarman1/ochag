<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    //
    public function index()
    {
        return Journal::all();
    }

    public function delete(Request $request, $id)
    {
        $article = Journal::findOrFail($id);
        $article->delete();

        return 204;
    }
}
