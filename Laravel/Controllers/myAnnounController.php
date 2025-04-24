<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class myAnnounController extends Controller
{
    public function myannoun()
    {
        $user = Auth::user()->id;

        $myannoun = DB::select("SELECT announs.*, 
                (SELECT src FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_src,
                (SELECT alt FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_alt,
                (SELECT id FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_id,
                (SELECT name FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_name,
                (SELECT color FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_color
                FROM announs WHERE id_user = $user LIMIT 20");

        return view("myannoun", ["myannoun" => $myannoun]);
    }

    public function delete(Request $request)
    {
        $user = Auth::user()->id;
        $delete_id = $request->delete;

        DB::update("UPDATE announs SET status = 0 WHERE id = $delete_id AND id_user = $user");

        return back();
    }
}
