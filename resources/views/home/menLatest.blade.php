<section class="section" id="men">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>New Collection</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                    <br>
                    
                    <form action="{{url('view_products')}}">
                        <button class="btn btn-black" style="background: gray" type="submit">Discover more</button>
                    </form>
                    {{-- <a class="btn btn-black" href="{{url('view_products')}}">Discover more</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        @foreach($products as $product)
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="{{url('singleProduct',$product->id)}}"><i class="fa fa-eye"></i></a></li>
                                        <li><a href=""><i class="fa fa-star"></i></a></li>
                                        <li><a href="{{url('singleProduct',$product->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <img src="/products/{{$product->image1}}" alt="image not found">
                            </div>
                            <div class="down-content">
                                <h4>{{$product->title}}</h4>
                                @if($product->price_with_discount != null)
                            <h5>Price after discount {{$product->discount_rate}}: </h5>
                            <h5>${{$product->price_with_discount}}</h5>
                            <br>
                            <h5 style="text-decoration: line-through; color:red;"> Price: ${{$product->price}}</h5>
                            @else
                            <h5> Price: ${{$product->price}}</h5>
                            @endif
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        
                        @endforeach
                       
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>