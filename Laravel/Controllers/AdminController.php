<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminConsid()
    {
        $сonsid_announ = DB::select("SELECT announs.*, 
                (SELECT src FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_src,
                (SELECT alt FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_alt,
                (SELECT id FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_id,
                (SELECT name FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_name,
                (SELECT color FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_color
                FROM announs WHERE status = 2 LIMIT 20");

        return view("admin-consid", ["сonsid_announ" => $сonsid_announ]);
    }

    public function adminApprov()
    {
        $approv_announ = DB::select("SELECT announs.*, 
                (SELECT src FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_src,
                (SELECT alt FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_alt,
                (SELECT id FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_id,
                (SELECT name FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_name,
                (SELECT color FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_color
                FROM announs WHERE status = 1 LIMIT 20");

        return view("admin-approv", ["approv_announ" => $approv_announ]);
    }

    public function adminReject()
    {
        $reject_announ = DB::select("SELECT announs.*, 
                (SELECT src FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_src,
                (SELECT alt FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_alt,
                (SELECT id FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_id,
                (SELECT name FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_name,
                (SELECT color FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_color
                FROM announs WHERE status = 0 LIMIT 20");

        return view("admin-reject", ["reject_announ" => $reject_announ]);
    }

    public function approv(Request $request)
    {
        $user = Auth::user()->status;
        $announ = $request->approv;

        if($user == 0) {
            DB::update("UPDATE announs SET status = 1 WHERE id = $announ");
        }

        return redirect()->route("consid");
    }

    public function reject(Request $request)
    {
        $user = Auth::user()->status;
        $announ = $request->reject;

        if($user == 0) {
            DB::update("UPDATE announs SET status = 0 WHERE id = $announ");
        }

        return redirect()->route("consid");
    }
}
