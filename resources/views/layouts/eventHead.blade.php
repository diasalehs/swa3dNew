@extends('layouts.master')

@section('content')
<div class="viewProfile" style="">

  <div class="jumbotron jumbotron-fluid " style="background-image: linear-gradient(rgba(19, 58, 83, 0.6),rgba(19, 58, 83, 0.6)) , url({{URL::to('/')}}/events/{{$event->cover}});
  background-size:cover;background-repeat: no-repeat;
  background-position: right top;
  background-attachment: fixed;
  ">
    <div class="container" style="  min-height:300px;     display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;" >

      <div class="">
        <h1 class="display-7 " style="color:#fff">{{$event->title}}</h1>
        <p class=""style="color:#fff; margin-bottom:20px; margin-top:40px">{{$event->startDate}} To {{$event->endDate}} - in {{ucfirst($event->city)}}, {{$event->country}}  <br />   Created by: <a href="{{route('profile',$event->user_id)}}" class="yellow-link">{{$event->user->name}}</a></p>

                @if($archived == 0)
                  @if($mine)
                    <a class="btn btn-pink" href="{{route('eventDelete',$event->id)}}">Delete</a>
                    <a class=" btn btn-yellow" href="{{route('eventEdit',$event->id)}}">Edit</a>
                    @if($event->open)
                      <a class="btn btn-danger"  href="{{route('closeEvent',$event->id)}}">make it private</a>
                    @elseif(!$event->open)
                      <a class="btn btn-danger"  href="{{route('openEvent',$event->id)}}">make it public</a>
                    @endif
                  @else
                    @if($request)
                      <a href="{{route('disVolunteer',$event->id)}}" class="btn btn-pink">Cancel Volunteer Request</a>
                    @elseif(!$request)
                      <a href="{{route('volunteer',$event->id)}}" class="btn btn-pink">Volunteer Request</a>
                    @endif
                  @endif
                  @if($mine || $eventCloseAllowed)
                  <a class="btn btn-green" style="color:#fff" data-toggle="modal" data-target="#postModal">Create a Post</a>
                  @endif
                @elseif($archived == 1)
                  <a class="btn btn-green" style="color:#fff" data-toggle="modal" data-target="#lessonsModal">Lessons Learned</a>
                  @if(!$mine && $eventCloseAllowed)
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rate-modal">Rate!</button>
                  @endif
                @endif
                
</div>
</div>
</div>
<div class="container "style="margin-bottom:50px;margin-top:30px;">
  <div class="row ">


<div class="col-sm-12 col-md-4  col-lg-3 ">

<div class=" nav-side-menu" style="    border-top-right-radius: .25rem;
    border-top-left-radius: .25rem;   ">
    <div class="brand">Brand Log</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content  collapse out">
                 <li>
                  <a href="{{route('event',$event->id)}}">
                  <i class="fa fa-user fa-lg"></i> Details
                  </a>
                  </li>
                   <li>
                    <a href="{{route('eventPosts',$event->id)}}">
                    <i class="fa fa-users fa-lg"></i> Posts
                    </a>
                  </li>
                  <li>
                    <a href="{{route('eventReviews',$event->id)}}">
                    <i class="fa fa-users fa-lg"></i> Reviews
                    </a>
                  </li>
                 <li>
                  <a href="{{route('acceptedVolunteers',$event->id)}}">
                  <i class="fa fa-users fa-lg"></i> Volunteers
                  </a>
                </li>
                @if($mine)
                 <li>
                  <a href="{{route('unacceptedVolunteers',$event->id)}}">
                  <i class="fa fa-users fa-lg"></i> Remove Volunteers
                  </a>
                </li>
                <li>
                  <a href="{{route('rateVolunteers',$event->id)}}">
                  <i class="fa fa-users fa-lg"></i> Rate Volunteers
                  </a>
                </li>
                @endif
            </ul>
     </div>
</div>
</div>


@yield('content')


    </div>
        @if($mine || $eventCloseAllowed)
        @if($archived == 0 || $archived == 2)

        <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create a Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" role="form" method="POST" action="{{ route('post') }}">{{ csrf_field() }}
                  <div class="">
                    <input id="name" type="text" style="display: none;" class="form-control" name="event_id" value="{{ $event->id }}"/>
                  </div>
                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        <label for="title" class="col-lg-4 form-control-label">Post Body</label>
                        <div class="col-lg-12">
                            <textarea class="form-control" required="required" name="body" id="body">{{ old('body') }}</textarea>
                            @if ($errors->has('body'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>Warning!</strong> {{ $errors->first('body') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-green ">post</button>
              </div>
            </form>

            </div>
          </div>
        </div>
        @endif
          @endif

          
      </div>

@if($archived == 1)
<!-- Modal -->
        <div class="modal fade" id="lessonsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" >Lessons You Learned From This Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                  <form id="review" role="form" action="
                  @if($mine)
                  {{route('lesson',$event->id)}}
                  @elseif($eventCloseAllowed)
                  {{route('review',$event->id)}}
                  @endif
                  " method="POST"> {{ csrf_field() }}
                    <div class="row justify-content-center">

                    @if($lesson != null)
                     {{$lesson->goals}}
                    @endif

          <div class="col-sm-12 col-md-6 form-check form-check-inline">
            <label for="exampleInputEmail1">Did this event achevied his goals ?</label><br />
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="goals" id="inlineRadio1" value="1" checked> yes
            </label>
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="goals" id="inlineRadio1" value="0"> no
            </label>
          </div>

                    @if($mine)

                    <div class="has-success col-12 form-group{{ $errors->has('lessons') ? ' has-error' : '' }}">
                      <label for="exampleTextarea">Lessons Leared From This Event</label>
                      <textarea required="true" class="form-control" name="lessons" rows="3" >{{ old('lessons') }}</textarea>
                      @if ($errors->has('lessons'))
                          <div class="alert alert-danger" role="alert">
                              <strong>Warning!</strong> {{ $errors->first('lessons') }}
                          </div>
                      @endif
                    </div>

                    @else
                    <div class="has-success col-12 form-group{{ $errors->has('positive') ? ' has-error' : '' }}">
                      <label for="exampleTextarea">Positive Feedback</label>
                      <textarea required="true" class="form-control" name="positive" rows="3" >{{ old('positive') }}</textarea>
                      @if ($errors->has('positive'))
                          <div class="alert alert-danger" role="alert">
                              <strong>Warning!</strong> {{ $errors->first('positive') }}
                          </div>
                      @endif
                    </div>


                    <div class="has-danger col-12 form-group{{ $errors->has('negative') ? ' has-error' : '' }}">
                      <label for="exampleTextarea">Negative Feedback</label>
                      <textarea required="true" class="form-control" name="negative" rows="3" >{{ old('negative') }}</textarea>
                      @if ($errors->has('negative'))
                          <div class="alert alert-danger" role="alert">
                              <strong>Warning!</strong> {{ $errors->first('negative') }}
                          </div>
                      @endif
                    </div>
                    
                    @endif
                      </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-green">Save</button>

              </div>
            </form>

            </div>
          </div>
        </div>

@endif

@if((!$mine || $eventCloseAllowed) && $archived == 1)
<!-- Modal -->
<div class="modal fade" id="rate-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('rateInstitute',$event->id)}}" method="get">
      <div class="modal-body rate-modal">
        <label>cat1</label>
        <input type="text" name="cat1" class="cat1">
        <div id="r1" class="c"onclick="rate(1)"></div>
        <label>cat2</label>
        <input type="text" name="cat2" class="cat2">
        <div id="r2" class="c" onclick="rate(2)"></div>
        <label>cat3</label>
        <input type="text" name="cat3" class="cat3">
        <div id="r3" class="c" onclick="rate(3)"></div>
        <label>cat4</label>
        <input type="text" name="cat4" class="cat4">
        <div id="r4" class="c" onclick="rate(4)"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-green">Save</button>
        </div>
        </form>
        </div>
        </div>
        </div>


@endif

@endsection('content')
@section('scripts')

    <script src="{{URL::asset('vendor/js/jstarbox.js')}} "></script>

    <script src="{{URL::asset('vendor/js/RateJS.js')}} "></script>

    <script src="{{URL::asset('vendor/js/bootstrap-select.js')}} "></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/js/dataTables.checkboxes.min.js"></script>


    <script>
    $(document).ready(function()
        {

                 var table = $('#unacceptedT').DataTable({
                    'columnDefs': [
                       {
                          'targets': 0,
                          'render': function(data, type, row, meta){
                                 if(type === 'display'){
                                    data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                                 }

                                 return data;
                              },
                          'checkboxes': {
                             'selectRow': true,
                             'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'

                          }
                       }
                    ],
                    'select': {
                       'style': 'multi'
                    },
                    'order': [[1, 'asc']]
                 });

                 // Handle form submission event
                 $('#frm-unaccepted').on('submit', function(e){
                    var form = this;

                    var rows_selected = table.column(0).checkboxes.selected();

                    // Iterate over all selected checkboxes
                    $.each(rows_selected, function(index, rowId){
                       // Create a hidden element
                       $(form).append(
                           $('<input>')
                              .attr('type', 'hidden')
                              .attr('name', 'unaccepted[]')
                              .val(rowId)
                       );
                    });


                 });

                   $("#unacceptedT_length").parent().hide();
                   $("#unacceptedT_info").parent().hide();

                 var table = $('#example').DataTable({
                    'columnDefs': [
                       {
                          'targets': 0,
                          'render': function(data, type, row, meta){
                                 if(type === 'display'){
                                    data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                                 }

                                 return data;
                              },
                          'checkboxes': {
                             'selectRow': true,
                             'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'

                          }
                       }
                    ],
                    'select': {
                       'style': 'multi'
                    },
                    'order': [[1, 'asc']]
                 });

                 // Handle form submission event
                 $('#frm-example').on('submit', function(e){
                    var form = this;

                    var rows_selected = table.column(0).checkboxes.selected();

                    // Iterate over all selected checkboxes
                    $.each(rows_selected, function(index, rowId){
                       // Create a hidden element
                       $(form).append(
                           $('<input>')
                              .attr('type', 'hidden')
                              .attr('name', 'accepted[]')
                              .val(rowId)
                       );
                    });


                 });

      });
    </script>
@endsection