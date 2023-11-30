<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Nos <span>produits</span>
            </h2>
        </div>
        <div class="row">
            @foreach ($product as $products )


            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{url('details',$products->id)}}" class="option1">
                                Plus de détails
                            </a>
                            <form action="{{url('add_cart',$products->id)}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="rounded rounded-5" style="width: 100px;" type="number" name="quantity" id="" value="1" min="1">
                                    </div>
                                    <div class="col-md-4">
                                        <input class="rounded rounded-5" type="submit" value="Acheter">
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="/product/{{$products->image}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{$products->title}}
                        </h5>
                        @if ($products->discount_price!=null)
                        <h6 style="text-decoration: line-through; color:blue;">
                            Prix
                            <br>
                            {{$products->price}} FCFA
                        </h6>
                        <h6 style="color:red">
                            Discount price
                            <br>
                            {{$products->discount_price}} FCFA
                        </h6>

                        @else
                        <h6 style="color: blue;">
                            Prix
                            <br>
                            {{$products->price}} FCFA
                        </h6>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            <span style="padding-top: 20px;">
                {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
            </span>
        </div>




    </div>
</section>