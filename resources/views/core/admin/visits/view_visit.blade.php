@extends('layouts.admin')
@section('title','View Visit')
@section('content')
     <b>{{ $name }}</b> Visited <b>{{ @$visit->institution->name }}</b>

    <div class="col-md-8">
        <div class="jumbotron">
            <h3><span class="text-muted">Total Bill is:</span>  KES {{ @number_format($visit->amount,2) }}</h3>
            <?php $discounted_amount = ($visit->amount * $institution->discount) / 100 ?>
            <h3><span class="text-muted">Total Discount is:</span>  {{ @number_format($discounted_amount,2) }}</h3>
            <h3><span class="text-muted">Bill Paid:</span>  {{ @number_format($visit->amount-$discounted_amount ,2) }}</h3>
            <h3> Day Visited:  <span class="text-muted">{{ $visit->created_at->toDateTimeString() }}</span></h3>
            @if($visit->getRating())
            <h3><span class="text-muted">Rating:</span><span id="rateYo"></span></h3>
               <h3>Comments</h3>
               <p class="text-info">{{ @$visit->getRating()[0]->comments }}</p>

                <script>
                    $(function () {

                        $("#rateYo").rateYo({
                            rating: "{{ @$visit->getRating()[0]->rating }}",
                            readOnly: true
                        });

                    });
                </script>
               @endif
        </div>
    </div>


@endsection
