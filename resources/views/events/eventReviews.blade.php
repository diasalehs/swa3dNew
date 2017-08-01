@if($archived == 1)
                  <h3 class="greencolor " style="margin-top:30px;">Event Reviews</h3>
                <hr />
                @foreach($reviews as $review)
                    <div class="card" style="margin-bottom:20px;">
                      <div class="card-block">
                        <h4 class="card-title greencolor" ><a href="{{route('profile',$review->user_id)}}">{{$review->name}}</a></h4>
                        <h5 class="card-title greencolor" >{{$review->positive}}</h4>
                        <h5 class="card-title greencolor" >{{$review->negative}}</h4>
                          {{$review->created_at}}
                      </div>
                    </div>
                @endforeach
              @endif