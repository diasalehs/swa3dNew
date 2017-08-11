
    <div class="modal modal-wide fade" id="{{ $qualification->id }}"style="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Qualifications</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              <form class="" role="form" method="POST" action="{{ route('editQualification') }}">{{ csrf_field() }}

              <div class="row justify-content-center">



                  <div class="form-group col-md-6 col-sm-12 {{ $errors->has('voluntaryWorkEdit') ? ' has-error' : '' }}">
                      <label for="name" class="form-control-label">Voluntary Work</label>
                          <input id="voluntaryWorkEdit" type="text" class="form-control" name="voluntaryWorkEdit[]" value="{{ $qualification->voluntaryWork }}"
                          required="required" autofocus="autofocus" />
                          @if ($errors->has('voluntaryWorkEdit'))
                              <div class="alert alert-danger" role="alert">
                                  <strong>Warning!</strong> {{ $errors->first('voluntaryWorkEdit') }}
                              </div>
                          @endif
                  </div>

                    <div class="form-group col-md-6 col-sm-12 {{ $errors->has('roleEdit') ? ' has-error' : '' }}">
                        <label for="name" class="form-control-label">Role</label>
                            <input id="roleEdit" type="text" class="form-control" name="roleEdit[]" value="{{ $qualification->role }}" required="required" autofocus="autofocus" />
                            @if($errors->has('roleEdit'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>Warning!</strong> {{ $errors->first('roleEdit') }}
                                </div>
                            @endif
                    </div>
                    <input id="name" type="number" style="display: none;" class="form-control" name="id[]" value="{{ $qualification->id }}"/>



                      <div class="form-group col-md-6 col-sm-12 {{ $errors->has('achievementsEdit') ? ' has-error' : '' }}">
                          <label for="name" class="form-control-label">Achievements</label>
                              <input id="achievementsEdit" type="text" class="form-control" name="achievementsEdit[]" value="{{ $qualification->achievements }}"
                              required="required" autofocus="autofocus" />
                              @if ($errors->has('achievementsEdit'))
                                  <div class="alert alert-danger" role="alert">
                                      <strong>Warning!</strong> {{ $errors->first('achievementsEdit') }}
                                  </div>
                              @endif
                      </div>

                      <div class="form-group col-md-6 col-sm-12 {{ $errors->has('targetedSegmentEdit') ? ' has-error' : '' }}">
                          <label for="name" class="form-control-label">targeted segments</label>
                              
                              <select name="targetedSegmentEdit[]" class="form-control" class="form-control" id="targetedSegmentEdit" required="required" autofocus="autofocus">
                              @foreach($targets as $t)
                              <option value="{{$t->id}}" 
                              @if($qualification->targetedSegment == $t->id) 
                              selected
                              @endif
                              >{{$t->name}}</option>
                              @endforeach
                              </select>
                              @if ($errors->has('targetedSegmentEdit'))
                                  <div class="alert alert-danger" role="alert">
                                      <strong>Warning!</strong> {{ $errors->first('targetedSegmentEdit') }}
                                  </div>
                              @endif
                      </div>

                      <div class="form-group col-md-6 col-sm-12 {{ $errors->has('achievementFromEdit') ? ' has-error' : '' }}">
                          <label for="name" class="form-control-label">Start Date</label>
                              <input id="achievementFromEdit" type="date" class="form-control" name="achievementFromEdit[]" value="{{ $qualification->achievementFrom }}"
                              required="required" autofocus="autofocus" />
                              @if ($errors->has('achievementFromEdit'))
                                  <div class="alert alert-danger" role="alert">
                                      <strong>Warning!</strong> {{ $errors->first('achievementFromEdit') }}
                                  </div>
                              @endif
                      </div>

                      <div class="form-group col-md-6 col-sm-12 {{ $errors->has('achievementToEdit') ? ' has-error' : '' }}">
                          <label for="name" class="form-control-label">End Date</label>
                              <input id="achievementToEdit" type="date" class="form-control" name="achievementToEdit[]" value="{{ $qualification->achievementTo }}"
                              autofocus="autofocus" />
                              @if ($errors->has('achievementToEdit'))
                                  <div class="alert alert-danger" role="alert">
                                      <strong>Warning!</strong> {{ $errors->first('achievementToEdit') }}
                                  </div>
                              @endif
                      </div>


            </div>


        </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-green">Edit</button>
        </form>
        </div>
        </div>
      </div>

      </div>
    </div>
