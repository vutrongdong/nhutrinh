<div class="owl-wrapper-outer">
    <div id="myCarousel" class="carousel slide mb-2" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach($slides_header as $slide)
                @if($loop->iteration == 1)
                    <div class="carousel-item active">
                        <img src="upload/slide/{{$slide->image}}" alt="Los Angeles" class="d-block w-100">
                    </div>
                @else
                    <div class="carousel-item">
                        <img src="upload/slide/{{$slide->image}}" alt="Los Angeles" class="d-block w-100">
                    </div>
                @endif
            @endforeach
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>