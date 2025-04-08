<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
   protected ImageUploader $uploader;
   public function __construct(ImageUploader $uploader)
   {
       $this->uploader = $uploader;
   }

   public function create(array $data): Product
   {
       if (isset($data['image'])) {
           $data['image'] = $this->uploader->upload($data['image'], 'products');
       }

       return Product::create($data);
   }

    public function update(Product $product, array $data): void
    {
        if (isset($data['image'])) {
            $this->uploader->delete($product->image);
            $data['image'] = $this->uploader->upload($data['image'], 'products');
        }

        $product->update($data);
    }

    public function delete(Product $product): void
    {
        $this->uploader->delete($product->image);
        $product->delete();
    }
}
