<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getImgAttribute(){
        switch ($this->extension) {
            case "pdf":
                return "img/pdf.png";
                break;
            case "docx":
                return "img/word.png";
                break;
            case "xlsx":
                return "img/excel.png";
                break;
            case "mp4":
                return "img/video.png";
                break;
            case "pptx":
                return "img/ppt.png";
                break;
            case "mp3":
                return "img/mp3.png";
                break;
        }
    }
}
