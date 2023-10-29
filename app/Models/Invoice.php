<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['client_id','invoice_date','tax','total','status'];

    public function invoiceDetails(){
        return $this->hasMany(InvoiceDetail::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

}
