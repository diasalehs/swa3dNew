@extends('layouts.master')
 @section('content')


<div class="container" style="margin:100px auto">

<ul class="nav nav-tabs sw-nav-tabs " role="tablist">

  <li class="nav-item col-4 col-lg-3  first-tab">
    <a class="nav-link active" data-toggle="tab" href="#createInitiative" role="tab">Create Event</a>
  </li>
  <li class="nav-item col-4 col-lg-3  second-tab">
    <a class="nav-link " data-toggle="tab" href="#upComingInitiatives" role="tab">Up Coming Events    <span class="badge badge-default badge-pill">{{$Uevents->count()}}</span></a>
  </li>
  <li class="nav-item col-4 col-lg-3  third-tab ">
    <a class="nav-link" data-toggle="tab" href="#myArchivedInitiatives" role="tab">My Archived Events    <span class="badge badge-default badge-pill">{{$Aevents->count()}}</span></a>
  </li>

</ul>

<div class="tab-content">
  <div class="tab-pane active" id="createInitiative" role="tabpanel">

        <div class="col-lg-8 offset-md-2">
            <div class="card">
                <div class="card-header">Create Initiative</div>
                <div class="card-block">
                    <form class="" role="form" method="POST" action="{{ route('makeEventPost') }}">{{ csrf_field() }}

                          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                              <label for="name" class="form-control-label">Title</label>
                              <input id="name" type="text" class="form-control" name="title" value="{{ old('title') }}"
                                  required="required" />
                                  @if ($errors->has('title'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('title') }}
                                      </div>
                                  @endif
                          </div>

                          <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                  <div class="form-group"> <!-- Description field -->
                                    <label class="control-label " for="country">Counrty</label>
                                    <textarea class="form-control" value="{{ old('country') }}" required="required" name="country" id="counrty">{{ old('country') }}</textarea>
                                  </div>
                                  @if ($errors->has('country'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('country') }}
                                      </div>
                                  @endif
                          </div>


                          <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                  <div class="form-group"> <!-- Description field -->
                                    <label class="control-label " for="description">Description</label>
                                    <textarea class="form-control" value="{{ old('description') }}" required="required" name="description" id="description">{{ old('description') }}</textarea>
                                  </div>
                                  @if ($errors->has('description'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('description') }}
                                      </div>
                                  @endif
                          </div>
                          <div class="form-group {{ $errors->has('intrests') ? ' has-error' : '' }}">
                                  <div class="form-group"> <!-- intrests field -->
                                    <label class="control-label " for="intrests">intrests</label>
                                    <textarea class="form-control" value="{{ old('intrests') }}" required="required" name="intrests" id="intrests">{{ old('intrests') }}</textarea>
                                  </div>
                                  @if ($errors->has('intrests'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('intrests') }}
                                      </div>
                                  @endif
                          </div>
                           <div class="form-group {{ $errors->has('target') ? ' has-error' : '' }}">
                                  <div class="form-group"> <!-- target field -->
                                    <label class="control-label " for="target">target</label>
                                    <textarea class="form-control" value="{{ old('target') }}" required="required" name="target" id="target">{{ old('target') }}</textarea>
                                  </div>
                                  @if ($errors->has('target'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('target') }}
                                      </div>
                                  @endif
                          </div>

                          <div class="form-group">
                            <label  class="control-label" for="exampleSelect1">Privacy</label>
                            <select name="open" value="{{ old('open') }}" class="form-control" id="exampleSelect1">
                            <option value="1">open</option>
                            <option value="0">close</option>
                            </select>
                        </div>

                          <div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
                              <label for="name" class="control-label">uplode cover</label>
                                  <input id="name" type="file" accept="image/*" class="form-control" name="cover" />
                                  @if ($errors->has('cover'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('cover') }}
                                      </div>
                                  @endif
                          </div>

                          <div class="form-group{{ $errors->has('startDate') ? ' has-error' : '' }}">
                              <label for="name" class="form-control-label">Start Date</label>
                              <input id="name" type="date" class="form-control" name="startDate" min = "<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>"
                                  required="required" />
                                  @if ($errors->has('startDate'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('startDate') }}
                                      </div>
                                  @endif
                          </div>

                          <div class="form-group{{ $errors->has('endDate') ? ' has-error' : '' }}">
                              <label for="name" class=" form-control-label">End Date</label>
                                  <input id="name" type="date" class="form-control" name="endDate" min="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>"
                                  required="required" />
                                  @if ($errors->has('endDate'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('endDate') }}
                                      </div>
                                  @endif
                          </div>

                          <div class="form-group">
                                  <button id="register" type="submit" class="btn btn-success btn-green btn-block">Create Event</button>
                          </div>

                      </form>
                </div>
            </div>
        </div>
        </div>

        <div class="tab-pane" id="upComingEvents" role="tabpanel">
        <div class="col-lg-8 offset-md-2">

        </div>
        </div>

        <div class="tab-pane" id="myArchivedEvents" role="tabpanel">
        <div class="col-lg-8 offset-md-2">

        </div>
        </div>
                  </div>
              </div>
        </div>
    </div>
</div>
@endsection
