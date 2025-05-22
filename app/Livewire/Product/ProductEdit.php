<?php

namespace App\Livewire\Product;
use App\Models\Product;

use Livewire\Component;

class ProductEdit extends Component
{
    
    public $name;
    public $details;
    public $id;

    public function mount($id)
    {
        $product = Product::find($id);
        if ($product) {
            $this->id = $id;
            $this->name = $product->name;
            $this->details = $product->details;
        }
    }
    public function rules()
    {
        return [
            'name' => 'string|max:255',
            'details' => 'string|max:255',
        ];
    }
    public function save()
    {
        try {
            $this->validate($this->rules());
            $product = Product::find($this->id);
            if ($product) {
                $product->name = $this->name;
                $product->details = $this->details;
                $product->save();
                $this->reset('name', 'details');
                flash()->success('Product updated successfully.');
            } else {
                flash()->error('Product not found.');
            }
        } catch (\Exception $e) {
            flash()->error('Error updating product: ' . $e->getMessage());
        }
        return redirect()->route('product.index');
    }


    public function render()
    {
        return view('livewire.product.product-edit');
    }
}
