<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function favorite()
    {
        $user = Auth::user()->id;

        $favorite_announ = DB::select("SELECT favorite.*, 
                (SELECT src FROM announ_images WHERE announ_images.announ_id = favorite.announ_id LIMIT 1) AS image_src,
                (SELECT alt FROM announ_images WHERE announ_images.announ_id = favorite.announ_id LIMIT 1) AS image_alt,
                (SELECT id FROM announs WHERE announs.id = favorite.announ_id LIMIT 1) AS announ_id,
                (SELECT status FROM announs WHERE announs.id = favorite.announ_id LIMIT 1) AS announ_status,
                (SELECT title FROM announs WHERE announs.id = favorite.announ_id LIMIT 1) AS title,
                (SELECT title_url FROM announs WHERE announs.id = favorite.announ_id LIMIT 1) AS title_url,
                (SELECT price FROM announs WHERE announs.id = favorite.announ_id LIMIT 1) AS price,
                (SELECT description FROM announs WHERE announs.id = favorite.announ_id LIMIT 1) AS description,
                (SELECT id_tag FROM announs WHERE announs.id = favorite.announ_id LIMIT 1) AS tag_id,
                (SELECT name FROM tags WHERE tag_id = tags.id LIMIT 1) AS tag_name,
                (SELECT color FROM tags WHERE tag_id = tags.id LIMIT 1) AS tag_color
                FROM favorite WHERE user_id = $user ORDER BY id DESC LIMIT 20");

        return view("favorite", ["favorite_announ" => $favorite_announ]);
    }

    public function delete(Request $request)
    {
        $user = Auth::user()->id;
        $delete_id = $request->delete;

        DB::delete("DELETE FROM favorite WHERE id = $delete_id AND user_id = $user");

        return back();
    }
}
