<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Scenario extends Model
{
    protected $fillable = ['sensors5G','sensorsNB','sensorsLoRa','Gateaways','FinalCost', 'Energy'];

    //Table Name
    protected $table = 'scenarios';
    //Primary Key
    public $primaryKey = 'id';

}
