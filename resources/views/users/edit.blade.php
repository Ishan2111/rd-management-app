@extends('users.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="background-color: #0d6efd; color: #fff; text-align: center;">Update Customer</h2>
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
            <br>
        </div>
    </div>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Account Number:</strong>
                    <input type="number" name="account_number" class="form-control" placeholder="Account No"
                        value="{{ $user->account_number }}">
                    @error('account_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <strong>First Account Holder Name:</strong>
                    <input type="text" name="acc_holder_name_1" class="form-control" placeholder="Account Holder Name 1"
                        value="{{ $user->acc_holder_name_1 }}">
                    @error('acc_holder_name_1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <strong>First Account Holder CIF:</strong>
                    <input type="text" name="acc_holder_cif_1" class="form-control" placeholder="Account Holder CIF 1"
                        value="{{ $user->acc_holder_cif_1 }}">
                    @error('acc_holder_scif_1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <strong>Second Account Holder Name:</strong>
                    <input type="text" name="acc_holder_name_2" class="form-control" placeholder="Account Holder Name 2"
                        value="{{ $user->acc_holder_name_2 }}">
                    @error('acc_holder_name_2')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <strong>Second Account Holder CIF:</strong>
                    <input type="text" name="acc_holder_cif_2" class="form-control" placeholder="Account Holder CIF 2"
                        value="{{ $user->acc_holder_cif_2 }}">
                    @error('acc_holder_cif_2')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <strong>Family Id:</strong>
                    <input type="text" name="family_id" class="form-control" placeholder="Family Id"
                        value="{{ $user->family_id }}">
                    @error('family_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <strong>Mobile No:</strong>
                    <input type="number" name="mobile" class="form-control" placeholder="Mobile No"
                        value="{{ $user->mobile }}">
                    @error('mobile')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <strong>Address:</strong>
                    <textarea class="form-control" style="height:150px" name="address" placeholder="Address">{{ $user->address }}</textarea>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <strong>Amount:</strong>
                    <input type="number" name="amount" class="form-control" placeholder="Amount"
                        value="{{ $user->amount }}">
                    @error('Amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <strong>Open Date:</strong>
                    <input type="date" id="open_date" name="open_date" class="form-control"
                        value="{{ $user->open_date }}">
                    @error('open_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <strong for="years">Select Years:</strong>
                    <select class="form-control" id="years" name="years">
                        <option selected disabled>Please Select year</option>
                        <option value="5"{{ $user->years == 5 ? 'selected' : '' }}>5 years</option>
                        <option value="10"{{ $user->years == 10 ? 'selected' : '' }}>10 years</option>
                    </select>
                </div>

                <div class="form-group">
                    <strong>Maturity Date:</strong>
                    <input type="date" id="matu_date" name="matu_date" class="form-control"
                        value="{{ $user->matu_date }}">
                    @error('matu_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <strong>Payment Received By:</strong>
                    <input type="text" id="autocomplete-payment" name="payment_reciver_name" class="form-control"
                        placeholder="Payment Received By" value="{{ $user->payment_reciver_name }}">
                    <div id="payment-suggestions"></div>
                    @error('payment_reciver_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <strong for="payment_date">Please Select Date Range:</strong>
                    <select class="form-control" name="payment_date">
                        <option selected disabled>Please Select Date Range</option>
                        <option value="1-15"{{ $user->payment_date == '1-15' ? 'selected' : '' }}>1-15</option>
                        <option value="15-30"{{ $user->payment_date == '15-30' ? 'selected' : '' }}>15-30</option>
                    </select>
                </div>

                <div class="form-group">
                    <strong for="payment_mode">Payment Mode:</strong>
                    <select class="form-control" id="payment_mode" name="payment_type">
                        <option selected disabled>Please Select Payment Mode</option>
                        <option value="sb"{{ $user->payment_type == 'sb' ? 'selected' : '' }}>SB</option>
                        <option value="cash"{{ $user->payment_type == 'cash' ? 'selected' : '' }}>Cash</option>
                    </select>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
{{-- <script src="{{ asset('js/min.js') }}"></script> --}}

<script>
    $(document).ready(function() {

        $('#autocomplete-payment').on('input', function() {
            var query = $(this).val();
            if (query.length > 0) {
                // AJAX request for payment suggestions
                $.ajax({
                    url: "{{ route('autocomplete.payments') }}",
                    method: "GET",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        var suggestions = '';
                        if (data.length > 0) {
                            $.each(data, function(key, value) {
                                suggestions +=
                                    '<div class="suggestion-payment" style="padding: 10px; background-color: #f9f9f9; border: 1px solid #ddd; cursor: pointer;">' +
                                    value + '</div>';
                            });
                        } else {
                            suggestions =
                                '<div class="no-results">No matching payments found</div>';
                        }
                        $('#payment-suggestions').html(suggestions);
                    }
                });
            } else {
                $('#payment-suggestions').html('');
            }
        });

        // Add click event for payment suggestions
        $(document).on('click', '.suggestion-payment', function() {
            $('#autocomplete-payment').val($(this).text());
            $('#payment-suggestions').html('');
        });

        // Calculate maturity date based on selected years
        $('#years').change(function() {
            var selectedYears = parseInt($(this).val());
            var openDate = $('#open_date').val();
            if (!isNaN(selectedYears) && openDate) {
                var date = new Date(openDate);
                date.setFullYear(date.getFullYear() + selectedYears);
                var maturityDate = formatDate(date);
                $('#matu_date').val(maturityDate);
            }
        });

        function formatDate(date) {
            var year = date.getFullYear();
            var month = (date.getMonth() + 1).toString().padStart(2, '0');
            var day = date.getDate().toString().padStart(2, '0');
            return year + '-' + month + '-' + day;
        }

    });
</script>
