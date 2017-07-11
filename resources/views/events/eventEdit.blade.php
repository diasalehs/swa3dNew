@extends('layouts.master')
 @section('content')


<div class="container" style="margin:20px auto">

<ul class="nav nav-tabs sw-nav-tabs " role="tablist">
  <li class="nav-item col-4 col-lg-3  first-tab">
    <a class="nav-link "  href="{{route('myEvents')}}" >Up Coming Events    <span class="badge badge-default badge-pill">{{$Uevents->count()}}</span></a>
  </li>
  <li class="nav-item col-4 col-lg-3  second-tab">
    <a class="nav-link " href="{{route('archiveMyEvents')}}" >My Archived Events    <span class="badge badge-default badge-pill">{{$Aevents->count()}}</span></a>
  </li>
  <li class="nav-item col-4 col-lg-3  third-tab ">
    <a class="nav-link " href="{{route('makeEvent')}}" >Create Event</a>
  </li>
</ul>

              <div class="card">
                  <div class="card-header">Edit Event</div>
                  <div class="card-block">

                      <form class="" role="form" method="POST" action="{{route('eventEditPost') }}">{{ csrf_field() }}

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

                          <div class="form-group">
                            <label  class="control-label" for="exampleSelect1">Privacy</label>
                            <select name="open" value="{{ $event->open }}" class="form-control" id="exampleSelect1">
                            <option value="1">open</option>
                            <option value="0">close</option>
                            </select>
                        </div>

                          <div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
                              <label for="name" class="control-label">uplode cover</label>
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