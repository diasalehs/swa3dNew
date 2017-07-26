<!-- Modal -->
@if(Auth::check())
        <div class="modal fade" id="invite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Your Upcoming Events</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row justify-content-center">
<form id="invite" role="form" action="{{route('invite',$user->id)}}" method="POST" style="display: flex; justify-content:center; flex-wrap: wrap; align-items: flex-start;"> {{ csrf_field() }}
                @include('includes/inviteToEvent')
                    </form>


                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
@endif