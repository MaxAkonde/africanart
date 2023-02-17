@extends('layouts.user')

@section('extra-css')
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Liste de vos commandes</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Liste de vos commandes</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>N° Commande</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Montant</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @forelse ($orders as $item)
                            <tr>
                                <td class="align-middle">{{ $item->pincode }}</td>
                                <td class="align-middle">{{ $item->created_at->format('j F, Y') }}</td>
                                <td class="align-middle">
                                    @if ($item->status == 0)
                                        <span class="badge badge-pill badge-info">En cours</span>
                                    @endif
                                    @if ($item->status == 1)
                                        <span class="badge badge-pill badge-success">Valider</span>
                                    @endif
                                    @if ($item->status == 2)
                                        <span class="badge badge-pill badge-danger">Annuler</span>
                                    @endif
                                </td>
                                <td class="align-middle">{{ getPrice($item->amount) }}</td>

                                <td class="align-middle">
                                    <a href="{{ route('confirmation', $item->pincode) }}" target="_blank"
                                        class="btn btn-sm btn-outline-primary" title="Voir les détails">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="#" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Annuler" class="btn btn-sm btn-outline-primary"><i
                                                class="fas fa-window-close"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <h2 class="text-center">Vous n'avez pas encore effectuer de commandes.</h2>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection


@section('extra-js')
@endsection
