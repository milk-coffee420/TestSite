
<nav class="navbar pc" role="navigation" aria-label="main navigation">
    <div class="container">

        <div class="navbar-menu">
            <div class="navbar-start">

                <a href="{{ route('course.graduate') }}" class="navbar-item menu__single {{ Request::is('course/graduate') ? 'active' : '' }}">浪人生</a>
                <a class="navbar-item menu__single {{ Request::is('course/senior_highschool') ? 'active' : '' }}" href="{{ route('course.senior_highschool.index') }}">高校3年生</a>
                <a class="navbar-item menu__single {{ Request::is('course/highschool') ? 'active' : '' }}" href="{{ route('course.highschool.index') }}">高校1・2年生</a>
                <a class="navbar-item menu__single {{ Request::is('course/junior_highschool') ? 'active' : '' }}" href="{{ route('course.junior_highschool.index') }}">中学生</a>
                <a class="navbar-item menu__single {{ Request::is('course/society') ? 'active' : '' }}" href="{{ route('course.society.index') }}">社会人</a>
                <a class="navbar-item menu__single {{ Request::is('course/university_student') ? 'active' : '' }}" href="{{ route('course.university_student') }}">芸大美大専門学校生</a>

            </div>

        </div>
    </div>
</nav>
