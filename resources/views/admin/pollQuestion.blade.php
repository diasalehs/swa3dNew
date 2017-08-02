
@extends('admin/layouts.adminMaster')

@section('content')

    <div class="container-fluid">
    @include('admin/includes.adminSidebar')
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <div class="row">
                <div class="col-lg-12">

                @foreach($pollQuestions as $pollQuestion)
                       question {{$pollQuestion->question}}
                       <br>
                       answers:
                       <br>
                    @foreach($pollQuestion->PollQuestionAnswer as $answer)
                        {{$answer->answer}}
                    @endforeach
                    <br>
                    <br>
                @endforeach
                    <form  method="POST" action="{{route('pollQuestionPost')}}">{{ csrf_field() }}

                        <div class="form-group {{ $errors->has('question') ? ' has-error' : '' }}">
                            <label for="name" class="form-control-label">Question</label>
                                <input id="targeted_segments" type="text" class="form-control" name="question" value="{{ old('question') }}"
                                required="required" autofocus="autofocus" />
                        </div>
                        <div class="input_fields_wrap">
                            <button class="add_field_button" style="margin-bottom:10px;">Add Answers</button>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary " name="submit" type="submit">Publish</button>
                        </div>


                    </form>
                </div>
            </div>

        </main>
</div>

    @endsection('content')
