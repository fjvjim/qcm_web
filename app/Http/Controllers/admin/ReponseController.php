<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Http\Request;

class ReponseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($id=0)
    {
        $data = $this->_data;
        $question = Question::find($id);
        if($question){
            $reponses = Reponse::where('question_id',$question->id)->get();
            if(!$reponses)
                return back();
            $data["question"]=$question;
            $data["reponses"] = $reponses;
        }
        return view('admin.reponse', $data);
    }

    public function edit($id_question=0,$id=0)
    {
        $data = $this->_data;
        $data["reponse"] = new Reponse();
        //$res = Reponse::where('id', $id)->firstOrFail();
        $res = Reponse::find($id);
        if($res){
            $data["reponse"] = $res;
        }
        $data['id_question'] = $id_question;
        return view('admin.edit_resp', $data);
    }

    public function store()
    {
        $dataPost = request('data');
        if(isset($dataPost))
        {
            //dd($dataPost['id']);
            $reponse = new Reponse();
            if(!empty($dataPost['id'])){
               $res = $reponse::find($dataPost['id']);
               $res->titre = $dataPost['titre'];
               $res->resultat = $dataPost['resultat'];
               $res->save();
            }else{
                $reponse->titre = $dataPost['titre'];
                $reponse->resultat = $dataPost['resultat'];
                $reponse->question_id = $dataPost['question_id'];
                $reponse->save();
                $question = Question::find($dataPost['question_id']);
                $question->nb_question = $question->nb_question+1;
                $question->save();
            }
        }
        return redirect('admin/reponse/liste/'.$dataPost['question_id']);
    }

    /**
     *
     */
    public function drop($id_question=0,$id=0)
    {
        $res = Reponse::find($id);
        if($res){
            $res->delete();
        }
        return redirect('admin/reponse/liste/'.$id_question);
    }
}
