
                  

              <select class="selectpicker" name="invitedEvent[]" multiple data-actions-box="true" data-size="7" data-live-search="true" >
                @foreach($userUevents as $userUevent)
                <option value="{{$userUevent->id}}">{{$userUevent->title}}</option>
                @endforeach
              </select>

                        <div class="form-group">
                          <button type="submit" class="btn btn-block btn-green">Invite</button>
                        </div>

