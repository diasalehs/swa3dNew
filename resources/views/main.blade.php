@extends('layouts.master')
@section('title')
  Swa3ed

@endsection
@section('styles')

<link href="{{ URL::asset('vendor/css/style.css')}}" rel="stylesheet">
<link href="{{ URL::asset('vendor/css/custom.css')}}" rel="stylesheet">
<link href="{{ URL::asset('vendor/css/demo.css')}}" rel="stylesheet">
<link href="{{ URL::asset('vendor/css/slider.css')}}" rel="stylesheet">
<noscript>
<link href="{{ URL::asset('vendor/css/styleNoJS.css')}}" rel="stylesheet">
</noscript>




@endsection
@section('content')

<header  style="height: 90vh;margin-bottom: 40px;">
  <div id="carouselExampleIndicators" style="height: 90vh;" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators carousel-indicators-numbers">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">1</li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1">2</li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2">3</li>
  </ol>
 
    @foreach($_3slides as $slide)
          @if ($loop->first)   
    <div class="carousel-item active  " style="height: 90vh">
      @else
    <div class="carousel-item" style="height: 90vh">
      @endif
      <img class="d-block img-fluid" src="{{$slide->mainImgpath}}" style="width:100%; max-height:100%" alt="First slide">
        <div class="carousel-caption d-none d-md-block" style="    bottom: 55px;">
          <h3>Company name</h3>
          <p class="lead">{{$value = str_limit($slide->textarea, 120,$end = '...')  }}</p>
        </div>
    </div>
 @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

      </header>


@if($pollQuestion)
    <div class=" " >
        <div class="row justify-content-center" >
          <div class="col-6">

          <div class="card">
            <div class="card-block">
              <h4 class="card-title">{{$pollQuestion->question}}</h4>
              <form  method="POST" action="{{route('vote',$pollQuestion->id)}}">{{ csrf_field() }}
                <fieldset class="form-group">
@foreach($pollQuestion->PollQuestionAnswer as $answer)
           <div class="form-check">
             <label class="form-check-label">
               <input type="radio" class="form-check-input" name="answer" id="optionsRadios1" value="{{$answer->id}}" checked>
               {{$answer->answer}}
             </label>
           </div>
@endforeach
           <button type="submit" class="btn btn-green">Submit</button>

         </form>
       </div>
      </div>

    </div>
  </div>
  @endif
        <!-- Nav tabs -->
        <div class="container-fluid">

        <div class="row"  style="margin-bottom:20px;min-height:600px;">


        <div class="col-md-4" style="border-right: 1px solid var(--navy)">
          <h2 class="greencolor text-center">News</h2>
          <?php  $i=0;?>
          <hr />

        @foreach($news_record as $news)
        <?php  $i++;?>

            <div class="col-12 " style="margin-top:10px;">
              <h5><a href="{{route('view',[$news->id])}}" class="navy-link" >
                {{$value = str_limit( $news->title , 70,$end = '...') }}</a></h5>
              <p style="display:none">
                {{$value = str_limit( $news->textarea , 100,$end = '...') }}
              </p>
              <div  class="fontall">
                {!!$value !!}
              </div>
                <small class=""style="color: var(--navy)"> {{$news->created_at->diffForHumans() }} </small>
          </div>
          <?php if($i<3) echo "<hr />";?>

          @endforeach
          <div class="text-center ">
            <a href="{{route('allNews')}}"><button type="button" style="margin-top:20px; padding-left: 35px; padding-right: 35px" class="btn btn-green">More News</button></a>
        </div>
            </div>

        <div class="col-md-4"style="border-right: 1px solid var(--navy)">
          <h2 class="pinkcolor text-center">Researches</h2>
          <?php  $i=0;?>
          <hr />

        @foreach($researches as $research)
        <?php  $i++;?>
        <div class="col-12 " style="margin-top:10px;">
          <h5><a href="{{route('researchView',[$research->id])}}" class="navy-link" >
            {{$value = str_limit( $research->title , 70,$end = '...') }}</a></h5>
            <p style="display:none">
              {{$value = str_limit( $research->abstract , 100,$end = '...') }}
            </p>
            <div  class="fontall">
              {!!$value !!}
            </div>

            <small class=""style="color: var(--navy)">{{$research->researcher_name}}, {{$research->creation_date }} </small>
      </div>
      <?php if($i<3) echo "<hr />";?>
      @endforeach
        <div class="text-center ">
             <a href="{{route('allResearches')}}"> <button type="button" style="margin-top:20px;margin-bottom:20px;padding-left: 35px; padding-right: 35px"  class="btn btn-green ">More Researches</button></a>
        </div>
        </div>
        <!-- /.row -->


        <?php  $i=0;?>

        <div class="col-md-4">
          <h2 class="yellowcolor text-center">Events</h2>
          <hr />
        @foreach($events as $event)
        <?php  $i++;?>
        <div class="col-12 " style="margin-top:10px;">
          <h5><a href="{{route('event',$event->id)}}" class="navy-link" >
            {{$value = str_limit( $event->title , 70,$end = '...') }}</a></h5>
            <p style="display:none">
              {{$value = str_limit( $event->description , 100,$end = '...') }}
            </p>
            <div  class="fontall">
              {!!$value !!}
            </div>

            <small class=""style="color: var(--navy)">{{$event->startDate}} To {{$event->endDate}}</small>
      </div>
      <?php if($i<3) echo "<hr />";?>



      @endforeach
      <div class="text-center ">
           <a href="{{route('upComingEvents')}}"> <button type="button" style="margin-top:20px;margin-bottom:20px;padding-left: 35px; padding-right: 35px"  class="btn  btn-green ">More Events</button></a>
      </div>
    </div>
  </div>
</div>
<!-- 
<div class="row"id="tester" style="margin:0px;height:150px; background-image: linear-gradient(rgba(19, 58, 83, 0.9),rgba(19, 58, 83, 0.9));">
  <div class="col-4 dash"style="border-top:4px solid var(--green); color:var(--green);">
    <h5 class="" style="">Volunteers</h5>
    
    <span id="volunteersDatabase" style="display:none">{{ $volRec }}</span>

    <h1 id="volunteersC">


    </h1>
  </div>
  <div class="col-4 dash"style=" border-top:4px solid var(--pink); color:var(--pink)">
    <h5 class="" style="">Institutes</h5>
    <span id="institutesDatabase" style="display:none">{{ $insRec }}</span>
    <h1 id="institutesC">

    </h1>
    </div>
  <div class="col-4 dash"style="border-top:4px solid var(--yellow); color:var(--yellow);">
    <h5 class=""  style="">Events</h5>
    <span id="eventsDatabase" style="display:none">{{ $eveRec }}</span>
    <h1 id="eventsC">

    </h1>
  </div>


</div> -->
        <!-- Marketing Icons Section -->
        <div class="top-5" style="/*background-image: linear-gradient(rgba(79, 198, 194, 0.8),rgba(79, 198, 194, 0.5)),url({{ URL::to('/vendor/img/stars.jpg')}});*/  background-repeat: repeat;
    background-position: right top;
    background-size: contain;margin-top:0px" >

        <div class=" text-center ">
          <h1>Top 5 volunteers</h1>
          <div class="row justify-content-center" style="margin:0px">

             @foreach($volunteers as $volunteer)
              <div  class="col-lg-2 col-sm-2 col-xs-2 user">
                  <a href="{{route('profile',$volunteer->user_id)}}"><img class="img-fluid" src="{{ URL::to('/') }}/pp/{{$volunteer->picture}}" style="    border-radius: 50%;" alt=""></a>
                  <div class="text-center">
                   <a href="{{route('profile',$volunteer->user_id)}}"><h5 class="profile-name " style="margin-bottom: 0px;">{{$volunteer->nameInEnglish}}</h5></a>
                    <small><a href="{{route('messenger',$volunteer->email)}}">{{$volunteer->email}}</a></small>
                  </div>
                </div>
             @endforeach

          </div>
        </div>
      </div>
    </div>

@endsection('content')
@section('scripts')

<script src="{{URL::asset('vendor/js/countUp.min.js')}} "></script>
<script src="{{URL::asset('vendor/js/jquery.ba-cond.min.js')}} "></script>
<script src="{{URL::asset('vendor/js/modernizr.custom.79639.js')}} "></script>

<!-- <script src="{{URL::asset('vendor/js/jquery.slitslider.js')}} "></script> -->

    <script type="text/javascript">
    
    $(document).ready(function()
        {
         
          var options = {
            useEasing : true,
            useGrouping : true,
            separator : ',',
            decimal : '.',
          };

          $(window).on('scroll',function() {
            if (checkVisible($('#tester'))) {
              var count = document.getElementById('eventsDatabase').innerHTML;
              var demo = new CountUp("eventsC", 0, count, 0, 2.5, options);
              demo.start();

              var count = document.getElementById('volunteersDatabase').innerHTML;
              var demo = new CountUp("volunteersC", 0, count, 0, 2.5, options);
              demo.start();

              var count = document.getElementById('institutesDatabase').innerHTML;
              var demo = new CountUp("institutesC", 0, count, 0, 2.5, options);
              demo.start();
                $(window).off('scroll');
            } else {
                // do nothing
            }
        });

        function checkVisible( elm, eval ) {
            eval = eval || "object visible";
            var viewportHeight = $(window).height(), // Viewport Height
                scrolltop = $(window).scrollTop(), // Scroll Top
                y = $(elm).offset().top,
                elementHeight = $(elm).height();

            if (eval == "object visible") return ((y < (viewportHeight + scrolltop)) && (y > (scrolltop - elementHeight)));
            if (eval == "above") return ((y < (viewportHeight + scrolltop)));
        }




        });


    </script>
    <script >
      var $item = $('.carousel .item'); 
var $wHeight = $(window).height();
$item.eq(0).addClass('active');
$item.height($wHeight); 
$item.addClass('full-screen');

$('.carousel img').each(function() {
  var $src = $(this).attr('src');
  var $color = $(this).attr('data-color');
  $(this).parent().css({
    'background-image' : 'linear-gradient(rgba(0, 0, 0,.4),rgba(0, 0, 0, .6)),url(' + $src + ')',
    'background-color' : $color,

  });
  $(this).remove();
});
$(window).on('resize', function (){
  $wHeight = $(window).height();
  $item.height($wHeight);
});
    </script>

@endsection
