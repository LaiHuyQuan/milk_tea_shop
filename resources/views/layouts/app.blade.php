<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div id="wrapper">
        <div class="side-bar">
            <div class="logo center">
                <h1 style="color: white">Milk Tea Store</h1>
            </div>

            <div class="navigation">
                <ul class="nav">
                    @foreach ($stores as $item)
                        <li class="nav-item">
                            <a class="center {{ Request::is('store/' . $item->id) ? 'active' : '' }}"
                                href="{{ route('store', ['id' => $item->id]) }}" data-id='{{ $item->id }}'>Store
                                {{ $item->id }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="fake-side"></div>
        <div class="content">
            <div class="content-hd center">
                <p style="color: rgb(39, 48, 83); font-size: 40px; font-weight:900">Store Menu</p>
            </div>
            <div class="content-main center">
                <div class="main-cnt-top">
                    <div class="filter-btn">Filter</div>
                    <div class="sort">
                        <label for="" style="font-weight: 700; color: rgb(39, 48, 83);  ">Sort By</label>
                        <select name="selected" id="sort-option">
                            <option value="name" selected>Name</option>
                            <option value="price">Price</option>
                        </select>
                    </div>
                </div>

                <div class="filter-cnt">
                    <p style="font-weight: 600; text-align: left; margin: 10px">Toppings</p>
                    <div class="form-check">
                        @foreach ($toppings as $topping)
                            <div class="option">
                                <input class="form-check-input" type="checkbox" value="{{ $topping->id }}"
                                    id="{{ $topping->id }}" style="scale: 2" />
                                <label class="form-check-label" for="{{ $topping->id }}"> {{ $topping->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="main-cnt-bot">
                    @yield('content')
                </div>

            </div>
        </div>
    </div>
</body>

</html>
