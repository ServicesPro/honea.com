@extends('layouts.dash')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Honea</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('profile', ['id' => Auth::user()->id]) }}">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="breadcrumb-item active">Commandes</li>
                    </ol>
                </div>
                <h4 class="page-title">Commandes</h4>
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Commandes</h4>
                    <p class="text-muted mb-2 font-13">
                        Liste de toutes les commandes.
                    </p>

                    <a href="{{ route('users.orders', ['id'=>Auth::user()->id]) }}" class="btn btn-primary mb-3 pl-4 pr-4">Retour</a>

                    <div class="row">
                        @foreach ($items as $item)
                        <div class="col-lg-3">
                            <div class="card e-co-product">
                                <a href="">
                                    <img src="{{ asset("storage/$item->cover_img") }}" alt="{{ $item->name }}" class="img-fluid">
                                </a>
                                <div class="card-body product-info">
                                    <a href="" class="product-title">{{ $item->name }}</a>
                                    <div class="d-flex justify-content-between my-2">
                                        <p class="product-price">{{ $item->price }} F CFA</p>                                    </div>
                                    </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
