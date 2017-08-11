
    <div class="modal modal-wide fade" id="Qualifications"style="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add More Qualifications</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              <form class="" role="form" method="POST" action="{{ route('addQualification') }}">{{ csrf_field() }}
                <div class="row justify-content-center">

                  <div class="form-group col-md-6 col-sm-12 {{ $errors->has('voluntaryWork') ? ' has-error' : '' }}">
                    <label for="name" class="form-control-label">Voluntary Work</label>
                        <input id="voluntaryWork" type="text" class="form-control" name="voluntaryWork" value="{{ old('voluntaryWork') }}"
                         autofocus="autofocus" />
                        @if ($errors->has('voluntaryWork'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Warning!</strong> {{ $errors->first('voluntaryWork') }}
                            </div>
                        @endif
                </div>

                <div class="form-group col-md-6 col-sm-12 {{ $errors->has('role') ? ' has-error' : '' }}">
                    <label for="name" class="form-control-label">Role</label>
                        <input id="role" type="text" class="form-control" name="role" value="{{ old('role') }}"
                         autofocus="autofocus" />
                        @if ($errors->has('role'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Warning!</strong> {{ $errors->first('role') }}
                            </div>
                        @endif
                </div>

                <div class="form-group col-md-6 col-sm-12 {{ $errors->has('achievements') ? ' has-error' : '' }}">
                    <label for="name" class="form-control-label">Achievements</label>
                        <input id="achievements" type="text" class="form-control" name="achievements" value="{{ old('achievements') }}"
                         autofocus="autofocus" />
                        @if ($errors->has('achievements'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Warning!</strong> {{ $errors->first('achievements') }}
                            </div>
                        @endif
                </div>

                <div class="form-group col-md-6 col-sm-12 {{ $errors->has('targetedSegment') ? ' has-error' : '' }}">
                          <label for="name" class="form-control-label">targeted segments</label>
                              <select name="targetedSegment" class="form-control" class="form-control" id="targetedSegment"  autofocus="autofocus">
                              @foreach($targets as $t)
                              <option value="{{$t->id}}" selected>{{$t->name}}</option>
                              @endforeach
                              </select>
                              @if ($errors->has('targetedSegment'))
                                  <div class="alert alert-danger" role="alert">
                                      <strong>Warning!</strong> {{ $errors->first('targetedSegment') }}
                                  </div>
                              @endif
                      </div>

                <div class="form-group col-md-6 col-sm-12 {{ $errors->has('achievementFrom') ? ' has-error' : '' }}">
                    <label for="name" class="form-control-label">Start Date</label>
                        <input id="achievementFrom" type="date" class="form-control" name="achievementFrom" value="{{ old('achievementFrom') }}"
                         autofocus="autofocus" />
                        @if ($errors->has('achievementFrom'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Warning!</strong> {{ $errors->first('achievementFrom') }}
                            </div>
                        @endif
                </div>

                <div class="form-group col-md-6 col-sm-12 {{ $errors->has('achievementTo') ? ' has-error' : '' }}">
                    <label for="name" class="form-control-label">End Date</label>
                        <input id="achievementTo" type="date" class="form-control" name="achievementTo" value="{{ old('achievementTo') }}"
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
          <button type="submit" class="btn btn-green">Add</button>
        </form>
        </div>
        </div>
      </div>

      </div>
