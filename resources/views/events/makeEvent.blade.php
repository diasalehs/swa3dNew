@extends('layouts.master')
 @section('content')


<div class="container" style="margin:20px auto;min-height:500px">

<ul class="nav nav-tabs sw-nav-tabs " role="tablist" style="margin-bottom:30px;margin-top:40px;">
  <li class="nav-item col-4 col-lg-3  first-tab">
    <a class="nav-link "  href="{{route('myEvents')}}" >Up Coming Events    <span class="badge badge-default badge-pill">{{$Uevents->count()}}</span></a>
  </li>
  <li class="nav-item col-4 col-lg-3  second-tab">
    <a class="nav-link " href="{{route('archiveMyEvents')}}" >My Archived Events    <span class="badge badge-default badge-pill">{{$Aevents->count()}}</span></a>
  </li>
  <li class="nav-item col-4 col-lg-3  third-tab ">
    <a class="nav-link active" href="{{route('makeEvent')}}" >Create Event</a>
  </li>
</ul>


        <div class="col-lg-10 offset-md-1" >
            <div class="card">
                <div class="card-header">Create Event</div>
                <div class="card-block">
                    <form class=""  enctype="multipart/form-data"  role="form" method="POST" action="{{ route('makeEventPost') }}">{{ csrf_field() }}

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
{{--  --}}
{{--  --}}{{--
                          <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                  <div class="form-group"> <!-- Description field -->
                                    <label class="control-label " for="country">Counrty</label>
                                    <input class="form-control" value="{{ old('country') }}" required="required" name="country" id="counrty" value="{{ old('country') }}" />
                                  </div>
                                  @if ($errors->has('country'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('country') }}
                                      </div>
                                  @endif
                          </div> --}}


                        <div class=" form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                        <label for="name" class=" form-control-label">Country</label>
                        <div class="">
                               @include('includes.countriesModal')

                        @if ($errors->has('country'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Warning!</strong> {{ $errors->first('country') }}
                            </div>
                        @endif
                    </div>
                </div>
                                              {{--  --}}{{--  --}}
                  <div id="palestineCity"  class="form-group{{ $errors->has('cityName') ? ' has-error' : '' }}">
                      <label for="email" class=" form-control-label">City name</label>
                      <div class="">
                          <select id="palC" name="cityName"  class="form-control">
                            <option value="nablus">Nablus</option>
                            <option value="jericho">Jericho (Ariha)</option>
                            <option value="qabatiya ">Qabatiya  </option>
                          </select>
                          @if ($errors->has('cityName'))
                              <div class="alert alert-danger" role="alert">
                                  <strong>Warning!</strong> {{ $errors->first('cityName') }}
                              </div>
                          @endif
                      </div>
                  </div>
                                              {{--  --}}{{--  --}}
                <div id="otherCity" style="display:none" class=" form-group{{ $errors->has('cityName') ? ' has-error' : '' }}">
                    <label for="email" class="form-control-label">City name</label>
                    <div class="">
                        <input id="otherC" name="x"  type="text" class="form-control" value="{{ old('cityName') }}"
                         />
                        @if ($errors->has('cityName'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Warning!</strong> {{ $errors->first('cityName') }}
                            </div>
                        @endif
                    </div>
                </div>
{{--    --}}
{{--    --}}

                          <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                  <div class="form-group"> <!-- Description field -->
                                    <label class="control-label " for="description">Description</label>
                                    <textarea class="form-control" value="{{ old('description') }}" required="required" name="description" id="description" rows="6">{{ old('description') }}</textarea>
                                  </div>
                                  @if ($errors->has('description'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('description') }}
                                      </div>
                                  @endif
                          </div>

                          <div class="form-group {{ $errors->has('goals') ? ' has-error' : '' }}">
                                  <div class="form-group"> <!-- Description field -->
                                    <label class="control-label " for="goals">Goals</label>
                                    <textarea class="form-control" value="{{ old('goals') }}" required="required" name="goals" id="goals" rows="6">{{ old('goals') }}</textarea>
                                  </div>
                                  @if ($errors->has('goals'))
                                      <div class="alert alert-danger" role="alert">
                                          <strong>Warning!</strong> {{ $errors->first('goals') }}
                                      </div>
                                  @endif
                          </div>

                  <label class="control-label " for="intrests">Intrests</label>
<br>
<br>

                        <div class="row">
                         @foreach($intrests as $i)
                          <div class="form-check col-4">
                            <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input name="intrests[]" value="{{$i->id}}" type="checkbox" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">{{$i->name}}</span>
                            </label>
                          </div>
                          @endforeach
                      </div>
                      <hr />

                     <label class="control-label " for="intrests">Targets</label>
                     <br>
                     <br>
                     <div class="row">
                         @foreach($targets as $t)
                          <div class="form-check col-4">
                            <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input name="targets[]" value="{{$t->id}}" type="checkbox" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">{{$t->name}}</span>
                            </label>
                          </div>
                          @endforeach
                      </div>
<hr />

                          <div class="form-group">
                            <label  class="control-label" for="exampleSelect1">Privacy</label>
                            <select name="open" value="{{ old('open') }}" class="form-control" id="exampleSelect1">
                            <option value="1">public</option>
                            <option value="0">private</option>
                            </select>
                        </div>

                          <div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
                              <label for="name" class="control-label">Cover photo</label>
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

                          <div class="form-group col-md-6 offset-md-3 col-sm-12">
                                  <button id="register" type="submit" class="btn  btn-green btn-block">Create Event</button>
                          </div>

                      </form>
                </div>
            </div>
        </div>
        </div>

                </div>
              </div>

@endsection
@section('scripts')

  <script type="text/javascript">

  function yesnoCheck(that) {
          if (that.value == "Palestine") {
              document.getElementById("palestineCity").style.display = "block";
              document.getElementById("otherCity").style.display = "none";
              $('#palC').attr('name', 'cityName');
              $('#otherC').attr('name', 'x');

          } else {
            document.getElementById("otherCity").style.display = "block";
            document.getElementById("palestineCity").style.display = "none";
            $('#otherC').attr('name', 'cityName');
            $('#palC').attr('name', 'x');

          }
      }
      function vyyesno(that) {
              if (that.value == "0") {
                  document.getElementById("vyn").style.display = "none";
              } else {
                document.getElementById("vyn").style.display = "block";
              }
          }
          </script>

 @endsection
