@extends('layouts.admin')
@section('title','View Visit')
@section('content')
    Visited By <b>{{ $name }}</b>

    <div class="col-md-6 mt-4" >
        <form class="ajax-post" method="post" action="{{ url('provider/search/confirm-bill/'.$visit->id) }}">
            <div class="form-group total_bill_form">
                <label for="inputBill">Total Bill</label>
                <input type="text" name="total_bill" class="form-control" id="inputBill" aria-describedby="emailHelp" placeholder="Enter Total Bill">
            </div>
            @csrf
            <div class="jumbotron">
                <h3>Total Bill is <span id="total_bill"></span></h3>
                <h3>Total Discount is <span id="calculated_discount"></span></h3>
                <h3>Bill to Pay <span id="total_discounted_bill"></span></h3>
            </div>
            <div class="form-group total_bill_form">
                <button type="submit" class="btn btn-primary ">Confirm Bill</button>
            </div>
        </form>
    </div>

@php
    $discount = ($visit->amount * $institution->discount) / 100;

@endphp

    <script>
        $('input[name="total_bill"]').on('input',function () {
          let bill = $('input[name="total_bill"]').val();
          let discount = "{{ $institution->discount }}";
            let calculated_discount = 0;
            let payable_bill = 0;
            if(discount > 0 && bill >0){
                calculated_discount = (bill * discount) / 100;
                payable_bill = bill - calculated_discount;
                $('#total_bill').text(bill);
                $('#calculated_discount').text(calculated_discount);
                $('#total_discounted_bill').text(payable_bill);
          }
        })

        @if($visit->amount > 0)
        $('#total_bill').text("{{ $visit->amount }}");
        $('#calculated_discount').text("{{ $discount }}");
        $('#total_discounted_bill').text("{{ $visit->amount- $discount }}");

        $('.total_bill_form').hide();
        @endif
    </script>
    @endsection
