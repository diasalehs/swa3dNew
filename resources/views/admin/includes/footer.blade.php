    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
        </div>
        <!-- /.container -->
    </footer>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	    <!-- Bootstrap core JavaScript -->
	    <script src="{{URL::asset('vendor/js/jquery.js')}} "></script>
	    <script src="{{URL::asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	    <script src="{{URL::asset('vendor/js/scripts.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    $(document).ready(function() {
   var max_fields      = 10; //maximum input boxes allowed
   var wrapper         = $(".input_fields_wrap"); //Fields wrapper
   var add_button      = $(".add_field_button"); //Add button ID

   var x = 1; //initlal text box count
   $(add_button).click(function(e){ //on add input button click
       e.preventDefault();
       if(x < max_fields){ //max input box allowed
        //text box increment
           $(wrapper).append('<div style="margin:0px;" class="row form-group"><label for="name" class="form-control-label">Answer'+ x +'</label><input type="text"class="form-control col-sm-10 col-md-6 " style=" margin-bottom:6px;"name="answers[]"/><a href="#" class="remove_field col-sm-2 col-md-3">Remove</a></div>'); //add input box
              x++; 
       }
   });

   $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
       e.preventDefault(); $(this).parent('div').remove(); x--;
   })
});
    </script>
</body>

</html>
