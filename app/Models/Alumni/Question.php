<?php

namespace App\Models\Alumni;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';

    protected $fillable = [
        'id_question',
        'tahun_kelulusan',
        'pertanyaan',
        'jawabanA',
        'jawabanB',
        'jawabanC',
        'jawabanD'
    ];

    public function listQuestion()
    {
        return $this->all();
    }

    public function findbyQuestion($id_question) {
        return $this->where('id_question', $id_question)->get();
    }

    public function newQuestion($data) {
        $this->tahun_kelulusan = $data['tahun_kelulusan'];
        $this->pertanyaan = $data['pertanyaan'];
        $this->jawabanA = $data['jawabanA'];
        $this->jawabanB = $data['jawabanB'];
        $this->jawabanC = $data['jawabanC'];
        $this->jawabanD = $data['jawabanD'];
        $this->jawabanE = $data['jawabanE'];
        $this->save();
    }

    public function removeQuestion($id_question) {
        $isExists = $this->where('id_question', $id_question)->limit(1)->count() == 1;

        if ($isExists) {
            return $this->where('id_question', $id_question)->delete();
        }

        return false;
    }
}
