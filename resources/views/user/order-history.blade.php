@extends('layouts.menu')
@section('title', 'Order History')

@section('contetn')
    <style>
        .order-image img{
            width: 50px;
        }
    </style>
    <div class="col-md-6">
        <p class="fw-bold ">Order History</p>
        <hr>

        @foreach($order_history as $key => $value)
        <div class="card mt-2">
            <div class="card-header fw-bold bg-success text-white">
                Order: #SN45215
                <span class="float-end"> @if($value->status == 'Deleverd')
                    <i class="far fa-check-circle text-white fw-bold"></i> {{ $value->status }}
                @else
                {{ $value->status }}
                @endif</span>
            </div>
            <div class="card-body ">
                <div class="order-image d-flex">
                    <img class="image" src="https://cdn.dxomark.com/wp-content/uploads/medias/post-98860/Oppo-Reno6-Pro-5G-featured-image-packshot-review-Recovered-Recovered-Recovered.jpg" alt="image">
                    <span class="w-100">Product Name: {{ $value->product_name }}</span>
                    <span class="w-75">Name: {{ $value->user_name }}</span>
                    <span class="w-50">quantity: {{ $value->product_quantity }}</span>
                </div>
                
            </div>
        </div>
        @endforeach
        
    </div>

@endsection