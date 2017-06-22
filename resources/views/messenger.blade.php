@extends('layouts.app')
 @section('content')


<div class="container" style="margin:100px auto">
    <div class="row " style="display:block">        

<ul class="nav nav-tabs sw-nav-tabs " role="tablist">
  <li class="nav-item col-4 col-lg-3  first-tab">
    <a class="nav-link active" data-toggle="tab" href="#Messenger" role="tab">Messanger</a>
  </li>
<li class="nav-item col-4 col-lg-3  second-tab">
    <a class="nav-link " data-toggle="tab" href="#sentMessages" role="tab">Sent Messages</a>
  </li>
  <li class="nav-item col-4 col-lg-3  third-tab ">
    <a class="nav-link" data-toggle="tab" href="#receivedMessages" role="tab">Received Messages</a>
  </li>

</ul>

<div class="tab-content">
  <div class="tab-pane active" id="Messenger" role="tabpanel">

        <div class="col-lg-8 offset-md-2">
            <div class="card">
                <div class="card-header">Messenger</div>
                <div class="card-block">
                    <form class="" role="form" method="POST" action="{{ route('sendMessage') }}">{{ csrf_field() }}


                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-lg-4 form-control-label">Title</label>
                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" name="title" value="Without Title"
                                required="required" />
                                @if ($errors->has('title'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('title') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-lg-4 form-control-label">Email</label>
                            <div class="col-lg-6">
                                <input id="name" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                required="required" />
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="title" class="col-lg-4 form-control-label">Body</label>
                            <div class="col-lg-6">
                                <textarea class="form-control" required="required" name="body" id="body">{{ old('body') }}</textarea>
                                @if ($errors->has('body'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('body') }}
                                    </div>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-lg-4 offset-md-4">
                                <button type="submit" class="btn btn-success btn-block">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

        <div class="tab-pane" id="sentMessages" role="tabpanel">
        <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
          <h1>Sent Messages</h1>
          <table class="table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>receiver</th>
                  <th>send Date</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($sentMessages as $sentMessage)
                    <tr>
                    <td>
                    <a class="green-link"  href="">{{$sentMessage->title}}</a>
                    </td>
                    <td>{{$sentMessage->name}}</td>
                    <td>{{$sentMessage->created_at}}</td>
                    </tr>
              @endforeach
              </tbody>
          </table>
         </div>
        </div>

        <div class="tab-pane" id="receivedMessages" role="tabpanel">
        <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
          <h1>Received Messages</h1>
          <table class="table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>sender</th>
                  <th>send Date</th>
                </tr>
              </thead>
              <tbody>
        @foreach($receivedMessages as $receivedMessage)
                    <tr>
                    <td>
                    <a class="green-link"  href="">{{$receivedMessage->title}}</a>
                    </td>
                    <td>{{$receivedMessage->name}}</td>
                    <td>{{$receivedMessage->created_at}}</td>
                    </tr>
        @endforeach
        </tbody>
          </table>

         </div>
        </div>

    </div>
</div>
