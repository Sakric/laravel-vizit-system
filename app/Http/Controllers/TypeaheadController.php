<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TypeaheadController extends Controller
{
    public function autocompleteSearch($query)
    {
//        $query = $request->get('query');
        $filterResult = User::query()
            ->where('email', 'LIKE', "%{$query}%")->get();
        return response()->json($filterResult);

    }

}
