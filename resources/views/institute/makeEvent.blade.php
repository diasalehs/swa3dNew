@extends('institute/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('institute/includes.sidebar')
        <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
             <div class="col-lg-8 offset-md-2">
              <div class="card">
                  <div class="card-header">Create Event</div>
                  <div class="card-block">

                      <form class="" role="form" method="POST" action="{{route('event') }}">{{ csrf_field() }}

                          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                              <label for="name" class="col-lg-4 form-control-label">Title</label>
                              <div class="col-lg-6">
                                  <input id="name" type="text" class="form-control" name="title" value="{{ old('title') }}"
                                  required="required" />
                                  @if ($errors->has('title'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('title') }}
                                      </div>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                              <div class="col-lg-6">
                                  <div class="form-group"> <!-- Description field -->
                                    <label class="control-label " for="description">description</label>
                                    <textarea value="{{ old('description') }}" required="required" name="description" id="description"></textarea>
                                  </div>
                                  @if ($errors->has('description'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('description') }}
                                      </div>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
                              <label for="name" class="col-lg-4 form-control-label">uplode cover</label>
                              <div class="col-lg-6">
                                  <input id="name" type="file" accept="image/*" class="form-control" name="cover" />
                                  @if ($errors->has('cover'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('cover') }}
                                      </div>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('startDate') ? ' has-error' : '' }}">
                              <label for="name" class="col-lg-4 form-control-label">Start Date</label>
                              <div class="col-lg-6">
                                  <input id="name" type="date" class="form-control" name="startDate" value="2018-08-19"
                                  required="required" />
                                  @if ($errors->has('startDate'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('startDate') }}
                                      </div>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('endDate') ? ' has-error' : '' }}">
                              <label for="name" class="col-lg-4 form-control-label">End Date</label>
                              <div class="col-lg-6">
                                  <input id="name" type="date" class="form-control" name="endDate" value="2018-08-20"
                                  required="required" />
                                  @if ($errors->has('endDate'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('endDate') }}
                                      </div>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-lg-4 offset-md-4">
                                  <button type="submit" class="btn btn-success btn-block">Create</button>
                              </div>
                          </div>

                      </form>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
