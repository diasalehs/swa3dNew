@extends('institute/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('institute/includes.sidebar')
<div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
              <div class="card">
                  <div class="card-header">Edit Event</div>
                  <div class="card-block">

                      <form class="" role="form" method="POST" action="{{route('eventEdit') }}">{{ csrf_field() }}

                          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                              <label for="name" class="form-control-label">Title</label>
                              <input id="name" type="text" class="form-control" name="title" value="{{ $event->title }}"
                                  required="required" />
                                  @if ($errors->has('title'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('title') }}
                                      </div>
                                  @endif
                          </div>

                          <div class="">
                              <input id="name" type="text" style="display: none;" class="form-control" name="eventId" value="{{ $event->id }}"
                              />
                          </div>

                          <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                  <div class="form-group"> <!-- Description field -->
                                    <label class="control-label " for="description">Description</label>
                                    <textarea class="form-control" value="{{ $event->description }}" required="required" name="description" id="description">{{ $event->description }}</textarea>
                                  </div>
                                  @if ($errors->has('description'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('description') }}
                                      </div>
                                  @endif
                          </div>

                          <div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
                              <label for="name" class="col-lg-4 form-control-label">uplode cover</label>
                                  <input id="name" type="file" accept="image/*" class="form-control" name="cover" value="{{ $event->cover }}"/>
                                  @if ($errors->has('cover'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('cover') }}
                                      </div>
                                  @endif
                          </div>

                          <div class="form-group{{ $errors->has('startDate') ? ' has-error' : '' }}">
                              <label for="name" class="form-control-label">Start Date</label>
                              <input id="name" type="date" class="form-control" name="startDate" min = "<?php echo date("Y-m-d"); ?>" value="{{ $event->startDate }}"
                                  required="required" />
                                  @if ($errors->has('startDate'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('startDate') }}
                                      </div>
                                  @endif
                          </div>

                          <div class="form-group{{ $errors->has('endDate') ? ' has-error' : '' }}">
                              <label for="name" class=" form-control-label">End Date</label>
                                  <input id="name" type="date" class="form-control" name="endDate" min="<?php echo date("Y-m-d"); ?>" value="{{ $event->endDate }}"
                                  required="required" />
                                  @if ($errors->has('endDate'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('endDate') }}
                                      </div>
                                  @endif
                          </div>

                          <div class="form-group">
                                  <button type="submit" class="btn btn-success btn-green btn-block">Edit Event</button>
                          </div>

                      </form>
                  </div>
              </div>
        </div>
      </div>
</div>

@endsection('content')
