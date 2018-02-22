<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  // protected $table = 'products';
  // protected $id = "id";

  protected $fillable = [
      'nInvoice', 'category_id', 'initials', 'supplier_id', 'checkin',
      'quantity', 'unit_id', 'priceList', 'cost','description', 'stock',
      'priceSales1', 'priceSales2', 'priceSales3', 'priceSales4',
      'priceSales5', 'coin_id',
  ];

  public function category()
  {
    return $this->belongsTo('App\Category');
  }

  public function supplier()
  {
    return $this->belongsTo('App\Suppliers');
  }

  public function unit()
  {
    return $this->belongsTo('App\Units');
  }

  public function coin()
  {
    return $this->belongsTo('App\Coins');
  }
}
