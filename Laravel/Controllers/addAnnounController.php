<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class addAnnounController extends Controller
{
    public function addannoun()
    {
        $tags = DB::select("SELECT * FROM tags");
        
        return view("addannoun", ["tags" => $tags]);
    }

    public function add(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:200",
            "description" => "required|string|max:1000",
            "price" => "required|numeric|max:1000000000",
            "image" => "required|file|max:3000"
        ]);

        $user = Auth::user()->id;

        $DB_id = DB::select("SELECT id FROM announs ORDER BY id DESC LIMIT 1");
        foreach($DB_id as $value) {
            $last_id = $value->id + 1;
        }

        $announ_name = $request->name;
        $announ_url = str_replace(" ", "_", $announ_name) . "_$last_id";
        $announ_description = $request->description;
        $announ_price = $request->price;
        $announ_category = $request->categoty;

        DB::insert("INSERT INTO announs (id, status, id_user, title, title_url, description, price, id_tag) 
                                VALUES ($last_id, 2, $user, '$announ_name', '$announ_url', '$announ_description', $announ_price, $announ_category)");

        if ($request->hasFile("image")) {
            $announ_image = $request->file("image");
            $announ_image->move(public_path() . "/file/imgAnnoun", "$announ_url.webp");
            $image_url = "http://tablenote.com/file/imgAnnoun/" . "$announ_url.webp";

            DB::insert("INSERT INTO announ_images (announ_id, src, alt) 
                                    VALUES ($last_id, '$image_url', '$announ_name')");
        }

        return redirect()->route("myannoun");
    }
}
