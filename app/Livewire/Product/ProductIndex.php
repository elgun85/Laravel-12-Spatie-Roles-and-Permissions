<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class ProductIndex extends Component
{
    public $status = 'active';

    public function render()
    {
        $product=Product::paginate(10);
        return view('livewire.product.product-index',compact('product'));
    }

    public function toggleStatus($dataId)
    {
        $data = Product::find($dataId);
    
        if ($data) {
            $data->status = $data->status === 'active' ? 'passive' : 'active';
            $data->save();
        }
    }
    
    public function delete($id)
    {
        try {
            $data = Product::find($id);
            if ($data) {
                $data->delete();
                flash()->success('data deleted successfully.');
            } else {
                flash()->error('data not found.');
            }
        } catch (\Exception $e) {
            flash()->error('Error deleting data: ' . $e->getMessage());
        }
    }
}
