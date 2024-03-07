@extends('users.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="background-color: #0d6efd; color: #fff; text-align: center;">Customer Data</h2>
            </div>
            <div class="pull-right">
                <br>
                <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="row mt-4 justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 style="text-align: center;">Customer Details</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Account Number:</strong> {{ $user->account_number }}</li>
                        <li class="list-group-item"><strong>First Account Holder Name:</strong>
                            {{ $user->acc_holder_name_1 }}</li>
                        <li class="list-group-item"><strong>First Account Holder CIF:</strong>
                            {{ $user->acc_holder_cif_1 }}</li>
                        <li class="list-group-item"><strong>Second Account Holder Name:</strong>
                            {{ $user->acc_holder_name_2 }}</li>
                        <li class="list-group-item"><strong>Second Account Holder CIF:</strong>
                            {{ $user->acc_holder_cif_2 }}</li>
                        <li class="list-group-item"><strong>Amount:</strong>
                            {{ $user->amount }}</li>
                        <li class="list-group-item"><strong>Mobile Number:</strong>
                            {{ $user->mobile }}</li>
                        <li class="list-group-item"><strong>Open Date:</strong>
                            {{ $user->open_date }}</li>
                        <li class="list-group-item"><strong>Maturity Date:</strong>
                            {{ $user->matu_date }}</li>
                        <li class="list-group-item"><strong>Family Id:</strong>
                            {{ $user->family_id }}</li>
                        <li class="list-group-item"><strong>Payment Received By:</strong>
                            {{ $user->payment_reciver_name }}</li>
                        <li class="list-group-item"><strong>Payment Type:</strong>
                            {{ $user->payment_type }}</li>
                        <li class="list-group-item"><strong>Address:</strong>
                            {{ $user->address }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
