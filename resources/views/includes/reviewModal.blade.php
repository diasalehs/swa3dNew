<!-- Modal -->
@if(Auth::check())
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

                  <form id="review" role="form" action="{{route('review',$event->id)}}" method="POST"> {{ csrf_field() }}
                    <div class="row justify-content-center">

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
                    

                      </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-green">Review</button>

              </div>
            </form>

            </div>
          </div>
        </div>
@endif
