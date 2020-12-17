<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Reponse;
use App\Models\Resultat;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QcmController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        if(!session()->has("users")){
            return redirect('login');
        }
        /*
        $ss = session('user');
        if(session()->has('user')){
            $data['type'] = 1;
            $data['isLogin'] = true;
        }
        */

        //print_r($ss);die;
        return redirect('question/liste/1');
        //$this->liste(1);
    }

    public function liste(Request $request,$id)
    {
        $data = $this->_data;
        $data['idMenu'] = 2;
        $question = Question::find($id);
        $count = Question::count();
        $request->session()->put('count', $count);
        $data['question'] = $question;
        //print_r($question);die;

        $res = DB::table('questions')
        ->leftJoin('reponses', 'reponses.question_id', '=', 'questions.id')
        ->select('reponses.*')
        ->where('reponses.question_id','=',$id)
        ->get();
        $data['reponses'] = $res;
        if(empty($res[0])){
            return $this->resultat();
        }
        if(session()->has('users')){
            $data['type'] = 1;
            $data['isLogin'] = true;
        }
        return view('question', $data);
    }

    public function store(Request $request)
    {
        $dataPost = request('reponse');
        $resultat = new Resultat();
        $points = new Point();
        $count = Question::where('nb_question','>','0')->count();
        $nb =0;
        $pourcentage = 0;
        if(!empty($dataPost) && session()->has('users')){
            if(!isset($dataPost['reponse_id'])){
                print_r("ato");die;
                return redirect('question/liste/'.$dataPost['question_id']);
            }
            $user = session('users');
            $res = Resultat::where('user_id',$user[0]->id)
            ->where('question_id', $dataPost['question_id'])
            ->first();
            //print_r($res);die;
            if(!empty($res)){
                $res->reponse_id = $dataPost['reponse_id'];
                $res->reponse_titre = $dataPost['reponse_titre'];
                $res->resultat = $dataPost['resultat'];
                $res->resultat_titre = $dataPost['resultat_titre'];
                $res->save();
            }else{
                $resultat->user_id = $user[0]->id;
                $resultat->question_id = $dataPost['question_id'];
                $resultat->reponse_id = $dataPost['reponse_id'];
                $resultat->reponse_titre = $dataPost['reponse_titre'];
                $resultat->resultat = $dataPost['resultat'];
                $resultat->resultat_titre = $dataPost['resultat_titre'];
                $resultat->save();
            }

            if($dataPost['reponse_id'] === $dataPost['resultat']){
                $res2 = Point::where('user_id',$user[0]->id)
                ->first();

                if(!empty($res2)){
                    $nb = $res2->nb_reponse+1;
                    $pourcentage = ($nb*100)/$count;
                    $res2->nb_reponse = $nb;
                    $res2->porcentage = $pourcentage;
                    $res2->save();
                }else{
                    $nb = 1;
                    $pourcentage = 100/$count;
                    $points->user_id = $user[0]->id;
                    $points->nb_reponse = $nb;
                    $points->porcentage = $pourcentage;
                    $points->save();
                }
            }

            $request->session()->put('nombre', $nb);
            $request->session()->put('pourcentage', $pourcentage);

            $next = $dataPost['question_id']+1;
            return redirect('question/liste/'.$next);
        }else{
            return redirect('question/liste/1');
        }

    }

    public function resultat()
    {

        //$this->getQuestionNoued();
        $data = $this->_data;
        $data['idMenu'] = 2;
        if(session()->has('users')){
            $data['type'] = 1;
            $data['isLogin'] = true;
        }
        $res = array();
        $user = session('users');
        $reponse = Resultat::where('user_id',$user[0]->id)->get();
        $question = Question::where('nb_question','>','0')->get();
        foreach($question as $item){
            $res[] = $item;
            $item->child = Reponse::where('question_id',$item->id)->get();
        }

        $resultat = Point::where('user_id', $user[0]->id)->get();

        $data['qcmcollection'] = $res;
        $data['reponse'] = $reponse;
        $data['resultat'] = $resultat[0];
        //print_r($data['resultat'][0]->nb_reponse);die;

        return view('resultat', $data);

    }

    public function getQuestionNoued()
    {
        $res = array();
        $question = Question::all();
        $reponse = Resultat::where('user_id',1)->get();
        foreach($question as $item){
            $res[] = $item;
            $item->child = Reponse::where('question_id',$item->id)->get();
        }

        //$question = Question::where('id',1)->first();
        //print_r($question->titre);die;
        print_r($res);die;
    }
}
