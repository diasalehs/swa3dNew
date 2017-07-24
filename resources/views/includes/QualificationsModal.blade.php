
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

              <form class="" role="form" method="POST" action="{{ route('qualifications') }}">{{ csrf_field() }}

              <div class="row justify-content-center">



                  <div class="form-group col-md-6 col-sm-12 {{ $errors->has('voluntaryWork') ? ' has-error' : '' }}">
                      <label for="name" class="form-control-label">Voluntary Work</label>
                          <input id="voluntaryWork" type="tel" class="form-control" name="voluntaryWorkEdit[]" value="{{ $qualification->voluntaryWork }}"
                          required="required" autofocus="autofocus" />
                          @if ($errors->has('voluntaryWork'))
                              <div class="alert alert-danger" role="alert">
                                  <strong>Warning!</strong> {{ $errors->first('voluntaryWork') }}
                              </div>
                          @endif
                  </div>

                    <div class="form-group col-md-6 col-sm-12 {{ $errors->has('role') ? ' has-error' : '' }}">
                        <label for="name" class="form-control-label">Role</label>
                            <input id="role" type="tel" class="form-control" name="roleEdit[]" value="{{ $qualification->role }}" required="required" autofocus="autofocus" />
                            @if($errors->has('role'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>Warning!</strong> {{ $errors->first('role') }}
                                </div>
                            @endif
                    </div>
                    <input id="name" type="text" style="display: none;" class="form-control" name="id[]" value="{{ $qualification->id }}"/>



                      <div class="form-group col-md-6 col-sm-12 {{ $errors->has('achievements') ? ' has-error' : '' }}">
                          <label for="name" class="form-control-label">Achievements</label>
                              <input id="achievements" type="tel" class="form-control" name="achievementsEdit[]" value="{{ $qualification->achievements }}"
                              required="required" autofocus="autofocus" />
                              @if ($errors->has('achievements'))
                                  <div class="alert alert-danger" role="alert">
                                      <strong>Warning!</strong> {{ $errors->first('achievements') }}
                                  </div>
                              @endif
                      </div>

                      <div class="form-group col-md-6 col-sm-12 {{ $errors->has('targetedSegment') ? ' has-error' : '' }}">
                          <label for="name" class="form-control-label">targeted segments</label>
                              <input id="targetedSegment" type="text" class="form-control" name="targetedSegmentEdit[]" value="{{ $qualification->targetedSegment }}"
                              required="required" autofocus="autofocus" />
                              @if ($errors->has('targetedSegment'))
                                  <div class="alert alert-danger" role="alert">
                                      <strong>Warning!</strong> {{ $errors->first('targetedSegment') }}
                                  </div>
                              @endif
                      </div>

                      <div class="form-group col-md-6 col-sm-12 {{ $errors->has('achievementFrom') ? ' has-error' : '' }}">
                          <label for="name" class="form-control-label">Start Date</label>
                              <input id="achievementFrom" type="date" class="form-control" name="achievementFromEdit[]" value="{{ $qualification->achievementFrom }}"
                              required="required" autofocus="autofocus" />
                              @if ($errors->has('achievementFrom'))
                                  <div class="alert alert-danger" role="alert">
                                      <strong>Warning!</strong> {{ $errors->first('achievementFrom') }}
                                  </div>
                              @endif
                      </div>

                      <div class="form-group col-md-6 col-sm-12 {{ $errors->has('achievementTo') ? ' has-error' : '' }}">
                          <label for="name" class="form-control-label">End Date</label>
                              <input id="achievementTo" type="date" class="form-control" name="achievementToEdit[]" value="{{ $qualification->achievementTo }}"
                              autofocus="autofocus" />
                              @if ($errors->has('achievementTo'))
                                  <div class="alert alert-danger" role="alert">
                                      <strong>Warning!</strong> {{ $errors->first('achievementTo') }}
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
