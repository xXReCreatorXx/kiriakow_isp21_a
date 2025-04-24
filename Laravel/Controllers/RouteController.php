<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
    public function home() 
    {
        $all_announs = DB::select("SELECT announs.*, 
                (SELECT src FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_src,
                (SELECT alt FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_alt,
                (SELECT id FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_id,
                (SELECT name FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_name,
                (SELECT color FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_color
                FROM announs WHERE status = 1 LIMIT 20");

        $free_announs = DB::select("SELECT announs.*, 
                    (SELECT src FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_src,
                    (SELECT alt FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_alt,
                    (SELECT id FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_id,
                    (SELECT name FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_name,
                    (SELECT color FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_color
                    FROM announs WHERE status = 1 AND announs.price = 0 LIMIT 8");

        $all_tags = DB::select("SELECT * FROM tags");

        return view("home", ["all_announs" => $all_announs, "free_announs" => $free_announs, "all_tags" => $all_tags]);
    }


    public function category()
    {
        $all_tags = DB::select("SELECT * FROM tags");
        
        if (isset($_GET["tag"])) {
            $get_tag = trim($_GET["tag"], "'");

            $target_tag = DB::select("SELECT * FROM tags WHERE '$get_tag' = id");
            foreach ($target_tag as $value) {
                $tag_id = $value->id;
                $tag_name = $value->name;
                $tag_code = $value->code;
                $tag_color = $value->color;
            }

            $target_item = DB::select("SELECT announs.*, 
                        (SELECT src FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_src,
                        (SELECT alt FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_alt,
                        (SELECT id FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_id,
                        (SELECT name FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_name,
                        (SELECT color FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_color
                        FROM announs WHERE status = 1 AND '$get_tag' = id_tag LIMIT 20");
        } else {
            $tag_name = NULL;
            $target_item = DB::select("SELECT announs.*, 
            (SELECT src FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_src,
            (SELECT alt FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_alt,
            (SELECT id FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_id,
            (SELECT name FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_name,
            (SELECT color FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_color
            FROM announs WHERE status = 1 LIMIT 20");
        }

        return view("category", ["all_tags" => $all_tags, "target_item" => $target_item], compact("tag_name"));
    }


    public function free()
    {
        $free_announs = DB::select("SELECT announs.*, 
                    (SELECT src FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_src,
                    (SELECT alt FROM announ_images WHERE announ_images.announ_id = announs.id LIMIT 1) AS image_alt,
                    (SELECT id FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_id,
                    (SELECT name FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_name,
                    (SELECT color FROM tags WHERE tags.id = announs.id_tag LIMIT 1) AS tag_color
                    FROM announs WHERE status = 1 AND announs.price = 0 LIMIT 20");

        $all_tags = DB::select("SELECT * FROM tags");

        return view("free", ["free_announs" => $free_announs, "all_tags" => $all_tags]);
    }
}
