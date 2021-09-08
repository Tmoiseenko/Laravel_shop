@extends('layout.master')

@section('content')

    <div class="Section Section_column Section_columnLeft Section_columnWide">
        <div class="wrap">

            <x-seller.information :seller="$seller"/>

            <div class="Section-content">
                <div class="row row_verticalCenter row_maxHalf">
                    <div class="row-block">
                        <div class="pict"><img src="{{$seller->attachment()->get()}}" alt="bigGoods.png"/>
                        </div>
                    </div>
                    <div class="row-block">
                        <h2>{{$seller->name}}</h2>
                        <p>
                            {{$seller->description}}
                        </p>
                    </div>
                </div>

                <x-popular_products :title="'Популярные товары продавца'"/>

             </div>


        </div>
    </div>

@endsection
