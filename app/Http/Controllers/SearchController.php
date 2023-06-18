<?php

namespace App\Http\Controllers;

use App\Iterators\NewsIterator;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->query();

        $iterator = new NewsIterator($query);

        return $iterator->current();

    }
}
