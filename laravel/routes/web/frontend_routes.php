<?php

use Illuminate\Support\Facades\Route;

//Frontend
Route::group(['middleware' => 'website'], function () {
    Route::get('/', 'WebsiteController@Home');

    Route::name('frontend.')->namespace('Frontend')->group(function () {
        // administratives routes
        Route::get('administratives/{slug}', 'AdministrativeController@show')->name('administratives.show');
        Route::prefix('admission')->name('admission.')->namespace('Admission')->group(function () {
            Route::get('fees-and-funding', 'FeesAndFoundingController@show')->name('fees-and-funding.show');
        });
    });

    //

    Route::get('/frontend/notice', 'WebsiteController@Notice');
    // news route for frontend
    Route::get('news', 'Frontend\NewsController@index');
    Route::get('news/{id}', 'Frontend\NewsController@show');

    // results route for frontend
    Route::get('results', 'Frontend\ResultController@index');
    Route::get('results/{result}', 'Frontend\ResultController@show');

    // events route for frontend
    Route::get('events', 'Frontend\EventsController@index');
    Route::get('events/{event}', 'Frontend\EventsController@show');

    Route::get('/frontend/about_us', 'WebsiteController@AboutUs');
    Route::get('/frontend/department_wise_faculty/{department}', 'WebsiteController@department_wise_faculty');
    Route::get('/frontend/department_wise_tution/{department}', 'WebsiteController@department_wise_tution');
    Route::get('frontend/departments/{id}/news', 'WebsiteController@newsByDepartment');
    Route::get('frontend/departments/{id}/galleries', 'WebsiteController@galleriesByDepartment');
    Route::get('departments/{department}/contact', 'Frontend\ShowByDepartmentController@contact');
    Route::get('departments/{department}/publications', 'Frontend\ShowByDepartmentController@publications');
    Route::get('departments/{department}/officer', 'Frontend\ShowByDepartmentController@officer');
    Route::get('departments/{department}/activities', 'Frontend\ShowByDepartmentController@activities');
    Route::get('departments/{department}/schollerships', 'Frontend\ShowByDepartmentController@schollerships');
    Route::get('departments/{department}/contents', 'Frontend\ShowByDepartmentController@contents');
    Route::get('departments/{department}/award_honours', 'Frontend\ShowByDepartmentController@awardHonours');

    Route::get('/frontend/faculty_profile/{id}', 'WebsiteController@faculty_profile');
    Route::get('/frontend/history', 'WebsiteController@History');
    Route::get('/frontend/mission_vision', 'WebsiteController@MissionVision');
    Route::get('/frontend/principal_message', 'WebsiteController@PrincipleMessage');
    Route::get('/frontend/citizen-charter', 'WebsiteController@CitizenCharter');
    Route::get('/frontend/notice/{id}', 'WebsiteController@SingleNotice');
    Route::get('/frontend/student-info/{id}/{slug}', 'WebsiteController@StudentInfo');
    Route::get('/frontend/class-routine/{id}/{slug}', 'WebsiteController@ClassRoutine');
    Route::get('/frontend/course-material/{id}/{slug}', 'WebsiteController@CourseMaterial');
    Route::get('/frontend/contact_us', 'WebsiteController@contact_us');

    Route::get('/frontend/bot', 'WebsiteController@bot');
    Route::get('/frontend/message_bot_chairman', 'WebsiteController@message_bot_chairman');
    Route::get('/frontend/message_bot_vc', 'WebsiteController@message_bot_vc');
    Route::get('/frontend/overview', 'WebsiteController@overview');
    Route::get('/frontend/mission_vision', 'WebsiteController@mission_vision');
    Route::get('/frontend/syndicate', 'WebsiteController@syndicate');
    Route::get('/frontend/academic', 'WebsiteController@academic');

    Route::get('/frontend/test', 'WebsiteController@test');
    Route::get('/frontend/tution_fees', 'WebsiteController@tution_fees');
    Route::get('/frontend/faculty_member_list', 'WebsiteController@faculty_member_list');
    Route::get('/frontend/office_chairperson', 'WebsiteController@office_chairperson');
    Route::get('/frontend/office_chief_advisor', 'WebsiteController@office_chief_advisor');
    Route::get('/frontend/office_vcice_chancellor', 'WebsiteController@office_vcice_chancellor');
    Route::get('/frontend/office_vcice_pro_chancellor', 'WebsiteController@office_vcice_pro_chancellor');
    Route::get('/frontend/office_treasurer', 'WebsiteController@mission_vision');
    Route::get('/frontend/office_dean', 'WebsiteController@office_dean');
    Route::get('/frontend/office_registrar', 'WebsiteController@office_registrar');
    Route::get('/frontend/office_proctor', 'WebsiteController@office_proctor');
    Route::get('/frontend/office_library', 'WebsiteController@office_library');
    Route::get('/frontend/office_director_finance', 'WebsiteController@office_director_finance');
    Route::get('/frontend/office_controller_examination', 'WebsiteController@office_controller_examination');

    Route::get('/frontend/Admission_test', 'WebsiteController@Admission_test');
    Route::get('/frontend/Admission_test_result', 'WebsiteController@Admission_test_result');
    Route::get('/frontend/Admission_contact', 'WebsiteController@Admission_contact');
    Route::get('/frontend/apply_online', 'WebsiteController@apply_online');
    Route::get('/frontend/Admission_eligibility', 'WebsiteController@Admission_eligibility');
    Route::get('/frontend/Admission_guidelines', 'WebsiteController@Admission_guidelines');
    Route::get('/frontend/Admission_process', 'WebsiteController@Admission_process');
    Route::get('/frontend/Admission_transfer_guidelines', 'WebsiteController@Admission_transfer_guidelines');
    Route::get('/frontend/tuition_other_fees', 'WebsiteController@tuition_other_fees');
    Route::get('/frontend/tuition_fee_calculator', 'WebsiteController@tuition_fee_calculator');
    Route::get('/frontend/tuition_guidelines', 'WebsiteController@tuition_guidelines');
    Route::get('/frontend/tuition_scholarship', 'WebsiteController@tuition_scholarship');
    Route::get('/frontend/tuition_waiver_calculator', 'WebsiteController@tuition_waiver_calculator');

    Route::get('/frontend/live-class', 'WebsiteController@liveClass');

    Route::get('/frontend/contact_info', 'WebsiteController@Contact');

    Route::get('/frontend/website_setup', 'WebsiteController@WebsiteSetup');
    Route::post('/frontend/website_setup', 'WebsiteController@WebsiteSetupUpdate');

    //admission setup @akash 17/6/2022
    Route::get('/frontend/admission_setup', 'WebsiteController@AdmissionSetup');
    Route::post('/frontend/admission_setup_save', 'WebsiteController@AdmissionSetupSave');
    Route::delete('/frontend/admission_setup_delete/{id}', 'WebsiteController@AdmissionSetupDelete');
    Route::get('/frontend/admission_setup_edit/{id}/edit', 'WebsiteController@AdmissionSetupEdit');
    Route::Post('/frontend/admission_setup_update/{id}', 'WebsiteController@AdmissionSetupUpdate');
    //admission setup END @akash 17/6/2022
    //    Route::get('/frontend/former_head_add', 'WebsiteController@former_head_add');
    //    Route::post('/frontend/former_head_add', 'WebsiteController@WebsiteSetupUpdate');

    Route::get('/frontend/our_management', 'WebsiteController@OurManagement');
    Route::post('/frontend/our_management_add', 'WebsiteController@OurManagementAdd');
    Route::delete('/frontend/our_management/{id}', 'WebsiteController@OurManagementDelete');
    Route::put('/frontend/our_management/{id}', 'WebsiteController@OurManagementUpdate');
    Route::get('/frontend/our_management/{id}/edit', 'WebsiteController@OurManagementEdit');

    // Route::get('/frontend/faculties/message-from-head/{id}', 'WebsiteController@FacultiesMsgFromHead');
    // Route::get('/frontend/faculties/about_department/{id}', 'WebsiteController@FacultiesAboutDept');
    Route::get('/frontend/faculties/teacher_info/{id}', 'WebsiteController@FacultiesTeacherInfo');
    Route::get('/frontend/faculties/staff_info/{id}', 'WebsiteController@FacultiesStaffInfo');
    Route::get('/frontend/non_tech_instructor', 'WebsiteController@FacultiesNonTechInstructor');
    Route::get('/frontend/faculties/lab_info/{id}', 'WebsiteController@FacultiesLabInfo');
    Route::get('/frontend/faculties/fees_structure/{id}', 'WebsiteController@FeesStructure');

    // Online Admission(Alal:14-06) work start
    Route::get('/frontend/online-admission', 'WebsiteController@OnlineAdmissionFrontPage');
    Route::get('/frontend/online-admission-new-applicant', 'WebsiteController@OnlineAdmissionNewApplicant'); //@Alal:05-07-22
    Route::get('/frontend/online-admission-student-login', 'WebsiteController@OnlineAdmissionStudentLogin'); //@Alal:05-07-22
    Route::post('/frontend/online-admission-student-admit-card', 'WebsiteController@OnlineAdmissionStudentAdmitCard'); //@Alal:07-07-22
    Route::post('/frontend/online-admission-student-admit-card-front', 'WebsiteController@OnlineAdmissionStudentAdmitCardFront'); //@Alal:12-07-22
    Route::get('/frontend/instruction', 'WebsiteController@OnlineInstruction');
    Route::get('/frontend/admission-eligibility', 'WebsiteController@AdmissionEligibility');
    Route::get('/frontend/important-dates', 'WebsiteController@ImportantDates');
    Route::get('/frontend/important-dates', 'WebsiteController@ImportantDates');
    Route::get('/frontend/application-form-front', 'WebsiteController@ApplicationFormFront');
    Route::get('/frontend/online-admission-form/{id}', 'WebsiteController@OnlineAdmission'); //@akash
    Route::get('/frontend/online-admission-payment', 'WebsiteController@OnlineAdmissionPayment');
    Route::get('/frontend/admission-guidline', 'WebsiteController@AdmissionGuidline');
    Route::get('/frontend/admission-contact', 'WebsiteController@AdmissionContact');
    Route::post('/frontend/online-admission-form-submit/{id}', 'WebsiteController@OnlineAdmissionSubmit'); //@akash
    // Route::get('/frontend/online-admission', 'WebsiteController@OnlineAdmission');
    // Online Admission(Alal:17-06) work end





    Route::get('/frontend/district_filter/{id}', 'WebsiteController@district_filter');
    Route::get('/frontend/upozila_filter/{id}', 'WebsiteController@upozila_filter');
    Route::get('/frontend/unions_filter/{id}', 'WebsiteController@unions_filter');
    Route::get('/frontend/faculty_department/{id}', 'WebsiteController@faculty_department');
    Route::get('/frontend/student_advisor/{department}', 'WebsiteController@student_advisor');
    Route::get('/frontend/former_head/{department}', 'WebsiteController@former_head');
    Route::get('/frontend/class_section/{id}', 'WebsiteController@class_section');
    Route::get('/frontend/department_program/{id}', 'WebsiteController@department_program');

    Route::get('/frontend/department_filter/{id}', 'WebsiteController@department_filter');
    Route::get('/frontend/program_filter/{id}', 'WebsiteController@program_filter');

    Route::post('/frontend/online-admission', 'Aplicant_student@store');

    Route::get('/frontend/gallery', 'WebsiteController@Gallery');
    Route::get('/frontend/courses/{id}', 'WebsiteController@Course');
    Route::get('/frontend/course/{id}', 'WebsiteController@CourseSingle');
    Route::post('/frontend/course/registration', 'WebsiteCourseRegController@store');
    Route::post('/frontend/contact_message', 'WebsiteController@MailSent');

    Route::get('/frontend/result', 'WebsiteController@Result');
});

Route::get('/frontend/department/{id}', 'WebsiteController@FacultiesDepartmentInfo');
Route::get('/result', 'ResultReportController@result_show_with_marksheet');
Route::post('/result_with_marksheet', 'ResultReportController@result_with_marksheet');
Route::post('/class_w_section_search', 'ResultReportController@class_w_section_search');
Route::post('/class_w_department_search', 'ResultReportController@class_w_department_search');

Route::resource('/live_class', 'LiveClassController');
Route::post('/live_class_files', 'LiveClassController@Files');
Route::post('/update_class_file', 'LiveClassController@UpdateFiles');
Route::get('/delete_class_file/{id}', 'LiveClassController@DeleteFiles');
Route::resource('/zoom_create', 'ZoomAccountController');
Route::post('/start_live_class', 'LiveClassController@StartClass');
Route::get('/start_live_class/{id}', 'LiveClassController@StartSDKClass');
Route::get('/delete_live_class/{id}', 'LiveClassController@delete');

Route::post('/marksheet_report_publish', 'ResultReportController@marksheet_report_publish');
Route::post('/class_w_section_filter', 'ischool_report@Class_w_section_filter');
Route::post('/class_w_department_filter', 'ischool_report@class_w_department_filter');
Route::post('/class_w_subject_filter_another', 'ischool_report@class_w_subject_filter_another');
