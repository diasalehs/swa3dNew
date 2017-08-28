@extends('layouts.master')
@section('title')
  Swa3ed

@endsection
@section('styles')

<link href="{{ URL::asset('vendor/css/style.css')}}" rel="stylesheet">
<link href="{{ URL::asset('vendor/css/custom.css')}}" rel="stylesheet">
<link href="{{ URL::asset('vendor/css/demo.css')}}" rel="stylesheet">
<noscript>
<link href="{{ URL::asset('vendor/css/styleNoJS.css')}}" rel="stylesheet">
</noscript>




@endsection
@section('content')

<header style="margin-bottom:93vh" >

        <div class=" demo-1" >



            <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
          @foreach($_3slides as $slide)
          @endforeach

          <div class="sl-slide bg-4" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner"style="background-image:linear-gradient(rgba(0, 0, 0,.3),rgba(0, 0, 0, .9)), url('{{$_3slides[0]->mainImgpath}}');background-size:cover;    display: flex;
    flex-direction: column;
    align-items: center;
    align-content: center;
    justify-content: center; ">

              <h2><a href="#" class="green-link">{{$value = str_limit($_3slides[0]->title, 90,$end = '...')  }}</a></h2>
              <blockquote><p>{{$value = str_limit($_3slides[0]->textarea, 120,$end = '...')  }}</p><cite>Ralph Waldo Emerson</cite></blockquote>
            </div>
          </div>
          <div class="sl-slide bg-4" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner"style="background-image:linear-gradient(rgba(0, 0, 0,.3),rgba(0, 0, 0, .9)), url('{{$_3slides[1]->mainImgpath}}');background-size:cover;   display: flex;
    flex-direction: column;
    align-items: center;
    align-content: center;
    justify-content: center;  ">
              <h2><a href="#" class="yellow-link">{{$value = str_limit($_3slides[1]->title, 60,$end = '...')  }}</a></h2>
              <blockquote><p>{{$value = str_limit($_3slides[1]->textarea, 120,$end = '...')  }}</p><cite>Ralph Waldo Emerson</cite></blockquote>
            </div>
          </div>
            <div class="sl-slide bg-4" data-orientation="horizontal"  data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
              <div class="sl-slide-inner"style="background-image:linear-gradient(rgba(0, 0, 0,.3),rgba(0, 0, 0, .9)), url('{{$_3slides[2]->mainImgpath}}');background-size:cover;   display: flex;
      flex-direction: column;
      align-items: center;
      align-content: center;
      justify-content: center;  ">
                <h2><a href="#" class="pink-link">{{$value = str_limit($_3slides[2]->title, 60,$end = '...')  }}</a></h2>
                <blockquote><p>{{$value = str_limit($_3slides[2]->textarea, 120,$end = '...')  }}</p><cite>Ralph Waldo Emerson</cite></blockquote>
              </div>
            </div>

        </div><!-- /sl-slider -->

        <nav id="nav-arrows" class="nav-arrows">
          <span class="nav-arrow-prev">Previous</span>
          <span class="nav-arrow-next">Next</span>
        </nav>

        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
        </nav>

      </div><!-- /slider-wrapper -->

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


        <div class="col-md-4">
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
            <a href="{{route('allNews')}}"><button type="button" style="margin-top:20px;" class="btn btn-block btn-green">More News</button></a>
        </div>
            </div>

        <div class="col-md-4">
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
             <a href="{{route('allResearches')}}"> <button type="button" style="margin-top:20px;margin-bottom:20px;"  class="btn btn-block btn-green ">More Researches</button></a>
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
           <a href="{{route('upComingEvents')}}"> <button type="button" style="margin-top:20px;margin-bottom:20px;"  class="btn btn-block btn-green ">More Events</button></a>
      </div>
    </div>
  </div>
</div>

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


</div>
        <!-- Marketing Icons Section -->
        <div class="top-5" style="  background-repeat: no-repeat;
    background-position: right top;
    background-size: contain;margin-top:0px" >

        <div class=" text-center ">
          <h1>Top 5 volunteers</h1>
          <div class="row justify-content-center" style="margin:0px">

             @foreach($volunteers as $volunteer)
              <div  class="col-lg-2 col-sm-2 col-xs-2 user">
                  <a href="{{route('profile',$volunteer->user_id)}}"><img class="img-fluid" src="{{ URL::to('/') }}/pp/{{$volunteer->picture}}" alt=""></a>
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
<script src="{{URL::asset('vendor/js/jquery.slitslider.js')}} "></script>

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

<script type="text/javascript">
  $(function() {

    var Page = (function() {

      var $navArrows = $( '#nav-arrows' ),
        $nav = $( '#nav-dots > span' ),
        slitslider = $( '#slider' ).slitslider( {
          onBeforeChange : function( slide, pos ) {

            $nav.removeClass( 'nav-dot-current' );
            $nav.eq( pos ).addClass( 'nav-dot-current' );

          }
        } ),

        init = function() {

          initEvents();

        },
        initEvents = function() {

          // add navigation events
          $navArrows.children( ':last' ).on( 'click', function() {

            slitslider.next();
            return false;

          } );

          $navArrows.children( ':first' ).on( 'click', function() {

            slitslider.previous();
            return false;

          } );

          $nav.each( function( i ) {

            $( this ).on( 'click', function( event ) {

              var $dot = $( this );

              if( !slitslider.isActive() ) {

                $nav.removeClass( 'nav-dot-current' );
                $dot.addClass( 'nav-dot-current' );

              }

              slitslider.jump( i + 1 );
              return false;

            } );

          } );

        };

        return { init : init };

    })();

    Page.init();

    			});
    		</script>
@endsection
