@extends('admin.layout_admin')

@section('contain')
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="contact-form">
                <h2 class="title text-center">Nouvelle question</h2>
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="{{ url('admin/question/save') }}">
                    @csrf
                    <input type="hidden" name="question[id]" value="{{ $question->id }}">
                    <div class="form-group col-md-12">
                        <textarea name="question[titre]" id="titre" required="required" class="form-control titre" rows="8" placeholder="Votre question">{{ $question->titre }}</textarea>
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
