<?php

use Illuminate\Database\Seeder;

class RBAC extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('users')->insert(array(
        		array('id' =>'1','name'=>'Hasan','email'=>'admin@admin.com','password'=>'$2y$10$8lEtrJyy60lxD9iHs/c.V.3LDEPXTWJpD0XJv3XwHqkI221ksro1G','status'=>'Active' )
        	));
        
        DB::table('roles')->insert([
        		['name'=>'INSERT','display_name'=>'display','description'=>'Feature' ]
        	]);
    	DB::table('permission_role')->insert([
        		['role_id'=>'1','permission_id'=>'2']
        	]);
    	DB::table('user_access')->insert([
        		['user_name'=>'USER','user_role'=>'Admin' ]
        	]);

         DB::table('permissions')->insert([
        [ 'name'=>'INSERT','display_name'=>'INSERT','description'=>'Content Permission' ],
        [ 'name'=>'EDIT','display_name'=>'EDIT','description'=>'Content Permission' ],
        [ 'name'=>'DELETE','display_name'=>'DELETE','description'=>'Content Permission' ],
        [ 'name'=>'APROVE','display_name'=>'APROVE','description'=>'Content Permission' ],

        [ 'name'=>'ROLE MANAGE','display_name'=>'ROLE MANAGE','description'=>'MODULE' ],
        [ 'name'=>'STUDENTS','display_name'=>'STUDENTS','description'=>'MODULE' ],
        [ 'name'=>'APPRISAL','display_name'=>'APPRISAL','description'=>'MODULE' ],
        [ 'name'=>'TEACHER_AND_STAFF','display_name'=>'TEACHER AND STAFF','description'=>'MODULE' ],
        [ 'name'=>'PARENT','display_name'=>'PARENT','description'=>'MODULE' ],
        [ 'name'=>'CLASS','display_name'=>'CLASS','description'=>'MODULE' ],
        [ 'name'=>'SUBJECT','display_name'=>'SUBJECT','description'=>'MODULE' ],
        [ 'name'=>'CLASS_ROUTINE','display_name'=>'CLASS ROUTINE','description'=>'MODULE' ],
        [ 'name'=>'DAILY_ATTENDENCE','display_name'=>'DAILY ATTENDENCE','description'=>'MODULE' ],
        [ 'name'=>'EXAM','display_name'=>'EXAM','description'=>'MODULE' ],
        [ 'name'=>'PAYROLL','display_name'=>'PAYROLL','description'=>'MODULE' ],
        [ 'name'=>'ACCOUNTING','display_name'=>'ACCOUNTING','description'=>'MODULE' ],
        [ 'name'=>'LIBRAY','display_name'=>'LIBRAY','description'=>'MODULE' ],
        [ 'name'=>'TRANSPORT','display_name'=>'TRANSPORT','description'=>'MODULE' ],
        [ 'name'=>'DORMITORY','display_name'=>'DORMITORY','description'=>'MODULE' ],
        [ 'name'=>'NOTICEBOARD','display_name'=>'NOTICEBOARD','description'=>'MODULE' ],
        [ 'name'=>'MESSAGES','display_name'=>'MESSAGES','description'=>'MODULE' ],
        [ 'name'=>'SETTINGS','display_name'=>'SETTINGS','description'=>'MODULE' ],



       	// Role based Access Module
        [ 'name'=>'CREATE_ADMIN','display_name'=>'CREATE ADMIN','description'=>'Feature' ],
        [ 'name'=>'CREATE_PERMISSION','display_name'=>'CREATE PERMISSION','description'=>'Feature' ],
        [ 'name'=>'CREATE_ROLE','display_name'=>'CREATE ROLE','description'=>'Feature' ],
        [ 'name'=>'PERMISSION ROLE','display_name'=>'PERMISSION ROLE','description'=>'Feature' ],
        [ 'name'=>'USER_ACCESS','display_name'=>'USER ACCESS','description'=>'Feature' ],
        
         // Student Module
        [ 'name'=>'APPLICANT_STUDENTS','display_name'=>'APPLICANT STUDENTS','description'=>'Feature' ],
        [ 'name'=>'APPLICANT_STUDNETS REPORT','display_name'=>'APPLICANT STUDNETS REPORT','description'=>'Feature' ],
        [ 'name'=>'ADMISSION_TEST','display_name'=>'ADMISSION TEST','description'=>'Feature' ],
        [ 'name'=>'ADMIT_STUDNETS','display_name'=>'ADMIT STUDNETS','description'=>'Feature' ],
        [ 'name'=>'ADMIT_BULK STUDENTS','display_name'=>'ADMIT BULK STUDENTS','description'=>'Feature' ],
        [ 'name'=>'STUDNETS_INFORMATION','display_name'=>'STUDNETS INFORMATION','description'=>'Feature' ],
        [ 'name'=>'STUDENTS_PROMATION','display_name'=>'STUDENTS PROMATION','description'=>'Feature' ],
        

        // Apprisal Module
        [ 'name'=>'STUDENT_APPRISAL','display_name'=>'STUDENT APPRISAL','description'=>'Feature' ],
        [ 'name'=>'STUDENTS_APPRISAL TEMPLETE','display_name'=>'STUDENTS APPRISAL TEMPLETE','description'=>'Feature' ],
        [ 'name'=>'APPRISAL_REPORT','display_name'=>'APPRISAL REPORT','description'=>'Feature' ],
        
        // teacher and staff
        [ 'name'=>'TEACHER','display_name'=>'TEACHER','description'=>'Feature' ],
        [ 'name'=>'TEACHER REPORT','display_name'=>'TEACHER REPORT','description'=>'Feature' ],
        [ 'name'=>'STAFF_INFORMATION','display_name'=>'STAFF INFORMATION','description'=>'Feature' ],
        [ 'name'=>'STAFF_REPORT','display_name'=>'STAFF REPORT','description'=>'Feature' ],


        // parent module
        [ 'name'=>'PARENTS','display_name'=>'PARENTS','description'=>'Feature' ],
        [ 'name'=>'PARENTS_REPORT','display_name'=>'PARENTS REPORT','description'=>'Feature' ],
       
        // CLASS module
        [ 'name'=>'MANAGE_CLASSES','display_name'=>'MANAGE CLASSES','description'=>'Feature' ],
        [ 'name'=>'MANAGE_SECTIONS','display_name'=>'MANAGE SECTIONS','description'=>'Feature' ],
       	[ 'name'=>'ACADEMIC_SYLLABUS','display_name'=>'ACADEMIC SYLLABUS','description'=>'Feature' ],
        [ 'name'=>'MANAGE_DEPARTMENT','display_name'=>'MANAGE DEPARTMENT','description'=>'Feature' ],
	     
        // Subject No Need it's come form moule 

        // Daily Attendence
        [ 'name'=>'ATTENDENCE_REPORT','display_name'=>'ATTENDENCE REPORT','description'=>'Feature' ],
        

        // EXAM Module
       [ 'name'=>'EXAM_GRADE','display_name'=>'EXAM GRADE','description'=>'Feature' ],
       [ 'name'=>'EXAM_LIST','display_name'=>'EXAM LIST','description'=>'Feature' ],
       [ 'name'=>'MANAGE_MARKS','display_name'=>'MANAGE MARKS','description'=>'Feature' ],
       [ 'name'=>'TABULATION_SHEET','display_name'=>'TABULATION SHEET','description'=>'Feature' ],
       [ 'name'=>'QUESTION_PAPER','display_name'=>'QUESTION_PAPER','description'=>'Feature' ],


       /*Payroll*/
        [ 'name'=>'SALARY_SLIP','display_name'=>'SALARY SLIP','description'=>'Feature' ],
        [ 'name'=>'SALARY_STRUCTURE','display_name'=>'SALARY STRUCTURE','description'=>'Feature' ],
        [ 'name'=>'SLARY_COMPONENTS','display_name'=>'SLARY COMPONENTS','description'=>'Feature' ],
          



         //Account
        [ 'name'=>'ACCOUNTANT','display_name'=>'ACCOUNTANT','description'=>'Feature' ],
        [ 'name'=>'CHART_OF_ACCOUNT','display_name'=>'CHART OF ACCOUNT','description'=>'Feature' ],
        [ 'name'=>'CREATE_STUDENTS_PAYMENTS','display_name'=>'CREATE STUDENTS PAYMENT','description'=>'Feature' ],
        [ 'name'=>'INVOICE','display_name'=>'INVOICE','description'=>'Feature' ],
        [ 'name'=>'PAYMENT_HISTROY','display_name'=>'PAYMENT HISTROY','description'=>'Feature' ],
        [ 'name'=>'EXPENSE','display_name'=>'EXPENSE','description'=>'Feature' ],
        [ 'name'=>'EXPENSE_REPORT','display_name'=>'EXPENSE REPORT','description'=>'Feature' ],



	     // LIBRAY  Module
        [ 'name'=>'TEMPLETE_ARTICLE','display_name'=>'TEMPLETE ARTICLE','description'=>'Feature' ],
        [ 'name'=>'STOCK_ARTICLE','display_name'=>'STOCK ARTICLE','description'=>'Feature' ],
        [ 'name'=>'MANAGE_ARTICLE','display_name'=>'ADMISSION TEST','description'=>'Feature' ],
        [ 'name'=>'MEMBERSHIP','display_name'=>'MEMBERSHIP','description'=>'Feature' ],
       	[ 'name'=>'ARTICLE_ISSUE','display_name'=>'ARTICLE ISSUE','description'=>'Feature' ],
       	[ 'name'=>'ARTICLE_RECIVED','display_name'=>'ARTICLE RECIVED','description'=>'Feature' ],


       	// TRANSPORT  Module
        [ 'name'=>'ROUTE','display_name'=>'ROUTE','description'=>'Feature' ],
        [ 'name'=>'MANAGE_TRANSPORT','display_name'=>'MANAGE TRANSPORT','description'=>'Feature' ],
        [ 'name'=>'ASSIGN_TRANSPORT','display_name'=>'ASSIGN TRANSPORT','description'=>'Feature' ],
       	

       	// dormitory  Module
        [ 'name'=>'MANAGE_DORMITORY','display_name'=>'MANAGE DORMITORY','description'=>'Feature' ],
        [ 'name'=>'ASSIGN_DORMITORY','display_name'=>'ASSIGN DORMITORY','description'=>'Feature' ],
        
        // Notice board  Module already include
        
        
        // Message  Module already included
        
        
        ]);

		DB::table('roles')->insert([
        		['id'=>'1','name'=>'SUPER_ADMIN','display_name'=>'Super Admin','description'=>'Super Admin' ],
        		['id'=>'2','name'=>'ADMIN','display_name'=>'Admin','description'=>'Admin' ]
        ]);

        DB::table('permission_role')->insert([
        		['role_id'=>'1','permission_id'=>'2'],

        ]);

        DB::table('role_user')->insert([
        		['user_id'=>'1','role_id'=>'1']
        ]);
    }
}
