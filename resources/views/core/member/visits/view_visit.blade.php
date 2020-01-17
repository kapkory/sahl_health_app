@extends('layouts.admin')
@section('title','View Visit')
@section('content')

     <b>{{ $name }}</b> Visited <b>{{ @$visit->institution->name }}</b>

  <div class="row">
      <div class="col-md-8">
          <div class="jumbotron">
              <h3><span class="text-muted">Total Bill is:</span>  KES {{ @number_format($visit->amount,2) }}</h3>
              <?php $discounted_amount = ($visit->amount * $institution->discount) / 100 ?>
              <h3><span class="text-muted">Total Discount is:</span>  {{ @number_format($discounted_amount,2) }}</h3>
              <h3><span class="text-muted">Bill Paid:</span>  {{ @number_format($visit->amount-$discounted_amount ,2) }}</h3>
              <h3> Day Visited:  <span class="text-muted">{{ $visit->created_at->toDateTimeString() }}</span></h3>
          </div>
      </div>

      <div class="col-md-4">
          @if($visit->hasRated())
          <div class="alert alert-secondary">
              <p class="text-center">Thank you for visiting <u>{{ $visit->institution->name }}</u>, Please Rate your Visit and Confirm Feedback</p>
          </div>
          <button data-toggle="modal" data-target="#myModal" class="btn btn-primary" style="color: white;background-color: orangered; border-color: orangered">Submit Ratings</button>
          @endif
      </div>
  </div>


     <!-- The Modal -->
     <div class="modal" id="myModal">
         <div class="modal-dialog">
             <div class="modal-content">

                 <!-- Modal Header -->
                 <div class="modal-header">
                     <h4 class="modal-title">Rate Hospital Visit</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>

                 <!-- Modal body -->
                 <div class="modal-body">
                     <form method="post" action="{{ url('member/visits/visit/'.$visit->id.'/rate-visit') }}">
                         <div class="rating_counter"></div>

                         <div id="rateYo">

                         </div>
                         <input type="hidden" name="rating">
                         @csrf
                         <div class="form-group mt-2">
                             <label for="exampleFormControlTextarea1">Feedback</label>
                             <textarea name="feedback" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                         </div>

                         <input type="submit" value="Submit Feedback" name="submit" class="btn btn-primary submit-btn">
                     </form>
                 </div>

                 <!-- Modal footer -->
                 <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                 </div>

             </div>
         </div>
     </div>

<script>
    $(function () {

        $("#rateYo").rateYo({

            onChange: function (rating, rateYoInstance) {
                let rate = $('.rating_counter');
               if (rating < 1)
                   $(rate).text('Service was Bad '+rating);
               else if (rating <= 2)
                   $(rate).text('Below Average '+rating);
               else if (rating <= 3)
                   $(rate).text('Average '+rating);
               else if (rating <= 4)
                   $(rate).text('It was Great '+rating);
               else
                   $(rate).text('I will visit again '+rating);

            },
            onSet:function (rating) {
             $('input[name="rating"]').val(rating);
            }
        });
    });
</script>
@endsection
