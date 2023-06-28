<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    protected $table = 'carts';
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    use HasApiTokens, HasFactory, Notifiable;

  
    public function __construct($oldCart)
    {
        if (is_object($oldCart) ) {
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
        }
    }
    // check error of function _construct ?
    public function add($item, $id)
    {
        $stotedItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $stotedItem = $this->items[$id];
            }
        }   
        $stotedItem['quantity']++;
        $stotedItem['price'] = $item->price * $stotedItem['quantity'];
        $this->items[$id] = $stotedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }
    protected $fillable = [
        'id_product',
        'name',
        'price',
        'quantity',
        'image',
    ];

    public function getDetail($id)
    {
        $getDetail = DB::table($this->table)
            ->where('id', $id)
            ->get();
        return $getDetail;
    }
}
