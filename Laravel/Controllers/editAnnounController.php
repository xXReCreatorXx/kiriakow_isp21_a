<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class editAnnounController extends Controller
{
    public function editannoun()
    {
        $user = Auth::user()->id;
        $target_item = $_GET["item"];

        $tags = DB::select("SELECT * FROM tags");

        $announ = DB::select("SELECT announs.*, 
                (SELECT src FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_src,
                (SELECT alt FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_alt,
                (SELECT id FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_id,
                (SELECT name FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_name,
                (SELECT color FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_color
                FROM announs WHERE status = 1 AND title_url = '$target_item' AND id_user = $user LIMIT 1");

        return view("editannoun", ["announ" => $announ, "tags" => $tags]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:1000",
            "description" => "required|string|max:1000",
            "price" => "required|numeric|max:10",
            "image" => "file|max:3000"
        ]);

        $announ_id = $request->id;
        
        $announ_name = $request->name;
        $announ_url = str_replace(" ", "_", $announ_name) . "_$announ_id";
        $announ_description = $request->description;
        $announ_price = $request->price;
        $announ_category = $request->categoty;

        DB::update("UPDATE announs SET title = '$announ_name', 
                                       title_url = '$announ_url', 
                                       description = '$announ_description', 
                                       price = $announ_price, 
                                       id_tag = $announ_category
                                   WHERE id = $announ_id");

        if ($request->hasFile("image")) {
            $announ_image = $request->file("image");
            $announ_image->move(public_path() . "/file/imgAnnoun", "$announ_url.webp");
            $image_url = "http://tablenote.com/file/imgAnnoun/" . "$announ_url.webp";

            DB::update("UPDATE announ_images SET src = '$image_url', 
                                                 alt = '$announ_name' 
                                             WHERE announ_id = $announ_id");
        }

        return redirect()->route("myannoun");
    }
}
