<?php

namespace App\Models;

class Listing{
    public static function all(){
        return [
            [
                'id'=>1,
                'title'=>'Listing One',
                'description'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, culpa voluptatem. 
                                Ipsam, commodi ratione, quas quis error animi sit tempore, explicabo velit inventore dignissimos? 
                                Aliquam recusandae explicabo aspernatur ipsa numquam?'
            ],
            [
                'id'=>2,
                'title'=>'Listing Two',
                'description'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, culpa voluptatem. 
                                Ipsam, commodi ratione, quas quis error animi sit tempore, explicabo velit inventore dignissimos? 
                                Aliquam recusandae explicabo aspernatur ipsa numquam?'
            ]
        ];
    }

    public static function find($id){
        $listings=self::all();

        foreach($listings as $listing){
            if($listing['id']==$id){
                return $listing;
            }
        }
    }
}