<div class="td-sidebar pd-10 bg-gray">
    <div class="widget widget_catagory">
        <h4 class="widget-title">{{ $department->department_name }}</h4>
        <ul class="catagory-items">
            <li><a href="/frontend/department_wise_faculty/{{ $department->id }}"><i
                        class="fa fa-angle-right"></i>Faculty member</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i>Academic > Program</a></li>
            <li><a href="/frontend/department_wise_tution/{{ $department->id }}"><i
                        class="fa fa-angle-right"></i>Tution Fees</a></li>
            <li><a href="{{ url('departments/' . $department->id . '/publications') }}"><i class="fa fa-angle-right"></i>Publications</a></li>
            <li><a href="/frontend/student_advisor/{{ $department->id }}"><i class="fa fa-angle-right"></i>Student
                    Advisor</a></li>
            <li><a href="/frontend/former_head/{{ $department->id }}"><i class="fa fa-angle-right"></i>Former Head</a>
            </li>
            <li><a href="{{ url('departments/' . $department->id . '/officer') }}"><i class="fa fa-angle-right"></i>Officer</a></li>
            <li><a href="{{ url('departments/' . $department->id . '/schollerships') }}"><i
                        class="fa fa-angle-right"></i>Schollership</a></li>
            <li><a href="{{ url('departments/' . $department->id . '/activities') }}"><i class="fa fa-angle-right"></i>Activities</a>
            </li>
            <li><a href="{{ url('departments/' . $department->id . '/award_honours') }}"><i class="fa fa-angle-right"></i>Awards & Honours</a></li>
            <!-- Awards & Honours> Research Award, Service Award, Teaching Award -->
            <li><a href="{{ url('departments/' . $department->id . '/contents?type=Annoucement') }}"><i class="fa fa-angle-right"></i>Annoucement</a></li>
            <li><a href="{{ url('departments/' . $department->id . '/contents?type=Alumni') }}"><i class="fa fa-angle-right"></i>Alumni</a></li>
            <li><a href="{{ url('departments/' . $department->id . '/contents?type=Lab_Facilities') }}"><i class="fa fa-angle-right"></i>Lab Facilities</a></li>
            <li><a href="{{ url('frontend/departments/'. $department->id . '/news') }}"><i class="fa fa-angle-right"></i>News</a></li>
            <li><a href="{{ url('frontend/departments/'. $department->id . '/galleries') }}"><i class="fa fa-angle-right"></i>Gallery</a></li>
            <li><a href="{{ url('departments/' . $department->id . '/contact') }}"><i class="fa fa-angle-right"></i>Contact Us</a></li>
        </ul>
    </div>
</div>
