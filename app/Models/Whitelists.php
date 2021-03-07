<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whitelists extends Model
{
    use HasFactory;


   protected $fillable = [
       'email',
       'fullname',
       'fivemHours',
       'steamName',
       'story',
       'status'
   ];


}
