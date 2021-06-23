<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrito
 *
 * @property $id
 * @property $id_clientes
 * @property $total
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Compra[] $compras
 * @property DetalleCar[] $detalleCars
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Carrito extends Model
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
    protected $fillable = ['id_clientes','total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'id_clientes');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compras()
    {
        return $this->hasMany('App\Models\Compra', 'id_carritos', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleCars()
    {
        return $this->hasMany('App\Models\DetalleCar', 'id_carritos', 'id');
    }
    

}
