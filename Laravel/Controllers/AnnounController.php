<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AnnounController extends Controller
{
    public function announ()
    {
        $target_item = $_GET["item"];

        $announ = DB::select("SELECT announs.*, 
                    (SELECT src FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_src,
                    (SELECT alt FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_alt,
                    (SELECT id FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_id,
                    (SELECT name FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_name,
                    (SELECT color FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_color,
                    (SELECT first_name FROM users WHERE users.id = announs.id_user LIMIT 1) AS user_first_name,
                    (SELECT last_name FROM users WHERE users.id = announs.id_user LIMIT 1) AS user_last_name,
                    (SELECT phone FROM users WHERE users.id = announs.id_user LIMIT 1) AS user_phone,
                    (SELECT image FROM users WHERE users.id = announs.id_user LIMIT 1) AS user_image,
                    (SELECT create_at FROM users WHERE users.id = announs.id_user LIMIT 1) AS user_create_at
                    FROM announs WHERE '$target_item' = title_url LIMIT 1");

        foreach ($announ as $value) {
            $announ_id = $value->id;
            $user_at = $value->user_create_at;
            $announ_at = $value->created_at;
        }

        $user_datetime = explode(" ", $user_at);
        $user_date = date("d.m.Y", strtotime($user_datetime[0]));

        $announ_datetime = explode(" ", $announ_at);
        $announ_date = date("d.m.Y", strtotime($announ_datetime[0]));
        $announ_time = date("H:i", strtotime($announ_datetime[1]));

        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $favorite = DB::select("SELECT * FROM favorite WHERE announ_id = $announ_id AND user_id = $user_id LIMIT 1");

            return view("announ", ["announ" => $announ, "favorite" => $favorite], compact("user_date", "announ_date", "announ_time"));
        }

        return view("announ", ["announ" => $announ], compact("user_date", "announ_date", "announ_time"));
    }

    public function favorite()
    {
        $favorite_item = $_POST["favorite"];
        $user_id = Auth::user()->id;

        DB::insert("INSERT INTO favorite (user_id, announ_id) VALUES ($user_id, $favorite_item)");

        return back();
    }
}