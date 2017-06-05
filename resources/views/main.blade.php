@extends('layouts.master')

@section('content')

    <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>First Slide</h3>
                        <p>This is a description for the first slide.</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Second Slide</h3>
                        <p>This is a description for the second slide.</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Third Slide</h3>
                        <p>This is a description for the third slide.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
       
    </header>

    <!-- Page Content -->
    <div class="container-fluid">
    <div class="section">
        <h1 class="my-4 section-title text-center">The Latest</h1>

        <div class="row">
            <div class="col-lg-4 col-sm-6 ">
                <div class="card news-item">
                    <a href="#"><img class="card-img-top img-fluid" src="http://placehold.it/700x400" alt=""></a>
                    <div class="card-block">
                        <a href="#" class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 ">
                <div class="card news-item">
                    <a href="#"><img class="card-img-top img-fluid" src="http://placehold.it/700x400" alt=""></a>
                    <div class="card-block">
                        <a href="#" class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 ">
                <div class="card news-item">
                    <a href="#"><img class="card-img-top img-fluid" src="http://placehold.it/700x400" alt=""></a>
                    <div class="card-block">
                        <a href="#" class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</a>
                    </div>
                </div>
            </div>
          
            </div>
              <div class="text-center ">
                <button type="button" class="btn btn-primary btn-lg show-more-btn">More News</button>
            </div>
            </div>
        <!-- Marketing Icons Section -->
       
        <hr class="my-4">

        <!-- Portfolio Section -->
        <div class="section ">
        <h1 class="my-4 section-title text-center">Researchs</h1>
  <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card research-card">
                    <h4 class="card-header">Research Title</h4>
                    <div class="card-block">
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                        <p class="RN">Researcher Name.</p>
                    </div>
                    <div class="card-footer text-center ">
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card research-card">
                    <h4 class="card-header">Research Title</h4>
                    <div class="card-block">
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.</p>
                        <p class="RN">Researcher Name.</p>

                    </div>
                    <div class="card-footer text-center ">
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card research-card">
                    <h4 class="card-header">Research Title</h4>
                    <div class="card-block">
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                        <p class="RN">Researcher Name.</p>

                    </div>
                    <div class="card-footer text-center ">
                        <a href="#" class="btn  btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        </div>
                    <hr class="my-4">

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-6">
                <h2>Modern Business Features</h2>
                <p>The Modern Business template by Start Bootstrap includes:</p>
                <ul>
                    <li><strong>Bootstrap v4</strong>
                    </li>
                    <li>jQuery</li>
                    <li>Font Awesome</li>
                    <li>Working contact form with validation</li>
                    <li>Unstyled page elements for easy customization</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
            </div>
        </div>




@endsection('content')