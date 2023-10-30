<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['client_id','create_date','due_date','tax','total','status','invoice_code'];

    public function invoiceDetails(){
        return $this->hasMany(InvoiceDetail::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($invoice) {
            $latestInvoice = self::latest('invoice_code')->first();

            if ($latestInvoice) {
                $latestInvoiceCode = $latestInvoice->invoice_code;
                $parts = explode('-', $latestInvoiceCode);
                $number = intval(end($parts));
                $invoice->invoice_code = $parts[0] . '-' . ($number + 1);
            } else {
                $invoice->invoice_code = 'F001-1';
            }
        });
    }

}
