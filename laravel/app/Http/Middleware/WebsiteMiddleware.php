<?php

namespace App\Http\Middleware;

use Closure;
use View;
use App\students;
use App\teacher_model;
use App\WebsiteSliderModel;
use App\general_settings_model;
use App\manage_department_model;
use App\WebsiteManagementModel;
use App\WebsiteCourseCategoryModel;

class WebsiteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $count_student = students::count();
        $fixed_slider = WebsiteSliderModel::all();
        $teacher_view_share = teacher_model::get()->toArray();
        $course_category = WebsiteCourseCategoryModel::all();
        $general_settings = general_settings_model::first();
        $manage_department = manage_department_model::get();
//        $contact = manage_department_model::get();
        $department = $manage_department->unique('department_code');
        $our_management = WebsiteManagementModel::limit(4)->orderBy('website_management_id','ASC')->get()->toArray();
        View::share('fixed_slider', $fixed_slider);
        View::share('general_settings', $general_settings);
        View::share('manage_department', $manage_department);
        View::share('our_management', $our_management);
        View::share('course_category', $course_category);
        View::share('teacher_view_share', $teacher_view_share);
        View::share('count_student', $count_student);

        return $next($request);
    }
}
