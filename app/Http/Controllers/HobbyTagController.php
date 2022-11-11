<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class HobbyTagController extends Controller
{
    public function getFilteredHobbies($tag_id)
    {
        $tag = new Tag();
        $hobbies = $tag::findOrFail($tag_id)->filterHobbies()->paginate(10);
        $filter = $tag::find($tag_id); // We don't use findOrFail here as we ara already using it in the previous line.

        return view('hobby.index', [
            'hobbies' => $hobbies,
            'filter' => $filter,
        ]);
    }
}
