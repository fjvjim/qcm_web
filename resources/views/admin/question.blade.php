@extends('admin.layout_admin')

@section('contain')
<section id="cart_items">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h3>Liste des questionnaire</h3>
            </div>
            <div class="col-sm-4">
                <a class="btn btn-default update" href="{{ url('admin/question/add/0') }}">Ajouter questionnaire</a>
            </div>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="description"></td>
                        <td class="price">Nombres reponses</td>
                        <td class="quantity">Action</td>
                        <td class="delete"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $item)
                        <tr>
                            <td class="cart_description">
                                <h4><a href="">{{ $item->titre }}</a></h4>
                            </td>
                            <td class="cart_quantity">
                                <a class="btn btn-default update" href="{{ url('admin/reponse/liste/'.$item->id) }}">({{ $item->nb_reponse }}) Repnse(s)</a>
                            </td>
                            <td class="cart_quantity">
                                <a class="btn btn-default update" href="{{ url('admin/question/add/'.$item->id) }}">Modifiere</a>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{ url('admin/question/delete/'.$item->id) }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
