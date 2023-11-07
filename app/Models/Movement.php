<?php

namespace App\Models;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movement extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relacion uno a uno con invoice
    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'invoice_code', 'invoice_code');
    }

    protected static function booted()
    {
        static::created(function ($movement) {
            $account = Account::find($movement->account_id);
            if ($movement->type == 'add') {
                $account->amount += $movement->amount;
            } elseif ($movement->type == 'out') {
                $account->amount -= $movement->amount;
            }
            $account->save();
        });

        // Este bloque de código se ejecuta cada vez que se actualiza un "movement"
        static::updated(function ($movement) {

            // Se obtiene la cuenta asociada al movimiento
            $account = Account::find($movement->account_id);

            // Se obtiene el monto anterior y el tipo de movimiento anterior
            $oldAmount = $movement->getOriginal('amount');
            $oldType = $movement->getOriginal('type');

            // Se obtiene el nuevo monto
            $newAmount = $movement->amount;

            // Se calcula la diferencia entre el nuevo y el antiguo monto
            $difference = $newAmount - $oldAmount;

            // Si el tipo de movimiento es 'add' (agregar)
            if ($movement->type == 'add') {

                // Se actualiza el monto de la cuenta sumando la diferencia
                $account->amount += $difference;

                // Si el tipo de movimiento es 'out' (retirar)
            } elseif ($movement->type == 'out') {

                // Se actualiza el monto de la cuenta restando la diferencia
                $account->amount -= $difference;
            }

            // Si el tipo de movimiento ha cambiado
            if ($movement->type != $oldType) {

                // Si el nuevo tipo de movimiento es 'add' (agregar)
                if ($movement->type == 'add') {

                    // Se actualiza el monto de la cuenta sumando el nuevo monto
                    $account->amount += $movement->amount;

                    // Si el nuevo tipo de movimiento es 'out' (retirar)
                } elseif ($movement->type == 'out') {

                    // Se actualiza el monto de la cuenta restando el nuevo monto
                    $account->amount -= $movement->amount;
                }
            }

            // Se guarda la cuenta actualizada en la base de datos
            $account->save();
        });


        static::deleted(function ($movement) {
            $account = Account::find($movement->account_id);
            if ($movement->type == 'add') {
                $account->amount -= $movement->amount;
            } elseif ($movement->type == 'out') {
                $account->amount += $movement->amount;
            }
            $account->save();
        });
    }
}
