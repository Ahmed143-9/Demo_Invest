<div class="container">
    <h2 class="text-center mb-4">Product Price List</h2>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>SKU</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->category->name ?? 'Uncategorized' }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>
                            @if($product->stock > 0)
                                <span class="badge bg-success">In Stock</span>
                            @else
                                <span class="badge bg-danger">Out of Stock</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($products->isEmpty())
        <div class="alert alert-info text-center">
            No products available at the moment.
        </div>
    @endif

    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
