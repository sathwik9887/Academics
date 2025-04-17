<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <p class="mb-4"><img src="{{asset('assets/images/logo.jpg')}}" alt="Image" class="img-fluid"></p>
                <p>Academics play a crucial role in shaping the future of individuals and society as a whole.</p>
                <p><a href="{{ route('home') }}">Learn More</a></p>
            </div>
            <div class="col-lg-3">
                <h3 class="footer-heading"><span>Our Campus</span></h3>
                <ul class="list-unstyled">
                    <li><a href="#">Acedemic</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Our Interns</a></li>
                    <li><a href="#">Our Leadership</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Human Resources</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h3 class="footer-heading"><span>Our Courses</span></h3>
                <ul class="list-unstyled">
                    @php
                    $courses = App\Models\Courses::all();
                    @endphp
                    @foreach ($courses as $course)
                    <li><a href="{{ route('course.show', $course->id) }}">{{ $course->courseName }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-3">
                <h3 class="footer-heading"><span>Contact</span></h3>
                <ul class="list-unstyled">
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Support Community</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Share Your Story</a></li>
                    <li><a href="#">Our Supporters</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="copyright">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved |<a href="{{ route('home') }}"> Academics</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
