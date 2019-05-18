<?php

namespace App\Models\Alumni;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawabanquestion';

    protected $fillable = [
        'id_jawaban',
        'NIM',
        'id_question',
        'jawaban'
    ];

    public function listJawaban()
    {
        // $query = DB::table('jawabanquestion')
        // ->join('alumni', 'jawabanquestion.NIM', '=', 'alumni.NIM')
        // ->join('question', 'question.id_questiom', '=', 'jawabanquestion.id_question')
        // ->select('*')
        // ->get();
        return $this->all();
    }

    public function findbyJawaban($id_jawaban) {
        return $this->where('id_jawaban', $id_jawaban)->get();
    }

    public function newJawaban($data) {

        $this->id_jawaban = $data['id_jawaban'];
        $this->NIM = $data['NIM'];
        $this->id_question = $data['id_question'];
        $this->jawaban = $data['jawaban'];

        $this->save();
    }

    public function removeJawaban($id_jawaban) {
        $isExists = $this->where('id_jawaban', $id_jawaban)->limit(1)->count() == 1;

        if ($isExists) {
            return $this->where('id_jawaban', $id_jawaban)->delete();
        }

        return false;
    }
}
