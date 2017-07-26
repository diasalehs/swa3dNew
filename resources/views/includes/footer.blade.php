    <!-- Footer -->
    <footer id="myFooter" style="background-image: linear-gradient(rgba(19, 58, 83, 0.9),rgba(19, 58, 83, 0.9)),url({{ URL::to('/vendor/img/newlogo.png')}});">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 block col-md-3">

                    <img class="centered img-fluid brand-img" src="{{ URL::to('/vendor/img/newlogo.png') }} " alt="" style="">
                  </div>
                <div  class="col-sm-2">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="{{route('main')}}">Home</a></li>
                        <li><a href="#"data-toggle="modal" data-target="#myModal">Join us</a></li>
                        <li><a href="{{route('upComingEvents')}}">Volunteer Now</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="social-networks" id="w">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <button type="button" class="btn btn-default">DONATE NOW</button>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© Copyright <?php echo date('Y'); ?> SWA3ED </p>
        </div>
    </footer>
    </div>



    <!-- Script to Activate the Carousel -->
    <script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
    @yield('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <script type="text/javascript">

    $(document).ready(function() {
       var table = $('#inviteT').DataTable({
          'columnDefs': [
             {
                'targets': 0,
                'render': function(data, type, row, meta){
                       if(type === 'display'){
                          data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                       }

                       return data;
                    },
                'checkboxes': {
                   'selectRow': true,
                   'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'

                }
             }
          ],
          'select': {
             'style': 'multi'
          },
          'order': [[1, 'asc']]
       });

       // Handle form submission event
       $('#frm-invite').on('submit', function(e){
          var form = this;

          var rows_selected = table.column(0).checkboxes.selected();

          // Iterate over all selected checkboxes
          $.each(rows_selected, function(index, rowId){
             // Create a hidden element
             $(form).append(
                 $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'invited[]')
                    .val(rowId)
             );
          });


       });
    });


    </script>

    <script type="text/javascript">
    $(document).ready(function() {

    function yesnoCheck(that) {
            if (that.value == "PS") {
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
    $(document).ready(function()
        {

          $('.selectpicker').selectpicker();

          $('.carousel').carousel({
              interval: 5000 //changes the speed
          });

        });
      });

    </script>
</body>

</html>
