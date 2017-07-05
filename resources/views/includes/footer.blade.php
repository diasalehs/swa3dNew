    <!-- Footer -->
    <footer id="myFooter" style="background-image: linear-gradient(rgba(19, 58, 83, 0.9),rgba(19, 58, 83, 0.9)),url({{ URL::to('/vendor/img/newlogo.png')}});">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 block col-md-3">

                    <img class="centered img-fluid brand-img" src="{{ URL::to('/vendor/img/newlogo.png') }} " alt="" style=""></div>
                <div class="col-sm-2">
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


	    <!-- Bootstrap core JavaScript -->
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	    <script src="{{URL::asset('vendor/js/scripts.js')}}"></script>
      <script src="{{URL::asset('vendor/js/jstarbox.js')}} "></script>

    <script type="text/javascript">

    $(document).ready(function()
        {
          $('a[href="#search"]').on('click', function(event) {
            event.preventDefault();
            $('#search').addClass('open');
            $('#search > form > input[type="search"]').focus();
        });

        $('#search, #search button.close').on('click keyup', function(event) {
            if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
                $(this).removeClass('open');
            }
        });


        //Do not include! This prevents the form from submitting for DEMO purposes only!
        $('form').submit(function(event) {
            event.preventDefault();
            return false;
        })
            $('[data-toggle="popover"]').popover();
          $('option').mousedown(function(e) {
              e.preventDefault();
              $(this).prop('selected', $(this).prop('selected') ? false : true);
              return false;
          });


              $('.carousel').carousel({
                  interval: 5000 //changes the speed
              });

            $('#ntab').on('click',function(){

              $('#nnnn').attr('style', 'border-bottom: 3px solid var(--green) !important');

            });
            $('#rtab').on('click',function(){

              $('#nnnn').attr('style', 'border-bottom: 3px solid var(--pink)  !important');

            });
            $('#dtab').on('click',function(){

              $('#nnnn').attr('style', 'border-bottom: 3px solid var(--yellow) !important');

            });
          });

    </script>

    <script>
        $('.c').starbox({
        average: 0.5,
        autoUpdateAverage: true,
        ghosting: true,
        changeable:true,
        buttons:10
      });
      $('.showrate').starbox({
      average: 0.5,
      autoUpdateAverage: false,
      ghosting: false,
      changeable:false,
      buttons:10
    });
      function rate(r) {
        //  alert($('#r'+r).starbox('getValue'));
          $('.cat'+r).val($('#r'+r).starbox('getValue'));

       }

         //  alert($('#r'+r).starbox('getValue'));
         var i = 0;
         while (true) {
           i++;
           $('#sh'+i).starbox('setValue',$('#shr'+i).text());
           if (i > 7) {
             break;
           }
         }


    </script>
</body>

</html>
