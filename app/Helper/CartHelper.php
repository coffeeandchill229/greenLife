<?php

namespace App\Helper;

class CartHelper
{
    public $items = [];
    public $total_price = 0;
    public $total_quantity = 0;
    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->total_quantity = $this->get_total_quantity();
        $this->total_price = $this->get_total_price();
    }

    public function add($product, $quantity = 1)
    {
        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'image' => $product->image,
            'price' => $product->price,
            'stock' => $product->stock,
            'quantity' => $quantity ?? 1,
        ];
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]['quantity'] += 1;
        } else {
            $this->items[$product->id] = $item;
        }
        session(['cart' => $this->items]);
    }
    public function update($data)
    {
        foreach ($data as $key => $value) {
            if (isset($this->items[$key])) {
                $this->items[$key]['quantity'] = $value;
            }
        }
        session(['cart' => $this->items]);
    }

    public function delete($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }
    public function get_total_quantity()
    {
        return count($this->items);
    }
    public function get_total_price()
    {
        $sum = 0;
        foreach ($this->items as $item) {
            $sum += $item['price'] * $item['quantity'];
        }
        return $sum;
    }
    function remove()
    {
        session(['cart' => []]);
    }

    function format_price($num)
    {
        return number_format($num, 0, ',', '.');
    }
}
