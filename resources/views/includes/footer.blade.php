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
      <script src="{{URL::asset('vendor/js/jquery.js')}} "></script>
      <script src="{{URL::asset('vendor/js/jstarbox.js')}} "></script>



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

        var i = 0;
        while (true) {
          i++;
          $('#sh'+i).starbox('setValue',$('#shr'+i).text()/5);
          if (i > 7) {
            break;
          }
        }


      function rate(r) {
        //  alert($('#r'+r).starbox('getValue'));
          $('.cat'+r).val($('#r'+r).starbox('getValue'));
          $('.cat'+r).val($('.cat'+r).val()*5)
       }
         //  alert($('#r'+r).starbox('getValue'));

    </script>
    <script src="{{URL::asset('vendor/jquery.caret.min.js')}} "></script>
    <script src="{{URL::asset('vendor/jquery.tag-editor.min.js')}} "></script>

    <script type="text/javascript">
    $('#tags').tagEditor({
        initialTags: [],
        delimiter: ', ', /* space and comma */
        placeholder: 'Enter tags ...'
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js" integrity="sha256-SiHXR50l06UwJvHhFY4e5vzwq75vEHH+8fFNpkXePr0=" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js" integrity="sha256-VNbX9NjQNRW+Bk02G/RO6WiTKuhncWI4Ey7LkSbE+5s=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="{{URL::asset('vendor/js/jstarbox.js')}} "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="{{URL::asset('vendor/js/scripts.js')}}"></script>
    <script src="{{URL::asset('vendor/js/bootstrap-select.js')}} "></script>
    <!-- Datatables -->
    <script src="{{URL::asset('vendor/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('vendor/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('vendor/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('vendor/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('vendor/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{URL::asset('vendor/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('vendor/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('vendor/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{URL::asset('vendor/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{URL::asset('vendor/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('vendor/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{URL::asset('vendor/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{URL::asset('vendor/vendors/jszip/dist/jszip.min.js"></script>
    <script src="{{URL::asset('vendor/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{URL::asset('vendor/vendors/pdfmake/build/vfs_fonts.js"></script>

    <script type="text/javascript">

        AOS.init({
          duration: 1200,
          once: true,
        });
    function nextStep(){
      $('#step2nav').addClass('active');
      $('#step2content').addClass('active');
      $('#step1content').removeClass('active');
      $('#step1nav').removeClass('active');
    }
    function prevStep(){
      $('#step2nav').removeClass('active');
      $('#step2content').removeClass('active');
      $('#step1content').addClass('active');
      $('#step1nav').addClass('active');
    }
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

          $(".bs-searchbox :input").attr("placeholder", "Search...");
          $("[data-toggle=popover]").popover();

          $('.selectpicker').selectpicker();

              $('.carousel').carousel({
                  interval: 5000 //changes the speed
              });
              $('option').mousedown(function(e) {
                  e.preventDefault();
                  $(this).prop('selected', $(this).prop('selected') ? false : true);
                  return false;
              });

            $('#ntab').on('click',function(){

              $('#nnnn').attr('style', 'border-bottom: 3px solid var(--green) !important');

            });
            $('#rtab').on('click',function(){

              $('#nnnn').attr('style', 'border-bottom: 3px solid var(--pink)  !important');

            });
            $('#dtab').on('click',function(){
              var ctx = document.getElementById("myChart").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                  labels: ["Males", "Female"],
                  datasets: [{
                    backgroundColor: [
                      "#f06493",
                      "#51c2c0"
                    ],
                    data: [50,40]
                  }]
                }
              });
              $('#nnnn').attr('style', 'border-bottom: 3px solid var(--yellow) !important');

            });
          });

    </script>
</body>

</html>
