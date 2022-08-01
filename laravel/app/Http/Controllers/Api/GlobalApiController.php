<?php

namespace App\Http\Controllers\Api;

use App\blood_group_model;
use App\board_name_model;
use App\degree_name_model;
use App\dependent_relation_model;
use App\districts_model;
use App\divisions_model;
use App\exam_list_model;
use App\exam_name_model;
use App\general_settings_model;
use App\group_name_model;
use App\manage_class_model;
use App\manage_department_model;
use App\maritial_model;
use App\nationality_model;
use App\ov_setup_model;
use App\parents_info_model;
use App\profession_model;
use App\quota_model;
use App\religion_model;
use App\semester_model;
use App\session_choose_model;
use App\unions_model;
use App\upazilas_model;
use App\year_model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class GlobalApiController extends Controller
{
    public function getAdmissionFormData(){
        try{
            $data['department'] = manage_department_model::select('id','department_name','department_code')
                ->get()->unique('department_code');
            $data['session'] = ov_setup_model::where('type', 'Session')
                ->select('id', 'type','type_name')->get();
            $data['shift'] = ov_setup_model::where('type', 'Shift')->select('id', 'type','type_name')->get();

            $data['exam_lsit'] = exam_list_model::select('id','exam_name')->get();
            $data['manage_class'] = manage_class_model::select('id', 'class_name')->get();
            $data['medium'] = ov_setup_model::where('type', 'Medium')->get();
            $data['nationality_data'] = nationality_model::select('id','name')->get();
            $data['maritial_data'] = maritial_model::get();
            $data['blood_group_data'] = blood_group_model::get();
            $data['semester_data'] = semester_model::get();
            $data['year_data'] = year_model::get();


            $data['divisions_data'] = divisions_model::get();
//            $data['districts_data'] = districts_model::get();
//            $data['upazilas_data'] = upazilas_model::get();
//            $data['unions_data'] = unions_model::get();
            $data['exam_name_data'] = exam_name_model::get();
            $data['board_name_data'] = board_name_model::get();
            $data['group_name_data'] = group_name_model::get();
            $data['degree_name_data'] = degree_name_model::get();
            $data['session_choose_data'] = session_choose_model::get();
            $data['religion_data'] = religion_model::get();
            $data['quota_data'] = quota_model::get();
            $data['semester_data'] = semester_model::get();
            $data['profession_data'] = profession_model::get();
            $data['dependent_relation_data'] = dependent_relation_model::get();
            return response()->json([
                'status'=>2000,
                'data' => $data,
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'=>2000,
                'data' => $data,
            ]);
        }
    }
}
