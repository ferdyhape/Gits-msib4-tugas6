@extends('layouts.user_side.master')
@section('title', 'SayonaraSHOP')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            @foreach ($products as $product)
                <div class="col-3 my-3">
                    <div class="card shadow border-0 text-black ">
                        @if ($product->id <= 8)
                            {{-- this is fore dummy image (product with seeder) --}}
                            <img src="{{ $product->image }}" class="card-img-top" alt="...">
                        @else
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <div class="text-start">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                {{--  <p class="text-muted mb-4">Apple pro display XDR</p>  --}}
                            </div>
                            <div>

                                <div class="d-flex justify-content-between" style="height: 50px">
                                    <span>{{ $product->description }}</span>
                                </div>

                            </div>
                            <div class="d-flex justify-content-between font-weight-bold mt-2">
                                <span class="text-muted">{{ $product->category->name }}</span>
                                <span>@toRP($product->price)</span>
                            </div>
                            <div class="font-weight-bold mt-3 text-primary">
                                <form action="{{ url('toCart') }}" class="d-flex justify-content-between" method="POST">
                                    @csrf
                                    <div class="input-group input-group-sm " style="width:25%">
                                        <input type="number" class="form-control rounded" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" name="qty" value="1">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    </div>
                                    <button type="submit" class="border-0 bg-transparent text-primary "><i
                                            class="bi fs-4 bi-cart-plus-fill cart-icon"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
