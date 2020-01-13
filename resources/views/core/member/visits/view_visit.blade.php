@extends('layouts.admin')
@section('title','View Visit')
@section('content')
    Visited By <b>{{ $name }}</b>

    <div class="col-md-8">
        <div class="jumbotron">
            <h3>Total Bill is:  KES {{ $visit->amount }}</h3>
            <?php $discounted_amount = ($visit->amount * $institution->discount) / 100 ?>
            <h3>Total Discount is:  {{ $discounted_amount }}</h3>
            <h3>Bill to Pay:  {{ $visit->amount-$discounted_amount }}</h3>
        </div>
    </div>


@endsection
