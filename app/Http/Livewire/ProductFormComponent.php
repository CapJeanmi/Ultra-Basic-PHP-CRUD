<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductFormComponent extends Component
{
    public $name;
    public $price;
    public $tax;

    public function render()
    {
        /* Validando seccion solo para admins */
        if(!auth()->user()->is_admin){
            redirect("/");
        }

        return view('livewire.product-form-component');
    }


    /* Validando y Creando un nuevo producto */
    public function save()
    {

        $this->validate([
            'name' => 'required',
            'price' => 'required',
            'tax' => 'required',
        ], [
            'required' => __('Es necesario rellenar todos los campos'),
        ]);

      /* Creando un nuevo producto */
      
      $newProduct = Product::create([
        "name" => $this->name,
        "price" => $this->price,
        "tax" => $this->tax
    ]);

    if($newProduct) {
        request()->session()->flash(
            'success',
            'El producto se ha creado correctamente.'
        );
    } else {
        request()->session()->flash(
            'error',
            'El producto no se ha creado.'
        );
    }

    redirect("products");
}

}
