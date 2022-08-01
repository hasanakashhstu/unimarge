

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

                <div class="widget-content nopadding">

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

                    <!-- Graduate & Post Graduate Section -->
                    <div class="graduate_postgraduate_section">
                        <div class="gra_postgra_col-1">
                            <div class="gradute">
                                <div class="text">GRADUATE PROGRAM </div>
                                <div class="select_box"></div>
                            </div>
                            
                        </div>
                        <div class="gra_postgra_col-2">
                            <div class="post_gradute">
                                <div class="text">POSTGRADUATE PROGRAM </div>
                                <div class="select_box"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Graduate & Post Graduate Section X -->

                    <!-- Semester & Degree -->
                    <div class="semester_degree">
                        <div class="semes_deg_col_1">
                            <div class="degree">
                                <div class="text">Degree Name</div>
                                <!-- <div class="select_box"></div> -->
                                <div>
                                   <input type="text" class="form-control" >
                                </div>
                            </div>
                            
                        </div>
                        <div class="semes_deg_col_2">
                            <div class="semester">
                                <div class="text">Semester Name </div>
                                <!-- <div class="select_box"></div> -->
                                <div>
                                   <input type="text" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="semes_deg_col_3">
                            <div class="semester_year">
                                <div class="text">Semester Year </div>
                                <!-- <div class="select_box"></div> -->
                                <div>
                                   <input type="text" class="form-control" >
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Semester & Degree X -->

                    <!-- Department & Hall -->
                    <div class="department_and_hall">
                        <div class="depat_hall_col_1">
                            <div class="department_title">Department name</div>
                            <div class="department_name">
                                Department of Computer Science & Engineering
                            </div>
                        </div>
                        <div class="depat_hall_col_2">
                            <div class="hall_title">Hall of Residence</div>
                            <div class="hall_name">
                                Bijoy Hostel
                            </div>
                        </div>
                    </div>
                    <!-- Department & Hall X -->

                    <!-- Aplicant information -->
                    <div class="applicant_info">
                        <table class="table table-bordered data-table">

                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Applicant ID</th>
                                <th>Student Name</th>
                                <th>Parent Name</th>
                                <th>Session</th>
                                <th>Class</th>
                                <th>Shift</th>
                                <th>Medium</th>
                                <th>Department</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <!--  <th>Email</th> -->
                                <th>Actions</th>
                            </tr>
                        </thead>


                        <tbody>
                            <tr class="gradeX">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                    </div>
                    <!-- Aplicant info X -->

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

    /* Graduate & Post Graduate Section  */
    .graduate_postgraduate_section{
        display:  flex;
        /*justify-content: space-between;*/
        margin:1rem 1.5rem;
        background-color: #ddd;
        padding: 5px 10px;
        border-bottom:  2px solid gray;
    }

    .graduate_postgraduate_section .gra_postgra_col-1{
        flex:1;
    }

    .graduate_postgraduate_section .gra_postgra_col-2{
        /*flex: 1;*/
        flex:1;
        align-content: flex-start
        text-align: center;
    }

    .graduate_postgraduate_section .gra_postgra_col-1 .gradute,
    .graduate_postgraduate_section .gra_postgra_col-2 .post_gradute{
        display: flex;
    }
    .graduate_postgraduate_section .gra_postgra_col-1 .gradute .text,
    .graduate_postgraduate_section .gra_postgra_col-2 .post_gradute .text{
        font-size: 16px;
        font-weight: 600;
    }
    .graduate_postgraduate_section .gra_postgra_col-1 .gradute .select_box,
    .graduate_postgraduate_section .gra_postgra_col-2 .post_gradute .select_box{
        width: 20px;
        height: 21px;
        border:  #ccc;
        margin-left: 10px;
        background-color: #fff;
    } 

    /* Graduate & Post Graduate Section X */

    .semester_degree{
        display:  flex;
        /*justify-content: space-between;*/
        margin:1rem 1.5rem;
        background-color: #ddd;
        padding: 10px 10px 0px 10px;
        border-bottom:  2px solid gray;
    }

    .semester_degree .semes_deg_col_1{
        flex:1;
    }

    .semester_degree .semes_deg_col_2{
        /*flex: 1;*/
        flex:1;
        align-content: flex-start
        text-align: center;
    }
    .semester_degree .semes_deg_col_3{
        /*flex: 1;*/
        flex:1;
        align-content: flex-start
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
        font-size: 16px;
        font-weight: 600;
        margin-right: 10px;
        margin-top :5px
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
        padding: 5px 10px;
        border-bottom:  2px solid gray;
    }

    .department_and_hall .depat_hall_col_1,
    .department_and_hall .depat_hall_col_2{
        flex:  1;
        display: flex;
    }

    .department_and_hall .depat_hall_col_1 .department_title,
    .department_and_hall .depat_hall_col_2 .hall_title{
        font-size: 16px;
        font-weight: 600;
        margin-right: 10px;
    }

    .department_and_hall .depat_hall_col_1 .department_name,
    .department_and_hall .depat_hall_col_2 .hall_name{
        font-size: 14px;
        font-weight: 500;
    }

    /* Aplicant info */
    .applicant_info{
        margin:1rem 1.5rem;
    }
    /* Aplicant info X */
    

</style>





<div class="modal fade" id="myModal" style="width: 50%; height: 70%;
     margin-left: -25%;" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Admit Card</h4>
            </div>

            <div id='print_div'><span id='markshet'></span></div>

            <div class="text-center"><input type="button" value="print" onclick="printDiv()" id="print_admit_card"
                                            class="btn btn-primary" name=""></div>
        </div>
    </div>
</div>
<script>

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@push('custom-scripts')
<script type="text/javascript" src="{{ asset('extra_js/applicant_student_report.js') }}"></script>
@endpush
@stop
