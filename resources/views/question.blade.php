@extends('/layout')

@section('contain')
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>Q{{ $question['id']." ".$question['titre'] }}</h3>
                <p>Choisur la reponse</p>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    @if (isset($reponses) && count($reponses)>0)
                        <form action="{{ url('question/valide') }}" id="reponse" method="POST" >
                            @csrf
                            <input type="hidden" class="" name="reponse[question_id]" value="{{ $question['id'] }}">
                            <div class="chose_area">
                                <ul class="user_option">
                                    @foreach ($reponses as $item)
                                        <li>
                                            <label><input type="radio" class="" name="reponse[reponse_id]" required="required" value="{{ $item->id }}"> {{ $item->titre }}</label>
                                            <input type="hidden" name="reponse[reponse_titre]" value="{{ $item->titre }}">
                                        </li>
                                        @if ($item->resultat == "1")
                                            <input type="hidden" name="reponse[resultat]" value="{{ $item->id }}">
                                            <input type="hidden" name="reponse[resultat_titre]" value="{{ $item->titre }}">
                                        @endif
                                    @endforeach
                                </ul>
                                <button class="btn btn-default update" type="submit" name="submit">Valider</button>
                                <a class="btn btn-default check_out" href="{{ url('question/resultats') }}" >Continue</a>
                            </div>
                        </form>
                    @else
                        <h1>Resultat des votre test</h1>
                    @endif

                </div>
                <div class="col-sm-4">
                    <div class="total_area">
						<ul>
							<li>Resultat <span>1/3</span></li>
							<li>Taux <span>85%</span></li>
                        </ul>
					</div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(function(){
            //alert("eto");
        });
    </script>
@endsection
