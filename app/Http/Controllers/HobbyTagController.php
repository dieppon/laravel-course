<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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

    public function attachTag($hobby_id, $tag_id)
    {
        $hobby = Hobby::find($hobby_id);

        if ( Gate::denies('connect_hobbyTag', $hobby) ) {
            abort(403, 'You are not the author of this hobby');
        }

        $tag = Tag::find($tag_id);
        $hobby->tags()->attach($tag_id);
        return back()->with([
            'message_success' => 'The tag <b>' . $tag->name . '</b> was added.',
        ]);
    }

    public function detachTag($hobby_id, $tag_id)
    {
        $hobby = Hobby::find($hobby_id);

        if ( Gate::denies('connect_hobbyTag', $hobby) ) {
            abort(403, 'You are not the author of this hobby');
        }

        $tag = Tag::find($tag_id);
        $hobby->tags()->detach($tag_id);
        return back()->with([
            'message_success' => 'The tag <b>' . $tag->name . '</b> was removed.',
        ]);
    }
}
