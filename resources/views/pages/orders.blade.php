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
                    <p class="text-muted mb-4 font-13">
                        Liste de toutes les commandes.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>N° Commande</th>
                            <th>Articles</th>
                            <th>Total</th>
                            <th>Statut</th>
                            <th>Payé</th>
                            <th>Adresse de livraison</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                            @forelse ($items as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->item_count }}</td>
                                    <td>{{ $item->grand_total }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        @if ($item->is_paid)
                                            <span class="badge badge-soft-success">Payé</span>
                                        @else
                                            <span class="badge badge-soft-warning">Non payé</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->shipping_address }}</td>
                                    <td>
                                        <form action="{{ route('users.orders_delete', ['order'=>$item, 'id'=>Auth::user()->id]) }}" method="POST">
                                            @csrf
                                            <a href="{{ route('users.orders_show', ['order'=>$item, 'id'=>Auth::user()->id]) }}"><i class="far fa-eye text-info mr-1"></i></a>
                                            <a onclick="event.preventDefault(); this.closestForm().submit();" href="{{ route('users.orders_delete', ['order'=>$item, 'id'=>Auth::user()->id]) }}"><i class="far fa-trash-alt text-danger"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
