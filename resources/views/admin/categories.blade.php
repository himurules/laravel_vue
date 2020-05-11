@extends('layouts.app')

@section('content')
    <!-- Add/Edit Categories start-->
    <section class="food_menu gray_bg">
        <div class="container">
            <div>
                <div class="row">
                    <div class="section_tittle">
                        <h2>Add/Edit Categories</h2>
                    </div>
                </div>
                <categories-manager :initial-categories="{{ $categories }}"></categories-manager>
            </div>
        </div>
    </section>
    <!-- Add/Edit Categories end-->
@endsection
