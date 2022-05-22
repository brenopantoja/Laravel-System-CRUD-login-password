<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    //It has taking in array form the data
    protected $casts= [      
          'items'=> 'array'
];
    //It has underting that Base Date has a field new.
    protected $date =['date'];


    protected $guarded= [];  //This method does the value has to send void, in to aim the update

    public function user(){
        return $this-> belongsTo('App\Models\User');
        
    }
    //Data base with relation many to many
    public function users(){
        return $this-> belongsToMany('App\Models\User');


    }

}
