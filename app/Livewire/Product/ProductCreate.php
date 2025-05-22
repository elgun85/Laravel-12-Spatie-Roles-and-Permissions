<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class ProductCreate extends Component
{
    public $name;
    public $details;

    protected $rules = [
        'name' => 'required|string|max:255',
        'details' => 'required|string|max:1000',
    ];
    public function save()
    {
              try {
            $this->validate();
            Product::create([
                'name' => $this->name,
                'details' => $this->details,
            ]);
            $this->reset('name', 'details');
            flash()->success('Product created successfully.');
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            flash()->error( 'Error creating product: ' . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.product.product-create');
    }
}
