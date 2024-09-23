
@extends('layout.navbar')



@section('navbar')
@endsection

@section('content')
<section id="courses" class="courses section">
<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
    <h2>Courses</h2>
    <p>Popular Courses</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row">

      @foreach ($courses as $course)

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
        <div class="course-item">
          <img src="/images/{{$course->image}}" class="img-fluid" width="300px">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <p class="category">{{$course->label}}</p>
              <p class="price">${{$course->price}}</p>
            </div>

            <h3><a href="course-details.html">{{$course->title}}</a></h3>
            <p class="description">{{$course->description}}.</p>
            <div class="trainer d-flex justify-content-between align-items-center">
              <div class="trainer-profile d-flex align-items-center">
                <img src="/image/{{$course->master_image}}" class="img-fluid" alt="" >
                <a href="" class="trainer-link">{{$course->master_name}}</a>
              </div>

            </div>
          </div>
        </div>
      </div>
      @endforeach
      </div> <!-- End Course Item-->

         </div>

  </div>
</section><!-- End Courses Section -->

@endsection







