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
                              @if ($errors->first())
                                  <div class="alert alert-danger" role="alert">
                                      <strong>Warning!</strong>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </div>
                              @endif
<header style="">

                              <div class=" demo-1" >



                                  <div id="slider" class="sl-slider-wrapper">

                              <div class="sl-slider">
                                @foreach($_3slides as $slide)
                                @endforeach

                                <div class="sl-slide bg-4" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                                  <div class="sl-slide-inner"style="background-image:linear-gradient(rgba(0, 0, 0,.2),rgba(0, 0, 0, .7)), url('{{$_3slides[0]->mainImgpath}}');background-size:cover ">
                                    <div class="deco" style="background-image: url('{{$_3slides[0]->mainImgpath}}');background-size:cover;	border-color: var(--green); "></div>
                                    <h2><a href="#" class="green-link">{{$value = str_limit($_3slides[0]->title, 70,$end = '...')  }}</a></h2>
                                    <blockquote><p>{{$value = str_limit($_3slides[0]->textarea, 120,$end = '...')  }}</p><cite>Ralph Waldo Emerson</cite></blockquote>
                                  </div>
                                </div>
                                <div class="sl-slide bg-4" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                                  <div class="sl-slide-inner"style="background-image:linear-gradient(rgba(0, 0, 0,.2),rgba(0, 0, 0, .7)), url('{{$_3slides[1]->mainImgpath}}');background-size:cover ">
                                    <div class="deco" style="background-image: url('{{$_3slides[1]->mainImgpath}}');background-size:cover;border-color: var(--yellow); "></div>
                                    <h2><a href="#" class="yellow-link">{{$value = str_limit($_3slides[1]->title, 70,$end = '...')  }}</a></h2>
                                    <blockquote><p>{{$value = str_limit($_3slides[1]->textarea, 120,$end = '...')  }}</p><cite>Ralph Waldo Emerson</cite></blockquote>
                                  </div>
                                </div>
                                  <div class="sl-slide bg-4" data-orientation="horizontal"  data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                                    <div class="sl-slide-inner"style="background-image:linear-gradient(rgba(0, 0, 0,.2),rgba(0, 0, 0, .7)), url('{{$_3slides[2]->mainImgpath}}');background-size:cover ">
                                      <div class="deco" style="background-image: url('{{$_3slides[2]->mainImgpath}}');background-size:cover;border-color: var(--pink); "></div>
                                      <h2><a href="#" class="pink-link">{{$value = str_limit($_3slides[2]->title, 70,$end = '...')  }}</a></h2>
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
<hr />
    <!-- Page Content -->

@if($pollQuestion)
    <div class=" " >
        <div class="row justify-content-center" style="margin-top:20px;">
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
        <div class="" style="margin-top:700px">


        <div class="row">

        @foreach($news_record as $news)
            <div class="col-lg-4 col-sm-6 ">
                <div class="card news-item">
                    <a href="{{route('view',[$news->id])}}"><img  class="card-img-top img-fluid" src="{{URL::to('/uploads')}}/{{$news->mainImgpath}}" alt=""></a>
                    <div class="card-block">
                        <a href="{{route('view',[$news->id])}}" class="card-text">{{$news->title}}</a>
                        <p style="margin-bottom:5px; overflow:hidden;" class="line-clamp-3">
                          This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.

                        </p>
                          <small class=""style="color: var(--navy)"> {{$news->created_at}} </small>
                    </div>
                    <div class="card-block">
                    </div>
                </div>
            </div>
          @endforeach
            </div>

            <div class="text-center ">
              <a href="{{route('allNews')}}"><button type="button" class="btn  show-more-btn btn-green">More News</button></a>
          </div>

    <div class="section researches">
        <h1 class="my-4 research-section-title text-center"></h1>
  <!-- Marketing Icons Section -->

        <div class="row">
        @foreach($researches as $research)
            <div class="col-lg-4 col-sm-6">
                <div class="card research-card">
                    <h4 class="card-header"><span class="line-clamp-2 ">{{$research->title}}</span></h4>
                    <div class="card-block">
                        <p class="card-text line-clamp-10">{{$research->abstract}} </p>
                        <p class="RN">{{$research->researcher_name}}</p>
                        <a href="{{route('researchView',[$research->id])}}" style="align-self: center;"> Learn More</a>
                    </div>

                </div>
            </div>
      @endforeach
        </div>
        <!-- /.row -->



        </div>
            <div class="text-center ">
                 <a href="{{route('allResearches')}}"> <button type="button" class="btn show-more-btn btn-pink more-researches">More Researches</button></a>
            </div>



        <div class="row">
        @foreach($events as $event)
            <div class="col-lg-4 col-sm-6">
                <div class="card research-card">
                    <h4 class="card-header"><span class="line-clamp-2 ">{{$event->title}}</span></h4>
                    <div class="card-block">
                    <a href=""><img  class="card-img-top img-fluid" src="{{URL::to('/events')}}/{{$event->cover}}" alt=""></a>

                        <a href="{{route('event',[$event->id])}}" style="align-self: center;"> Learn More</a>
                    </div>

                </div>
            </div>
      @endforeach
        </div>
        <div class="text-center ">
                 <a href="{{route('upComingEvents')}}"> <button type="button" class="btn show-more-btn btn-pink more-researches">See more</button></a>
            </div>


        <!-- Marketing Icons Section -->
        <div class="top-5" style="  background-repeat: no-repeat;
    background-position: right top;
    background-size: contain" >

        <div class=" text-center ">
          <h1>Top 5 volunteers</h1>
          <div class="row justify-content-center">

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
<script src="{{URL::asset('vendor/js/jquery.ba-cond.min.js')}} "></script>
<script src="{{URL::asset('vendor/js/modernizr.custom.79639.js')}} "></script>
<script src="{{URL::asset('vendor/js/jquery.slitslider.js')}} "></script>
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
