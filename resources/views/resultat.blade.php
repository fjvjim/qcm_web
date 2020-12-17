@extends('/layout')

@section('contain')
    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    @php
                        $i =0;
                    @endphp
                    @foreach ($qcmcollection as $item)
                        <div class="heading">
                            <h3>Q {{ $item->id.": ".$item->titre }}</h3>
                        </div>
                        @if (!empty($item->child))
                        <div class="chose_area resultat">
                            <ul class="user_option">
                                @foreach ($item->child as $child)
                                    <li>
                                        @if ($child->id === $reponse[$i]->reponse_id)
                                            <label
                                            class="@if ($child->resultat == 1 ) true_value @else false_value @endif"
                                            > {{ $child->titre }} <i class="fa @if ($child->resultat == 1 )fa-check @else fa-times @endif"></i> votre choix</label>
                                        @else
                                            @if ($child->resultat == 1)
                                                <label class="true_value"> {{ $child->titre.", la vraie réponse" }}</label>
                                            @else
                                                <label > {{ $child->titre }}</label>
                                            @endif
                                        @endif

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </div>
                <div class="col-sm-4">
                    <div class="heading">
                        <h3>Résultat</h3>
                    </div>
                    <div class="total_area">
						<ul>
							<li>Point <span>{{ $resultat->nb_reponse.'/'.count($qcmcollection) }}</span></li>
							<li>Pourcentage <span>{{ $resultat->porcentage.' %' }}</span></li>
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
