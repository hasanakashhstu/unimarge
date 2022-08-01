<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notice_board_model extends Model
{
    protected $table = 'notice_board';
    protected $primaryKey = 'notice_id';

    protected $fillable = ['notice_id', 'notice_title', 'notice_subject', 'author', 'to', 'Notice', 'notice_department', 'file'];

    public function validation($fileNullable = false)
    {
        return [
            'notice_title' => 'required|string',
            'notice_subject' => 'required|string',
            'author' => 'required',
            'to' => $fileNullable ? 'nullable' : 'required',
            'Notice' => 'required',
            'notice_department' => 'required',
            'file' => $fileNullable ? 'nullable' : 'required' . '|file|mimes:jpg,jpeg,png,pdf,doc,docx',

        ];
    }
}
