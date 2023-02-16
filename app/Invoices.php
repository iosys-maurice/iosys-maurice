<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Invoicedetails;

class Invoices extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Invoicedetails');
    }
}
