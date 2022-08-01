<?php

use Illuminate\Support\Facades\Route;

/**
 * Authenticates routes
 * these routes can access after login
 */
Route::group(['middleware' => 'auth'], function () {
    // name, prefix and namespace are auth
    Route::prefix('auth')->name('auth.')->namespace('Auth')->group(function () {
        // user profile
        Route::get('user_profile', 'UserProfileController@index')->name('user_profile.index');
        Route::put('user_profile', 'UserProfileController@update')->name('user_profile.update');

        // role and permission routes
        Route::resource('roles', 'RolePermissionController')->except(['show'])->middleware('permission:manage role and permission');

        // administratives routes
        Route::resource('administrativeOffices', 'AdministrativeOfficeController')->except(['show']);
        Route::resource('administratives', 'AdministrativeController')->except(['show']);
    });


    Route::resource('/marks_report', 'StudentMarksReportControlller');
    Route::resource('/subject_wise_publish_marks', 'SubjectWisePublishMarks');
    Route::post('/publish_marks_get', 'SubjectWisePublishMarks@publish_marks_get');

    Route::get('/student_data/{token}/{encrypt_email}/{encrypt_password}', 'api_controller@student_data');
    Route::get('/teacher_data/{token}/{encrypt_email}/{encrypt_password}', 'api_controller@teacher_data');
    Route::get('/staff_data/{token}/{encrypt_email}/{encrypt_password}', 'api_controller@staff_data');
    Route::get('/notice_data/{token}/{encrypt_email}/{encrypt_password}', 'api_controller@notice_data');
    Route::get('/subject_data/{token}/{encrypt_email}/{encrypt_password}', 'api_controller@subject_data');
    Route::get('/library_data/{token}/{encrypt_email}/{encrypt_password}', 'api_controller@library_data');

    Route::resource('/book_list', 'book_list');
    Route::get('/Student_dashboard', 'Student_dashboard@index');
    Route::resource('/student_account', 'student_account');
    Route::resource('/student_dashboard_exam', 'student_dashboard_exam');
    Route::resource('/student_dashboard_hostel', 'student_dashboard_hostel');
    Route::resource('/student_dashboard_payment', 'student_dashboard_payment');
    Route::resource('/student_dashboard_class_routine', 'student_dashboard_class_routine');
    Route::resource('/student_dashboard_transport', 'student_dashboard_transport');
    Route::resource('/student_dashboard_library', 'student_dashboard_library');
    Route::resource('/student_dashboard_syllabus', 'student_dashboard_syllabus');
    Route::resource('/student_dashboard_teacher', 'student_dashboard_teacher');
    Route::resource('/student_dashboard_subject', 'student_dashboard_subject');

    Route::resource('/student_live_class', 'student_live_class');
    Route::get('/open_live_class/{id}', 'student_live_class@openLive');
    Route::get('/zoom_signature/{meeting_number}', 'student_live_class@ZoomSignature');
    Route::resource('/student_financial_ledger_report', 'StudentFinancialLedgerReportController');

    Route::get('/syllabus_download/{id}', 'student_dashboard_syllabus@syllabus_download');
    Route::resource('/library_bill_generator', 'library_invoice_controller');
    Route::resource('/transport_bill_generator', 'transport_invoice_controller');
    Route::resource('/dormitory_bill_generator', 'dormitory_bill_generator');
    Route::post('/library_payment_entry_for_student_data', 'library_invoice_controller@library_payment_entry_for_student_data');
    Route::post('/transport_payment_entry_for_student_data', 'transport_invoice_controller@transport_payment_entry_for_student_data');
    Route::post('/dormitory_payment_entry_for_student_data', 'dormitory_bill_generator@dormitory_payment_entry_for_student_data');

    Route::resource('/student_all_payment', 'student_all_payment_controller');
    Route::post('/due_fees_report_data', 'due_fees_controller@due_fees_report_data');
    Route::resource('/total_earning_report', 'total_earning_report_controller');

    Route::group(['middleware' => ['permission:view canteen|create canteen|edit canteen|delete canteen']], function () {
        Route::resource('/canteen_component', 'canteen_component_controller');
        Route::resource('/assign_canteen', 'assign_canteen_controller');
        Route::resource('/roster', 'roster_controller');
        Route::post('/roster_data', 'roster_controller@roster_data');
        Route::post('/roster_inserting', 'roster_controller@roster_inserting');
        Route::resource('/monthly_roster_closing', 'monthly_roster_closing');
        Route::post('/monthly_roster_closing_data_show', 'monthly_roster_closing@monthly_roster_closing_data_show');

        Route::post('/monthly_roster_closing_single_invoice', 'monthly_roster_closing@monthly_roster_closing_single_invoice');
    });

    Route::resource('/student_payment', 'student_payment_controller');
    Route::post('/student_data_for_invoice', 'student_payment_controller@student_data_for_invoice');

    Route::resource('/student_transaction_status', 'student_transaction_status_controller');
    Route::post('/view_transaction', 'student_transaction_status_controller@view_transaction');


    Route::resource('/payment_report', 'payment_report_controller');
    Route::post('/payment_report_student', 'payment_report_controller@payment_report_student');


    Route::resource('/report_settings', 'report_settings_controller');

    //complete start
    Route::group(['middleware' => ['permission:manage role and permission|view report|create report|edit report|delete report']], function () {
        // Route::resource('/create_admin', 'Create_admin');
        Route::resource('/report', 'report');
        // Route::resource('/create_permission', 'Create_permission');
        // Route::resource('/create_role', 'Create_role');
        // Route::resource('/permission_role', 'Permission_role');
        Route::put('/extra_operation/{delete_id}', 'Extra_operation@delete_role_current_role');
        // Route::resource('/user_access', 'User_access');
        Route::resource('/create_admin_Excel_report', 'ischool_report@create_admin_Excel_report');
        Route::resource('/create_admin_pdf_report', 'ischool_report@create_admin_pdf_report');
        Route::resource('/create_role_pdf_report', 'ischool_report@create_role_pdf_report');
        Route::resource('/create_role_Excel_report', 'ischool_report@create_role_Excel_report');
        Route::resource('/role_based_permission_pdf_report', 'ischool_report@role_based_permission_pdf_report');
        Route::resource('/role_permission_excel', 'ischool_report@role_permission_excel');
        Route::resource('/user_access_export', 'ischool_report@user_access_export');
        Route::resource('/user_access_export_excel', 'ischool_report@user_access_export_excel');
        Route::resource('/create_admin_report', 'ischool_report@create_admin_report');
    });


    Route::group(['middleware' => ['permission:view student|create student|edit student|delete student']], function () {
        Route::resource('/online-admission', 'Aplicant_student');
        Route::resource('/aplicant_student', 'Aplicant_student');
        Route::post('/remove_ex_edu_data', 'Aplicant_student@remove_ex_edu_data');
        Route::get('/applicant_student_report', 'ischool_report@applicant_student_report');
        Route::post('/applicant_student_admit_card', 'ischool_report@applicant_student_admit_card');
        Route::resource('/addmission_test', 'addmission_test');
        Route::post('/check_reg_no_ex', 'addmission_test@check_reg_no_ex');
    });

    Route::group(['middleware' => ['permission:view apprisal|create apprisal|edit apprisal|delete apprisal']], function () {
        Route::resource('/student_apprisal_component', 'student_apprisal_component');
        Route::resource('/student_apprisal', 'student_apprisal');
        Route::get('/student_apprisal_pdf', 'student_apprisal@pdf');
        Route::get('/student_apprisal_excel', 'student_apprisal@excel');
        Route::get('/student_apprisal_edit/{id}', 'student_apprisal@student_apprisal_edit');
    });

    Route::group(['middleware' => ['permission:view teacher|create teacher|edit teacher|delete teacher|view staff|create staff|edit staff|delete staff']], function () {
        Route::resource('/teacher_info', 'teacher_info');
        Route::get('/teacher_info_report', 'ischool_report@teacher_info_report');
        Route::post('/teacher_sort_update', 'ischool_report@teacher_sort_update');
        Route::resource('/staff_info', 'staff_info');
        Route::resource('/staff_report_pdf', 'ischool_report@staff_report_pdf');
        Route::resource('/staff_report_excle', 'ischool_report@staff_report_excle');
        Route::resource('/teacher_report_pdf', 'ischool_report@teacher_report_pdf');
        Route::resource('/teacher_report_excle', 'ischool_report@teacher_report_excle');
    });

    Route::group(['middleware' => ['permission:view parent|create parent|edit parent|delete parent']], function () {
        Route::resource('/parents_info', 'Parents_info');
        // reason to commented (php artisan route:list) controller does not exists
        // Route::resource('/parents_info_child', 'parents_info_child');
        Route::get('/parentreport', 'ischool_report@parentreport');
    });

    Route::group(['middleware' => ['permission:view class routine|create class routine|edit class routine|delete class routine']], function () {
        Route::resource('/manage_class', 'Manage_class');
        Route::resource('/manage_section', 'Manage_section');
        Route::resource('/academic_syllabus', 'Academic_syllabus');
        Route::get('/academic_syllabus_download/{id}/{subject}', 'ischool_report@academic_syllabus_download');
        Route::resource('/manage_subject', 'Manage_subject');

        Route::resource('/manage_class', 'manage_class');
        Route::resource('/manage_section', 'manage_section');
        Route::resource('/academic_syllabus', 'academic_syllabus');
        Route::resource('/manage_department', 'Manage_department');
        Route::resource('/manage_tution_fees', 'Manage_tution_feesController');
    });

    Route::middleware('permission:view department|create department|edit department|delete department')->group(function () {
        Route::resource('/manage_faculty', 'Manage_facultyController');
    });

    Route::POST('/searchcourse', 'WebsiteController@searchcourse');

    Route::group(['middleware' => ['permission:view attendence|create attendence|edit attendence|delete attendence']], function () {
        Route::resource('/daily_attendance', 'daily_attendance');
        Route::get('/daily_attendance_report', 'ischool_report@daily_attendance_report');
        Route::post('/show_attendance_data', 'daily_attendance@show_attendance_data');
        Route::post('/report_of_attendance', 'daily_attendance@report_of_attendance');
        Route::post('/attendance_student', 'daily_attendance@show_student_data');
        Route::post('/department_wise_subject', 'daily_attendance@department_wise_subject');
        Route::resource('/daily_attendance_pdf', 'ischool_report@daily_attendance_pdf');
    });

    Route::group(['middleware' => ['permission:view exam|create exam|edit exam|delete exam']], function () {
        Route::resource('/exam_list', 'Exam_list');
        Route::resource('/exam_grade', 'exam_grade');
        Route::resource('/manage_marks', 'manage_marks');
        Route::post('/manage_marks_edit', 'manage_marks@manage_marks_edit');
        Route::resource('/check_marks', 'check_marks');
        Route::post('/update_mark', 'check_marks@update_mark');
        Route::post('/check_marks_delete/{id}', 'check_marks@check_marks_delete');
        Route::get('/tabulation_sheet', 'ischool_report@tabulation_sheet');
        Route::post('/tabulation_data_get', 'ischool_report@tabulation_data_get');
        Route::post('/check_marks_edit', 'check_marks@show_tabulize_data');
        Route::resource('/marks_publish', 'marks_publish');
        Route::resource('/question_paper', 'question_paper');
        Route::resource('/pass_fail_report', 'PassFailReportController');
        Route::get('/question_paper_download/{file_name}/{file_ext}', 'question_paper@download');
    });


    Route::group(['middleware' => ['permission:view payroll|create payroll|edit payroll|delete payroll']], function () {
        Route::resource('/salary_slip', 'salary_slip');
        Route::get('/salary_slip_print/{id}', 'salary_slip@salary_slip_print');
        Route::resource('/salary_slip_report', 'salary_slip_report');
        Route::post('/salary_slip_teacher_name', 'salary_slip@teacher_name_get');
        Route::post('/salary_slip_details', 'salary_slip@salary_slip_details');
        Route::get('/salary_structure_report', 'salary_slip@salary_structure_report');
        Route::get('/salary_structure_edit/{id}', 'salary_slip@salary_structure_edit');
        Route::put('/salary_structure_update/{id}', 'salary_slip@salary_structure_update');
        Route::get('/salary_structure_delete/{id}', 'salary_slip@salary_structure_delete');
        Route::get('/print_salary_slip', 'salary_slip@print_salary_slip');
        Route::resource('/salary_component', 'salary_component');
        Route::resource('/salary_structure', 'salary_structure');
        Route::resource('/salary_slip', 'salary_slip');
        Route::resource('/salary_slip_report_pdf', 'ischool_report@salary_slip_report_pdf');
        Route::resource('/salary_slip_report_excle', 'ischool_report@salary_slip_report_excle');
        Route::get('/salary_structure_teacher_name', 'ischool_report@salary_structure_teacher_name');
    });


    Route::group(['middleware' => ['permission:view accounting|create accounting|edit accounting|delete accounting']], function () {

        Route::resource('/subsidiary_configuration', 'subsidiary_configuration');
        Route::resource('/payment_receipt', 'payment_receipt');
        Route::post('/get_payment_receipt', 'payment_receipt@get_payment_receipt');
        Route::post('/get_payment_receipt_second', 'payment_receipt@get_payment_receipt_second');
        Route::post('/get_payment', 'payment_receipt@get_payment');
        Route::resource('/accountant', 'accountant');
        Route::resource('/chart_of_account', 'chart_of_account');
        Route::resource('/create_template', 'create_template');
        Route::resource('/student_payment_entry', 'student_payment_entry');
        Route::post('/student_payment_entry_for_student_data', 'student_payment_entry@student_info');
        Route::post('/class_wise_department_invoice', 'student_payment_entry@class_wise_department_invoice');
        Route::post('/class_wise_department_live_class', 'LiveClassController@class_wise_department');
        Route::post('/student_templete_desgin', 'student_payment_entry@templete_desgin');
        Route::resource('/invoice', 'invoice');
        Route::get('/invoice_print/{id}', 'invoice@invoice_print');
        Route::resource('/invoice_component', 'invoice_component');
        Route::get('/payment_history', 'ischool_report@payment_history');
        // reason to commented (php artisan route:list) controller does not exists
        // Route::resource('/invoice_componnet', 'invoice_componnet');

        Route::resource('/chart_of_account_pdf', 'ischool_report@chart_of_account_pdf');
        Route::resource('/chart_of_account_excel', 'ischool_report@chart_of_account_excel');

        Route::resource('/payment_template_pdf', 'ischool_report@payment_template_pdf');
        Route::resource('/payment_template_excel', 'ischool_report@payment_template_excel');
    });

    Route::group(['middleware' => ['permission:view transport|create transport|edit transport|delete transport']], function () {
        Route::resource('/route', 'route');
        Route::resource('/manage_transport', 'manage_transport');
        Route::resource('/assign_transport', 'assign_transport');
    });

    Route::group(['middleware' => ['permission:view dormitory|create dormitory|edit dormitory|delete dormitory']], function () {
        Route::resource('/dormitory', 'dormitory');
        Route::resource('/assign_dormitory', 'assign_dormitory');
        Route::resource('/assign_dormitory_pdf', 'ischool_report@assign_dormitory_pdf');
        Route::resource('/assign_dormitory_excle', 'ischool_report@assign_dormitory_excle');
    });

    Route::group(['middleware' => ['permission:view website setup|create website setup|edit website setup|delete website setup']], function () {
        Route::resource('notice_board', 'NoticeBoardController');
        Route::resource('/former_head_add', 'former_headController');
    });

    Route::group(['middleware' => ['permission:view message|create message|edit message|delete message']], function () {
        Route::resource('/message_settings', 'message_settings');
    });

    Route::group(['middleware' => ['permission:view setting|create setting|edit setting|delete setting']], function () {
        Route::resource('/general_settings', 'general_settings');
        Route::resource('/sms_settings', 'sms_settings');
        Route::resource('/language_settings', 'language_settings');
        Route::resource('/setup', 'setup');
    });


    /// complete

    Route::resource('/manage_subject', 'manage_subject');
    Route::get('/applicant_student_admit_card', 'ischool_report@applicant_student_admit_card');
    Route::get('/student_information_data{student_id}', 'ischool_report@student_print');
    Route::post('/article_filter_data', 'ischool_report@article_filter_data');

    Route::resource('/component', 'component');

    Route::resource('/addmission_test', 'addmission_test');
    Route::post('/admission_test_student', 'ischool_report@admission_test_student');

    // exam

    Route::post('/department_wise_subject_get', 'ischool_report@department_wise_subject_get');
    Route::post('/class_w_subject_filter', 'ischool_report@class_w_subject_filter');
    Route::post('/class_data_check', 'ischool_report@class_data_check');
    Route::post('/route_wise_data', 'ischool_report@route_wise_data');
    Route::post('/transport_wise_data', 'ischool_report@transport_wise_data');
    //    Route::post('/student_information_filter','ischool_report@student_information_filter');

    Route::resource('/admit_student', 'Admit_student');
    Route::post('/roll_number_generate', 'Admit_student@roll_number_generate');
    Route::post('/admit_bulk_student_autoname_genrate', 'admit_bulk_student@admit_student_roll_name_genarate');
    Route::resource('/student_promoation', 'student_promoation');
    Route::post('/promotable_class', 'student_promoation@promotable_class');

    //complete end

    // reason to commented (php artisan route:list) controller does not exists
    // Route::resource('/manage_book', 'manage_book');
    Route::resource('/admit_bulk_student', 'admit_bulk_student');
    Route::resource('/student_information', 'student_information');
    Route::post('/remove_ex_student_edu_data', 'student_information@remove_ex_student_edu_data');
    Route::resource('/manage_class_routine', 'manage_class_routine');
    Route::resource('/expense', 'expense');

    Route::resource('/ex_student_information', 'student_information@ex_student_information');
    Route::resource('/article', 'article');
    Route::resource('/stock_article', 'stock_article');
    Route::resource('/templet_article', 'templet_article');
    Route::post('/check_isbn_no', 'templet_article@check_isbn_no');
    Route::resource('/membership', 'membership');
    Route::resource('/article_issue', 'article_issue');
    Route::resource('/article_recive', 'article_recive');

    //extra
    // Excel and Pdf View and Download Report
    //complete start
    Route::get('student_admission_register_report', 'StudentAdmissionRegister@index');
    Route::post('student_admission_register_report', 'StudentAdmissionRegister@store');
    Route::resource('/advance_report', 'AdvanceReport');
    Route::resource('/due_fees', 'due_fees_controller');
    Route::resource('/ledger_report', 'LedgerReport');
    Route::post('/get_ledger_report', 'LedgerReport@get_ledger_report');
    Route::post('/advance_report_department', 'AdvanceReport@advance_report_department');
    Route::post('/advance_report_section', 'AdvanceReport@advance_report_section');
    Route::get('/advance_report_pdf', 'AdvanceReport@advance_report_pdf');

    Route::resource('/component_pdf', 'ischool_report@component_pdf');
    Route::resource('/component_excel', 'ischool_report@component_excel');

    Route::resource('/expense_pdf', 'ischool_report@expense_pdf');
    Route::resource('/expense_excel', 'ischool_report@expense_excel');

    Route::resource('/invoice_pdf', 'ischool_report@invoice_pdf');
    Route::resource('/invoice_excel', 'ischool_report@invoice_excel');
    Route::resource('/invoice_component_pdf', 'ischool_report@invoice_component_pdf');
    Route::resource('/invoice_component_excel', 'ischool_report@invoice_component_excel');

    Route::resource('/accountant_pdf', 'ischool_report@accountant_pdf');
    Route::resource('/accountant_excle', 'ischool_report@accountant_excle');

    Route::resource('/route_pdf', 'ischool_report@route_pdf');
    Route::resource('/route_excle', 'ischool_report@route_excle');
    Route::resource('/manage_transport_excle', 'ischool_report@manage_transport_excle');
    Route::resource('/manage_transport_pdf', 'ischool_report@manage_transport_pdf');
    Route::resource('/assign_transport_pdf', 'ischool_report@assign_transport_pdf');
    Route::resource('/assign_transport_excle', 'ischool_report@assign_transport_excle');

    Route::resource('/manage_dormitory_pdf', 'ischool_report@manage_dormitory_pdf');
    Route::resource('/manage_dormitory_excle', 'ischool_report@manage_dormitory_excle');

    Route::resource('/manage_department_pdf', 'ischool_report@manage_department_pdf');
    Route::resource('/manage_department_excle', 'ischool_report@manage_department_excle');

    Route::resource('/academic_syllabus_pdf', 'ischool_report@academic_syllabus_pdf');
    Route::resource('/academic_syllabus_excle', 'ischool_report@academic_syllabus_excle');

    Route::resource('/manage_section_pdf', 'ischool_report@manage_section_pdf');
    Route::resource('/manage_section_excle', 'ischool_report@manage_section_excle');

    Route::resource('/article_recive_pdf', 'ischool_report@article_recive_pdf');
    Route::resource('/article_recive_excle', 'ischool_report@article_recive_excle');

    Route::get('/parents_report_pdf', 'ischool_report@parents_report_pdf');
    Route::get('/parents_report_excel', 'ischool_report@parents_report_excel');

    Route::get('/manage_class_pdf', 'ischool_report@manage_class_pdf');
    Route::get('/manage_class_excel', 'ischool_report@manage_class_excel');
    Route::get('/applicant_student_pdf', 'ischool_report@applicant_student_pdf');
    Route::get('/applicant_student_excel', 'ischool_report@applicant_student_excel');
    Route::post('/manage_marks_for_student', 'manage_marks@mange_mark_student');
    Route::post('/manage_marks_edit_for_student', 'manage_marks@manage_marks_edit_for_student');
    Route::post('/manage_marks_for_student_find_component', 'manage_marks@manage_marks_for_student_find_component');
    Route::post('/edit_marks_for_student_find_component', 'manage_marks@edit_marks_for_student_find_component');

    Route::post('/manage_mark_for_student_show', 'manage_marks@manage_mark_for_student_show');
    Route::get('/student_print/{student_id}', 'ischool_report@student_print');
    Route::post('/grade_and_cgp_find', 'manage_marks@grade_and_cgp_find');

    //complete end
    // Route::post('/admin_current_password','ajax_call@Admin_current_password'); wrong for ajax_call
    Route::resource('/templete_article_pdf', 'ischool_report@templete_article_pdf');
    Route::resource('/templete_article_excle', 'ischool_report@templete_article_excle');
    Route::resource('/article_pdf', 'ischool_report@article_pdf');
    Route::resource('/article_excle', 'ischool_report@article_excle');
    Route::resource('/stock_article_excle', 'ischool_report@stock_article_excle');
    Route::resource('/stock_article_pdf', 'ischool_report@stock_article_pdf');
    Route::resource('/membership_pdf', 'ischool_report@membership_pdf');
    Route::resource('/membership_excle', 'ischool_report@membership_excle');
    Route::resource('/article_issue_pdf', 'ischool_report@article_issue_pdf');
    Route::resource('/article_issue_excle', 'ischool_report@article_issue_excle');
    Route::resource('/article_id_wise_data', 'ischool_report@article_id_wise_data');
    // Report Controller
    Route::post('/member_wise_data', 'ischool_report@member_wise_data');
    Route::post('/member_wise_teacher_data', 'ischool_report@member_wise_teacher_data');

    Route::post('/article_id_issue_data', 'ischool_report@article_id_issue_data');

    Route::get('/staff_report', 'ischool_report@staff_report');

    Route::get('/student_apprisal_report', 'ischool_report@student_apprisal_report');

    Route::post('/notice_board_student_data_get', 'ischool_report@notice_board_student_data_get');
    Route::post('/notice_board_teacher_data_get', 'ischool_report@notice_board_teacher_data_get');
    Route::post('/notice_board_parents_data_get', 'ischool_report@notice_board_parents_data_get');
    Route::post('/notice_board_class_data_get', 'ischool_report@notice_board_class_data_get');
    Route::post('/notice_board_students_data_get', 'ischool_report@notice_board_students_data_get');

    Route::get('/apprisal_template_report', 'ischool_report@apprisal_template_report');
    Route::post('/student_data_get', 'ischool_report@student_data_get');
    Route::post('/teacher_data_get_for_library', 'ischool_report@teacher_data_get_for_library');
    Route::post('/class_wise_subject', 'ischool_report@class_wise_subject');
    Route::post('/class_wise_department', 'ischool_report@class_wise_department');
    // Route::post('/password_forget','password_reset@password_forget'); Fack Email Sent Test For Email
    Route::get('/home', 'HomeController@index');


    Route::resource('/fees_collection_report', 'FeesCollectionReportController');
    Route::get('/financial_ledger_repport', 'FinancialLedgerReport@financial_ledger_report');
    Route::post('/financial_ledger_report_data', 'FinancialLedgerReport@financial_ledger_report_data');


    Route::post('/type_wise_subject', 'teacher_info@type_wise_subject');

    Route::resource('/single_student_attendance_report', 'SingleStudentAttendanceReportController');
    Route::resource('/all_student_attendance_report', 'AllStudentAttendanceReportController');

    Route::resource('/asset_revenue', 'AssetRevenueController');
    Route::resource('/total_teacher_report', 'TotalTeacherReportController');
    Route::resource('/class_wise_teacher', 'ClassWiseTeacherReportController');
    Route::resource('/book_list_report', 'ListBookReportController');
    Route::resource('/result_report', 'ResultReportController');
    // Route::post('/marksheet_report_publish','ResultReportController@marksheet_report_publish');
    Route::resource('/dormitory_student_report', 'DormitoryStudentReportController');
    Route::resource('/reponsible_teacher_report', 'ResponsibleTeacherReportController');

    // bot routes
    Route::resource('/frontend/bot_backend', 'BotController');
    //Frontend
    Route::resource('/frontend/slider', 'WebsiteSliderController');
    Route::resource('admin/galleries', 'Admin\GalleryController');
    Route::resource('/frontend/events', 'WebsiteEventsController')->except('show');
    Route::resource('/frontend/news', 'WebsiteNewsController');
    Route::resource('/frontend/department_page_setup', 'WebsiteDeptSetupController');
    Route::resource('/frontend/contact', 'WebsiteContactController');
    Route::resource('/frontend/faculties', 'WebsiteFacultiesController');
    Route::resource('/frontend/create_course', 'WebsiteCourseController');
    Route::resource('/frontend/fees_structure', 'WebsiteFeesStructure');
    Route::resource('/frontend/course_category', 'WebsiteCourseCategoryController');
    Route::get('/frontend/course/registration', 'WebsiteCourseRegController@index');
    Route::resource('admin/results', 'Admin\ResultController');
    Route::resource('admin/department_contacts', 'Admin\DepartmentContactController');
    Route::resource('admin/publications', 'Admin\PublicationController');
    Route::resource('admin/officers', 'Admin\OfficerController');
    Route::resource('admin/activities', 'Admin\ActivityController');
    Route::resource('admin/schollerships', 'Admin\SchollershipController');
    Route::resource('admin/department_contents', 'Admin\DepartmentContentController');
    Route::resource('admin/award_honours', 'Admin\AwardHonourController');
});
