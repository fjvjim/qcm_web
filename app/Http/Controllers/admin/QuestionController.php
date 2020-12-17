<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_data['idMenu'] = 0;
    }

    public function index()
    {
        $data = $this->_data;
        $reponse = DB::table('questions')
        ->select(DB::raw("*, (select COUNT(*) from reponses where questions.id = reponses.question_id) as nb_reponse "))
        ->get();
        $data['questions'] = $reponse;
        //print_r($reponse);die;
        return view('admin/question', $data);
    }

    public function edit($id=0)
    {
        $data = $this->_data;
        $data["question"] = new Question();
        $res = Question::where('id', $id)->firstOrFail();
        if(isset($res)){
            $data["question"] = $res;
        }
        return view('admin/edit', $data);
    }

    public function store()
    {
        //request()->validate(['titre'=>'required']);
        $dataPost = request('question');
        if(isset($dataPost))
        {
            //dd($dataPost['id']);
            $question = new Question();
            if(!empty($dataPost['id'])){
               $quest = $question::find($dataPost['id']);
               $quest->titre = $dataPost['titre'];
               $quest->save();
            }else{
                $question->titre = $dataPost['titre'];
                $question->nb_question =0;
                $question->save();
            }
        }
        return redirect('admin/question');
    }

    public function drop($id)
    {
        $question = Question::find($id);
        if(!empty($question)){
            $question->delete();
        }
        print_r('DSDS');die;
        return redirect('admin/question');
    }
}
