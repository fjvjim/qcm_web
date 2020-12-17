@extends('admin.layout_admin')

@section('contain')
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="contact-form">
                <h2 class="title text-center">Nouvelle reponse</h2>
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="{{ url('admin/reponse/save') }}">
                    @csrf
                    <input type="hidden" name="data[id]" value="{{ $reponse->id }}">
                    <input type="hidden" name="data[question_id]" value="{{ $id_question }}">
                    <div class="form-group col-md-12">
                        <textarea name="data[titre]" id="titre" required="required" class="form-control titre" rows="8" placeholder="Votre question">{{ old('titre') ?? $reponse->titre }}</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <select name="data[resultat]">
                            <option value="0" @if ($reponse->resultat == 0) selected="selected" @endif>Non</option>
                            <option value="1" @if ($reponse->resultat == 1) selected="selected" @endif>Oui</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" name="submit" class="btn btn-primary pull-right" value="Valider">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
