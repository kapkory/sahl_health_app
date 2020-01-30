@extends('layouts.admin')
@section('title','View Visit')
@section('content')

    @push('scripts')
        <link rel="stylesheet" href="{{ url('sahl/assets') }}/css/owl.carousel.css">
        <link rel="stylesheet" href="{{ url('sahl/assets') }}/css/owl.theme.default.css">

    @endpush

     <b>{{ $name }}</b> Visited <b><u>{{ @$visit->institution->name }}</u></b>

  <div class="row">
      <div class="col-md-8">
          <div class="jumbotron">
              <h3><span class="text-muted">Total Bill is:</span>  KES {{ @number_format($visit->amount,2) }}</h3>
              <?php $discounted_amount = ($visit->amount * $institution->discount) / 100 ?>
              <h3><span class="text-muted">Total Discount is:</span>  {{ @number_format($discounted_amount,2) }}</h3>
              <h3><span class="text-muted">Bill Paid:</span>  {{ @number_format($visit->amount-$discounted_amount ,2) }}</h3>
              <h3> Day Visited:  <span class="text-muted">{{ $visit->created_at->toDateTimeString() }}</span></h3>
             <h4>Served in Timely Manner : <span class="text-muted">{{ @$visit->getRating()[0]->time }}</span></h4>
             <h4>How was the Service : <span class="text-muted">{{ @$visit->getRating()[0]->service  }}</span></h4>
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

      <div class="col-md-4">
          @if($visit->hasRated())
          <div class="alert alert-secondary">
              <p class="text-center">Thank you for visiting <u>{{ $visit->institution->name }}</u>, Please Rate your Visit and Confirm Feedback</p>
          </div>
          <button data-toggle="modal" data-target="#myModal" class="btn btn-primary" style="color: white;background-color: orangered; border-color: orangered">Rate your Visit</button>
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
                         <input type="hidden" name="time_rating">
                         <input type="hidden" name="service_rating">
                         @csrf
                         <div class="form-group mt-2">
                             <label for="exampleFormControlTextarea1">Feedback</label>
                             <textarea name="feedback" placeholder="Describe your Experience (optional)" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                         </div>


                      <div class="row">
                          <div class="col-md-11 mx-1">
                              <h4 class="text-muted">Tell us more(optional)</h4>
                              <div class="testimonial-carousel">
                                  <div class="owl-carousel owl-theme owl-testimonial">
                                      <div class="item jumbotron p-3">
                                          <!-- testimonial start  -->
                                          <div class="testimonial-block">
                                              <div class="testimonial-content">
                                                  <div class="testimonial-content-text">
                                                      <h3>Were you served in a timely way?</h3>
                                                  </div>
                                                  <a class="btn btn-outline-dark time" data-text="No" href="javascript:void(0)">No</a>
                                                  <a class="btn btn-outline-dark time" data-text="Not, Sure" href="javascript:void(0)">Not, Sure</a>
                                                  <a class="btn btn-outline-dark time" data-text="Yes" href="javascript:void(0)">Yes</a>
                                              </div>
                                          </div>
                                          <!-- testimonial close  -->
                                      </div>
                                      <div class="item jumbotron p-3">
                                          <!-- testimonial start  -->
                                          <div class="testimonial-block">
                                              <div class="testimonial-content">
                                                  <div class="testimonial-content-text">
                                                      <h3>How was the service</h3>
                                                  </div>
                                                  <a class="btn btn-outline-dark service_rating" data-text="Bad" href="javascript:void(0)">Bad</a>
                                                  <a class="btn btn-outline-dark service_rating" data-text="Not, Sure" href="javascript:void(0)">Not, Sure</a>
                                                  <a class="btn btn-outline-dark service_rating" data-text="Yes" href="javascript:void(0)">Great</a>
                                              </div>
                                          </div>
                                          <!-- testimonial close  -->
                                      </div>


                                  </div>
                              </div>
                          </div>


                      </div>
                        <div class="text-center">
                            <input type="submit" value="Submit Ratings" name="submit" class="btn btn-primary submit-btn">

                        </div>
                     </form>
                 </div>

             </div>
         </div>
     </div>

<script>
    $(function () {

        $("#rateYo").rateYo({
            fullStar: true,
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

    if ($('.owl-testimonial').length) {

        $('.owl-testimonial').owlCarousel({

            loop: false,
            stagePadding: 50,
            margin:20,
            nav: true,
            autoplay: false,
            autoplayTimeout: 5000,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });

    }

    $('.time').click(function () {
        $('.time').removeClass('active');
        $('input[name="time_rating"]').val($(this).data('text'));
        $(this).addClass('active')
    });

    $('.service_rating').click(function () {
        $('.service_rating').removeClass('active');
        $('input[name="service_rating"]').val($(this).data('text'));
        $(this).addClass('active')
    });

    @isset($_GET['rating'])
        console.log('failed');
        $(function () {
            $('#myModal').modal('show');
        })

         @endisset

</script>
@endsection
