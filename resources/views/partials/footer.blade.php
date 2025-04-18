<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <p class="mb-4"><img src="{{asset('assets/images/logo.jpg')}}" alt="Image" class="img-fluid"></p>
                <p>Academics play a crucial role in shaping the future of individuals and society as a whole.</p>
                <p><a href="{{ route('home') }}">Learn More</a></p>
            </div>
            <div class="col-lg-3">
                <h3 class="footer-heading"><span>News & Updates</span></h3>
                <ul class="list-unstyled">
                    @php
                    $news = App\Models\News::all();
                    @endphp
                    @foreach ($news as $new)
                    <li><a href="{{ route('news.show', $new->id) }}">{{ $new->title }}</a></li>
                    @endforeach
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
                <h3 class="footer-heading"><span>Our Teachers</span></h3>
                <ul class="list-unstyled">
                    @php
                    $teachers = App\Models\Teachers::all();
                    @endphp
                    @foreach ($teachers as $teacher)
                    <li><a href="{{ route('about', $teacher->id) }}">{{ $teacher->name }}</a></li>
                    @endforeach
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