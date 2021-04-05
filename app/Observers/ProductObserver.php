<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    public function creating(Product $product)
    {
        $product->flag = Str::kebab($product->title);
        $product->uuid = Str::uuid();
    }

    public function updating(Product $product)
    {
        $product->flag = Str::kebab($product->title);
    }
}
