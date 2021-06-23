<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 *
 * @property $id
 * @property $id_clientes
 * @property $id_carritos
 * @property $total
 * @property $created_at
 * @property $updated_at
 *
 * @property Carrito $carrito
 * @property Cliente $cliente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Compra extends Model
{
    
    static $rules = [
		'total' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_clientes','id_carritos','total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function carrito()
    {
        return $this->hasOne('App\Models\Carrito', 'id', 'id_carritos');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'id_clientes');
    }
    

}
