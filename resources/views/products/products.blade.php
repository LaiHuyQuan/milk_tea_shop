@foreach ($products as $product)
    <div class="product-item">
        <div class="pro-top">
            <p>MT-{{ $product->id }}</p>
            <p style="font-weight: 600">{{ $product->name }}</p>
        </div>

        <div class="pro-bot">
            <p style="font-weight: 600">Toppings</p>
            <p>
                @foreach ($product->toppings as $index => $topping)
                    {{ $topping->name }}@if ($index < count($product->toppings) - 1)
                        ,
                    @endif
                @endforeach
            </p>
            <div class="pro-price"> ${{ $product->price }}</div>
        </div>
    </div>
@endforeach
