@extends('template.user')

@section('title')
    Custom Dessert
@endsection

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/selectform.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/user/customdetails.css') }}">
@endsection

@section('content')
    @livewire('details-product', ['ide' => $ide])
@endsection

@section('js')
    {{-- <script src="{{ asset('js/selectform.js') }}"></script> --}}
    <script>
        var buynowbtn = document.getElementById('gaskeun');
        buynowbtn.addEventListener('click',function(){
            var inputankusus = document.getElementById('direct');
            inputankusus.setAttribute('value','langsung');
            document.getElementById('adtucart').click();
        });


        var fotoproduct = document.getElementById('fotoproduct');
        var priceproduct = document.getElementById('productprice');
        var el = document.createElement("div");
        el.innerHTML = "heyho";
        el.classList.add('description');

        const mq = window.matchMedia( "(min-width: 500px)" );
        if (mq.matches) {
            el.classList.add('mt');
            insertAfter(el, fotoproduct);
            // alert("window width >= 500px");
        } else {
            insertAfter(el, priceproduct);
            // alert("window width < 500px");
        }

        const mainimg = document.querySelector('#mainimage');
        const imglist = document.querySelector('.imglist');

        imglist.addEventListener('click', function(e){

            if(e.target.className == 'detailimage'){
                mainimg.src = e.target.src;
            }

        });

        function insertAfter(newNode, referenceNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}
    </script>
@endsection