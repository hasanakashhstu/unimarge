

@extends('admin.index')
@section('Title', 'Aplicant Student Details')
@section('breadcrumbs', 'Aplicant Student Details')
@section('breadcrumbs_link', '/applicant_student_report')
@section('breadcrumbs_title', 'Applicant Student Report')

@section('content')

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade in">
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{ Session::get('success') }}
</div>

@endif


@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade in">
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Wrong!</strong> <?php echo Session::get('error'); ?>
</div>

@endif

<div class="container">
    <h2><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Applicant Student Details</h2> <!-- Tab Heading  -->
    <p title="Transport Details">{{ Session::get('school.system_name') }} Applicant Student Details</p>
    <!-- Transport Details -->


    <div class="panel panel-default text-right">
        <div class="panel-body">
            <ul class='dropdown_test'>
                <li>
                    <input type="button" class="btn btn-success btn-sm" onclick="printDivision('printableAreaGrab')" value="print" />

                </li>
                <li><a href='/aplicant_student'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Applicant
                        Student</a></li>
                <li><a href='/admit_student'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Admit Student</a>
                </li>
                <li><a href='/student_promoation'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Student
                        Promoation </a></li>

            </ul>
        </div>
    </div>


    <div class="tab-content">
        <!-- Transport List Report  -->

        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Applicant Student Details</h5>
                </div>

                <div class="widget-content nopadding"  id="printableAreaGrab">

                    <!-- header section -->
                    <div class="header_secton">
                        <div class="header-col-1">
                            <div class="logo">
                                <img src="{{ asset('img/logo.png') }}" style="height: 80%;
                                     margin-left: 0px;
                                     margin-top: 0%;
                                     width: 80px;" />
                            </div>
                        </div>

                        <div class="header-col-2">
                            <div class="header_main_title">
                                <h2>Z.H. Sikder University of Science and Technology</h2>
                                <h6 class="text-center">Vill: Madhupur, PO: Kartikpur, PS: Bhedergonj, Shariatpur-8024</h6>
                                <div class="heading_admission_text">
                                    <h4>ADMISSION FORM</h4>
                                </div>
                                <p>Please fill in the Form in block capitals.</p>
                            </div>
                        </div>

                        <div class="header-col-3">
                            <div class="attach_pic">
                                <span>
                                    Please affix three (3) copies of your recent
                                    passport-sized photographs here.
                                </span>
                            </div>
                        </div>

                    </div>
                    <!-- header section X-->

                    <!-- Semester & Degree -->
                    <div class="semester_degree">
                        <div class="semes_deg_col_1">
                            <div class="degree">
                                <div class="text">Program Name</div>
                                <!-- <div class="select_box"></div> -->
                                <div class="deg_val">
                                    <p>{{ $degree}}</p> 
                                </div>
                            </div>

                        </div>
                        <div class="semes_deg_col_2">
                            <div class="semester">
                                <div class="text">Semester Name </div>
                                <!-- <div class="select_box"></div> -->
                                <div class="semes_val">
                                    <p>{{ $session_choose}}</p> 
                                </div>
                            </div>
                        </div>
                        <div class="semes_deg_col_3">
                            <div class="semester_year">
                                <div class="text">Semester Year </div>
                                <!-- <div class="select_box"></div> -->
                                <div class="semes_year_val">
                                    <p>{{$session }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Semester & Degree X -->

                    <!-- Department & Hall -->
                    <div class="department_and_hall">
                        <div class="depat_hall_col_1">
                            <div class="department_title">Department Name</div>
                            <div class="department_name">
                                <p>{{$department[0]->department_name }}</p>
                            </div>
                        </div>
                        <div class="depat_hall_col_2">
                            <div class="hall_title">Hall of Residence</div>
                            <div class="hall_name">
                                <p>{{$hall_of_residence[0]->dormitory_name }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Department & Hall X -->

                    <!-- Aplicant information -->
                    <div class="applicant_info">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th colspan="6">APPLICANT’S INFORMATION</th>
                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    <th rowspan="2" style="width: 100px">Applicant/Student Name</th>
                                    <th style="width: 100px">in Bangla</th>
                                    <td>{{ $student_name_bangla }}</td>
                                    <th>Religion</th>
                                    <td>{{ $religion[0]->name}} </td>

                                </tr>
                                <tr>
                                    <th>in English</th>
                                    <td>{{ $student_name}}</td>
                                    <th style="width: 120px">Nationality</th>
                                    <td>{{ $nationality[0]->name}}</td>
                                </tr>

                                <tr>
                                    <th colspan="2">National ID No.(If Any)</th>
                                    <td>{{$nid_birth}}</td>
                                    <th>Marital Status</th>
                                    <td>{{$maritial[0]->name }}</td>
                                </tr>

                                <tr>
                                    <th colspan="2">Date of Birth</th>
                                    <td>{{ $birth_date }}</td>
                                    <th>Blood Group</th>
                                    <td>{{ $blood_group[0]->name}}</td>
                                </tr>

                                <tr>
                                    <th colspan="2">Birth Registration No</th>
                                    <td>{{ $birth_registration}}</td>
                                    <th>Income of the Guardian</th>
                                    <td>{{$income_guardian}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- Aplicant info X -->


                    <!-- FATHER’S INFORMATION -->
                    <div class="fathers_info">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th colspan="6">FATHER’S INFORMATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th rowspan="2" style="width: 100px">Father's Name</th>
                                    <th style="width: 100px">in Bangla</th>
                                    <td>{{$father_name_bangla}}</td>
                                    <th>National ID No.</th>
                                    <td>{{$father_national_id_no}}</td>

                                </tr>
                                <tr>
                                    <th>in English</th>
                                    <td>{{$father_name}}</td>
                                    <th style="width: 120px">Occupation</th>
                                    <td>{{$father_occupation}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- FATHER’S INFORMATION X -->

                    <!-- MOTHER'S INFORMATION -->
                    <div class="mothers_info">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th colspan="6">MOTHER'S INFORMATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th rowspan="2" style="width: 100px">Mother's Name</th>
                                    <th style="width: 100px">in Bangla</th>
                                    <td>{{$mother_name_bangla}}</td>
                                    <th>National ID No.</th>
                                    <td>{{$mother_national_id_no}}</td>

                                </tr>
                                <tr>
                                    <th>in English</th>
                                    <td>{{$mother_name}}</td>
                                    <th style="width: 120px">Occupation</th>
                                    <td>{{$mother_occupation}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- MOTHER'S INFORMATION X -->

                    <!-- PREVIOUS ACADEMIC RECORDS  -->
                    <div class="mothers_info">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th colspan="8">PREVIOUS ACADEMIC RECORDS </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="width: 200px">Institution</th>
                                    <th>Board/University</th>
                                    <th>Group</th>
                                    <th>Passing Year</th>
                                    <th>Reg No</th>
                                    <th>Roll No</th>
                                    <th>Division/GPA</th>


                                </tr>

                                @foreach($qualifincations as $qualifincation)
                                <tr>
                                    <td>{{$qualifincation['exam_name'] }}</td>
                                    <td>{{$qualifincation['borad'] }}</td>
                                    <td>{{$qualifincation['group'] }}</td>
                                    <td>{{$qualifincation['passing_year'] }}</td>
                                    <td>{{$qualifincation['reg_no'] }}</td>
                                    <td>{{$qualifincation['roll_no'] }}</td>
                                    <td>{{$qualifincation['gpa'] }}</td>
                                </tr>
                                @endforeach   

                            </tbody>
                        </table>
                    </div>
                    <!-- PREVIOUS ACADEMIC RECORDS  X -->

                    <!-- CREDIT TRANSFER -->
                    <div class="mothers_info">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th colspan="8">CREDIT TRANSFER </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Credit Transfer</th>
                                    <th>Institute Name</th>
                                    <th>Year</th>
                                    <th>Program Attended</th>
                                    <th>Credit Completed</th>
                                    <th>CGPA</th>
                                </tr>
                                <tr>
                                    <td>{{$credit_transfer}}</td>
                                    <td>{{$credit_name_of_university}}</td>
                                    <td>{{$transfer_year}}</td>
                                    <td>{{$semester}}</td>
                                    <td>{{$credit}}</td>
                                    <td>{{$cgpa}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- CREDIT TRANSFER X -->

                    <!-- Parmanent & Present Address -->
                    <div class="mothers_info">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th colspan="8">PARMANENT & PRESENT ADDRESS</th>
                                </tr>
                                <tr >
                                    <th colspan="8" style="margin:10px">Permanent Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="margin-left: 10px;">&nbsp;&nbsp;Division</th>
                                    <th>District</th>
                                    <th>Upazilla</th>
                                    <th>Union</th>
                                    <th>Village/House No.</th>
                                    <th>Post Code</th>
                                </tr>
                                <tr>
                                    <td>{{$division[0]->name}}</td>
                                    <td>{{$home_district[0]->name}}</td>
                                    <td>{{$upazilas[0]->name}}</td>
                                    <td>{{$unions[0]->name}}</td>
                                    <td>{{$post_office}}</td>
                                    <td>{{$village_name}}</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th colspan="8">Present Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>&nbsp;&nbsp;Division</th>
                                    <th>District</th>
                                    <th>Upazilla</th>
                                    <th>Union</th>
                                    <th>Village/House No.</th>
                                    <th>Post Code</th>
                                </tr>
                                <tr>
                                    <td>{{$present_division[0]->name}}</td>
                                    <td>{{$present_home_district[0]->name}}</td>
                                    <td>{{$present_upazilas[0]->name}}</td>
                                    <td>{{$present_unions[0]->name}}</td>
                                    <td>{{$present_post_office}}</td>
                                    <td>{{$present_village_name}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Parmanent & Present Address X -->

                    <!-- Quota-->
                    <div class="mothers_info">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th colspan="6">Quota</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>  
                                    <td>Meritorious (Science: Golder-5, Commerce/Arts: 5, Diploma (SSC:5 & Diploma: 3.80))</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Quota X -->

                    <!-- Legal Guardian in the Absence of Father(If Any) -->
                    <div class="mothers_info">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th colspan="8">LEGAL GUARDIAN IN THE ABSENCE OF FATHER(If Any)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th rowspan="2" style="width: 100px">Legal Guardian Name</th>
                                    <th style="width: 100px">in Bangla</th>
                                    <td colspan="3">{{$legal_gurdian_name_bangla}}</td>

                                </tr>
                                <tr>
                                    <th>in English</th>
                                    <td colspan="3">{{$legal_gurdian_name}}</td>
                                </tr>

                                <tr>
                                    <th colspan="2">Relationship</th>
                                    <td>{{$legal_gurdian_relation}}</td>
                                    <th style="width: 120px">Occupation</th>
                                    <td>{{$legal_gurdian_occupation}}</td>
                                </tr>

                                <tr>
                                    <th colspan="2">National ID No.</th>
                                    <td>{{$legal_gurdian_nid_no}}</td>
                                    <th>Contact No.</th>
                                    <td>{{$legal_gurdian_contact_no}}</td>
                                </tr>

                                <tr>
                                    <th colspan="2">Present Address</th>
                                    <td colspan="3">{{$legal_gurdian_address}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- Legal Guardian in the Absence of Father(If Any) X -->

                    <!-- LOCAL GUARDIAN OF THE APPLICANT -->
                    <div class="mothers_info">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th colspan="8">LOCAL GUARDIAN OF THE APPLICANT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th rowspan="2" style="width: 100px">Local Guardian Name</th>
                                    <th style="width: 100px">in Bangla</th>
                                    <td colspan="3">{{$local_gurdian_name_bangla}}</td>

                                </tr>
                                <tr>
                                    <th>in English</th>
                                    <td colspan="3">{{$local_gurdian_name}}</td>
                                </tr>

                                <tr>
                                    <th colspan="2">Relationship</th>
                                    <td>{{$local_gurdian_relation}}</td>
                                    <th style="width: 120px">Occupation</th>
                                    <td>{{$local_gurdian_occupation}}</td>
                                </tr>

                                <tr>
                                    <th colspan="2">National ID No.</th>
                                    <td>{{$local_gurdian_nid_no}}</td>
                                    <th>Contact No.</th>
                                    <td>{{$local_gurdian_contact_no}}</td>
                                </tr>

                                <tr>
                                    <th colspan="2">Present Address</th>
                                    <td colspan="3">{{$local_gurdian_address}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- LOCAL GUARDIAN OF THE APPLICANT X -->

                    <!-- Reference Information -->
                    <div class="fathers_info">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th colspan="6">REFERENCE INFORMATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th rowspan="6" style="width: 100px">Reference One</th>
                                    <th style="width: 100px">Name</th>
                                    <td>{{$reference_name}}</td>
                                    <th rowspan="6" style="width: 100px">Reference Two</th>
                                    <th style="width: 100px">Name</th>
                                    <td>{{$reference_name1}}</td>

                                </tr>
                                <tr>
                                    <th>Designation</th>
                                    <td>{{$reference_designation}}</td>
                                    <th>Designation</th>
                                    <td>{{$reference_designation1}}</td>
                                </tr>
                                <tr>
                                    <th>Institute Name</th>
                                    <td>{{$reference_institute_name}}</td>
                                    <th>Institute Name</th>
                                    <td>{{$reference_institute_name1}}</td>
                                </tr>
                                <tr>
                                    <th>NID No</th>
                                    <td>{{$reference_id_no}}</td>
                                    <th>NID No</th>
                                    <td>{{$reference_id_no1}}</td>
                                </tr>
                                <tr>
                                    <th>Mobile No.</th>
                                    <td>{{$reference_mobile_no}}</td>
                                    <th>Mobile No.</th>
                                    <td>{{$reference_mobile_no1}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Reference Information X -->

                    <!-- Attachments -->
                    <div class="fathers_info">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th colspan="6">ATTACHMENTS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th >Photo</th>
                                    <th>Signeture</th>
                                </tr>
                                <tr height='100'>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Attachments X -->

                    <!-- Payment -->
                    <div class="fathers_info">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th colspan="2">PAYMENT</th>
                                </tr>
                                <tr>
                                    <th colspan="2">Bkash Payment: Please pay 255 BDT at the +880154785468745</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th >Transaction ID</th>
                                    <th>Applicant Mobile No.</th>
                                </tr>
                                <tr height=''>
                                    <td>{{$payment_transaction_id}}</td>
                                    <td>{{$payment_mobile_no}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Payment X -->

                    <!-- Declaration By the Applicant -->
                    <div class="fathers_info">
                        <table class="table table-bordered ">

                            <thead>
                                <tr>
                                    <th colspan="">DECLARATION BY THE APPLICANT</th>
                                </tr>
                                <tr>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        I do hereby declare that: <br>
                                        <ul style="list-style:none">
                                            <li>(a) the information provided in this application by me is true, correct and complete;</li>
                                            <li>(b) if to be acceptable at Z. H. Sikder University of Science and Technology (hereinafter referred to as â€˜the Universityâ€™), I will be bound by all the rules and regulations, and the code of conduct as laid down by the University, the concerned Department, or the Hall of Residence;</li>
                                            <li>(c) I will abide by the decisions of the authorities of the University in respect of my education and conduct;</li>
                                            <li>(d) I will pay all my tuition and other fees to the University timely;</li>
                                            <li>(e) I do hereafter sign understanding that in need of necessary actions University may withdraw, amend or substitute an offer, or cancel my admission, or take other measures if any information provided here are found to be false, incorrect, incomplete.</li>
                                            <li style="text-align: right; text-decoration: overline; padding-top: 30px; margin-right:20px">  Signature of the Applicant   </li>
                                        </ul>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Declaration By the Applicant X -->

                    <!-- FINANCIAL UNDERTAKING BY THE PARENT/GUARDIAN OF THE APPLICANT -->
                    <div class="fathers_info">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th colspan="2">FINANCIAL UNDERTAKING BY THE PARENT/GUARDIAN OF THE APPLICANT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="">
                                        I, _____________________________________________, hereby undertake that I will pay timely all tuition and other fees during my son/daughter/ward _____________________________________________’s studies at the University within due deadlines, and I will do my best to maintain the conducive environment of the University. 
                                        <ul style="list-style: none;">
                                            <li style="text-align: right; text-decoration: overline; padding-top: 30px; margin-right:20px">Signature of the Parents/Guardian  </li>
                                        </ul>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- FINANCIAL UNDERTAKING BY THE PARENT/GUARDIAN OF THE APPLICANT X -->

                    <!-- SIGNATURE WITH DATE OF THE CONCERNED AUTHORITIES OF THE UNIVERSITY -->
                    <div class="fathers_info">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th colspan="2">SIGNATURE WITH DATE OF THE CONCERNED AUTHORITIES OF THE UNIVERSITY</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="">
                                        <div class="signature_wrapper">
                                            <div class="signture">
                                                <h6>Dean of the Faculty</h6>
                                            </div>
                                            <div class="signture">
                                                <h6>Provost</h6>
                                            </div>
                                            <div class="signture">
                                                <h6>Chairman of the Department</h6>
                                            </div>
                                        </div>

                                        <div class="signature_wrapper">
                                            <div class="signture">
                                                <h6>Registrar</h6>
                                            </div>
                                            <div class="signture">
                                                <h6></h6>
                                            </div>
                                            <div class="signture">
                                                <h6>Official (Education)</h6>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- SIGNATURE WITH DATE OF THE CONCERNED AUTHORITIES OF THE UNIVERSITYX -->

                    <!-- The Following Documents are to be Attached -->
                    <div class="fathers_info">
                        <table class="table table-bordered ">

                            <thead>
                                <tr>
                                    <th colspan="">DOCUMENTS TO BE ENCLOSED WITH THE ADMISSION FORM</th>
                                </tr>
                                <tr>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <ul style="list-style:none">
                                            <li>1. Three (3) copies of recent passport-sized photographs;</li>
                                            <li>2. Main copy of SSC or equivalent certificate and mark sheet/transcript;</li>
                                            <li>3. Main copy of HSC or equivalent certificate and mark sheet/transcript;</li>
                                            <li>4. Attested copy of the birth registration card;</li>
                                            <li>5. Attested copies of all NIDs as mentioned in the Admission Form;</li>
                                            <li>6. All documents related to credit transfer (if any).</li>
                                        </ul>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- The Following Documents are to be Attached X -->

                    <!-- Important Information for Students -->
                    <div class="fathers_info">
                        <table class="table table-bordered ">

                            <thead>
                                <tr>
                                    <th colspan="">IMPORTANT INFORMATION FOR STUDENTS</th>
                                </tr>
                                <tr>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 
                                        <ul style="list-style:none">
                                            <li>1. It is mandatory for all the enrolled students of the University to abide by all the rules and regulations, and the code of conduct laid down by the University.</li>
                                            <li>2. The following conducts shall be considered to be against the code of conduct of the University:
                                                <ul style="list-style: none;">
                                                    <li>(a) To allow or receive any stranger or visitor at the University premises without authorization.</li>
                                                    <li>(b) To enter into any restricted or secured area at the University premises.</li>
                                                    <li>(c) To use the name or logo of the University without authorization.</li>
                                                    <li>(d) To steal, misuse, destroy, deface or damage University property or property belonging to others.</li>
                                                    <li>(e) To defy any order or violate any law, rule, regulation, or policy of the University, or to abet or instigate any person to defy any order or violate any law, rule, regulation, or policy of the University.</li>
                                                    <li>(f) To engage in misconduct with any member of the University community.</li>
                                                    <li>(g) To disrupt the serenity or tranquility of the University.</li>
                                                    <li>(h) To erect any structure at the University premises without authorization.</li>
                                                    <li>(i) To possess, distribute, consume or manufacture any tobacco product, alcohol, drug, or other illegal substance at the University premises.</li>
                                                    <li>(j) To commit any offence punishable under any existing law of Bangladesh.</li>
                                                </ul>
                                            </li>
                                        </ul>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Important Information for Students X -->

                </div>
                <!-- widget-content nopadding X -->
            </div>
            <!-- widget-box X -->
        </div>
        <!-- tab-pane X -->
    </div>
    <!-- tab-content X -->
</div>
<!-- container X -->


<style type="text/css">
    @font-face {
        font-family: Barcode;
        font-weight: bold;
        src: url('font-awesome/barcode/BarcodeFont.ttf');
    }

    /* Header section X */
    .header_secton{
        display: flex;
        gap: 1rem;
        justify-content: space-around;
        padding-top: 20px;
    }

    .header_main_title .heading_admission_text{
        width: 250px;
        margin:  0px auto;
    }

    .header_main_title .heading_admission_text h4{
        font-size: 23px;
        font-weight: 700;
        text-align: center;
        padding:  4px 0px;
        background-color: lightgray;
        margin: 50px 0px;
    }

    .header_main_title p{
        font-size: 13px;
        margin: 20px;
        text-align: center;
        text-decoration: underline;
    }

    .attach_pic{
        width: 180px;
        height: 180px;
        border:  1px solid #ccc;
        margin: 15px 0px;
    }

    .attach_pic{
        padding:  40px 5px 0px 10px;
        horizontal-align:  middle;
    }

    /* Header section X */


    /* Semester Degree */

    .semester_degree{
        display:  flex;
        /*justify-content: space-between;*/
        margin:1rem 1.5rem;
        background-color: #ddd;
        padding: 8px 10px 0px 10px;
        border-bottom:  1px solid gray;
    }

    .semester_degree .semes_deg_col_1{
        flex:1;
    }

    .semester_degree .semes_deg_col_2{
        /*flex: 1;*/
        flex:1;
        align-content: flex-start;
        text-align: center;
    }
    .semester_degree .semes_deg_col_3{
        /*flex: 1;*/
        flex:1;
        align-content: flex-start;
        text-align: center;
    }

    .semester_degree .semes_deg_col_1 .degree,
    .semester_degree .semes_deg_col_2 .semester,
    .semester_degree .semes_deg_col_3 .semester_year{
        display: flex;
    }

    .semester_degree .semes_deg_col_1 .degree .text,
    .semester_degree .semes_deg_col_2 .semester .text,
    .semester_degree .semes_deg_col_3 .semester_year .text{
        font-size: 14px;
        font-weight: 600;
        margin-right: 10px;
        margin-top :5px;
        flex: 1;
    }

    .semester_degree .semes_deg_col_1 .degree .deg_val p,
    .semester_degree .semes_deg_col_2 .semester .semes_val p,
    .semester_degree .semes_deg_col_3 .semester_year .semes_year_val p{
        padding:  2px 10px;
        background-color: white;
    }


    .semester_degree .semes_deg_col_1 .degree .select_box,
    .semester_degree .semes_deg_col_2 .semester .select_box,
    .semester_degree .semes_deg_col_3 .semester_year .select_box{
        width: 20px;
        height: 21px;
        border:  #ccc;
        margin-left: 10px;
        background-color: #fff;
    }



    /*-- Department & Hall --*/
    .department_and_hall{
        display:  flex;
        /*justify-content: space-between;*/
        margin:1rem 1.5rem;
        background-color: #ddd;
        padding: 8px 10px 0px 10px;
        border-bottom:  1px solid gray;
    }

    .department_and_hall .depat_hall_col_1,
    .department_and_hall .depat_hall_col_2{
        flex:  1;
        display: flex;
    }

    .department_and_hall .depat_hall_col_1 .department_title,
    .department_and_hall .depat_hall_col_2 .hall_title{
        font-size: 14px;
        font-weight: 600;
        margin-right: 10px;
    }

    .department_and_hall .depat_hall_col_1 .department_name,
    .department_and_hall .depat_hall_col_2 .hall_name{
        font-size: 14px;
        font-weight: 500;
    }

    .department_and_hall .depat_hall_col_1 .department_name p,
    .department_and_hall .depat_hall_col_2 .hall_name p{
        padding:  2px 10px;
        background-color: white;
    }


    /* Aplicant info */
    .applicant_info{
        margin:1rem 1.5rem;
    }

    .applicant_info .table,
    .fathers_info .table,
    .mothers_info .table{
        border-bottom: 1px solid #ddd;
        border-right: 1px solid #ddd;
    }

    .applicant_info .table tr th,
    .fathers_info .table tr th,
    .mothers_info .table tr th{
        text-align: left !important;
    }
    /* Aplicant info X */

    /* Father information */
    .fathers_info{
        margin:1rem 1.5rem;
    }
    /* Father Information */

    /* Mothers information */
    .mothers_info{
        margin:1rem 1.5rem;
    }
    /* Mothers Information */


    /* Signeture */
    .signature_wrapper{
        display: flex;
        justify-content: space-around;
    }

    .signature_wrapper .signture{
        padding-top: 30px;
        text-decoration: overline;
    }

    .signature_wrapper .signture h6{
        /*text-decoration: overline;*/
    }
    /* Signeture X */

</style>



<!-- Print -->
<script type="text/javascript">
    function printDivision(printableAreaGrab) {
        var printContents = document.getElementById(printableAreaGrab).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
<!-- Print X -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@push('custom-scripts')
<script type="text/javascript" src="{{ asset('extra_js/applicant_student_report.js') }}"></script>
@endpush
@stop
