@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')

<!-- Main -->
<article class="min-100 pt-5 pb-5 bg-black" role="main">
    @include('Flooflix.partials.message')
    <div class="row separator mx-5 azure">
        <header>
            <h1 class="font-alfa azure">Conditions d'utilisation</h1>
        </header>
    </div>
    <h2 class="font-alfa azure mx-5 mt-4">1 - Paragraphe N° 1</h2>
    <h3 class="font-alfa azure mx-5 mt-3">1.1 Sous-paragraphe</h3>
    <p class="font-alfa azure mx-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti numquam minus ad. Voluptate fuga vel adipisci
        corporis, voluptatem animi dignissimos porro deleniti reiciendis eos, incidunt obcaecati facilis consequatur neque
        error.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, hic libero? Id omnis rem quam sed voluptatibus,
        veritatis modi exercitationem iure quisquam architecto harum illo saepe et recusandae illum est?
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto nam unde delectus quis doloribus iste nihil cumque?
        Asperiores quia omnis ducimus perspiciatis doloremque corrupti ea eius est, eveniet veniam rem!
    </p class="font-alfa azure mx-5">
    <br>
    <h3 class="font-alfa azure mx-5 mt-3">1.2 Sous-paragraphe</h3>
    <p class="font-alfa azure mx-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti numquam minus ad. Voluptate fuga vel adipisci
        corporis, voluptatem animi dignissimos porro deleniti reiciendis eos, incidunt obcaecati facilis consequatur neque
        error.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, hic libero? Id omnis rem quam sed voluptatibus,
        veritatis modi exercitationem iure quisquam architecto harum illo saepe et recusandae illum est?
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto nam unde delectus quis doloribus iste nihil cumque?
        Asperiores quia omnis ducimus perspiciatis doloremque corrupti ea eius est, eveniet veniam rem!
    </p>
    <br>
    <h3 class="font-alfa azure mx-5 mt-3">1.3 Sous-paragraphe</h3>
    <p class="font-alfa azure mx-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti numquam minus ad. Voluptate fuga vel adipisci
        corporis, voluptatem animi dignissimos porro deleniti reiciendis eos, incidunt obcaecati facilis consequatur neque
        error.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, hic libero? Id omnis rem quam sed voluptatibus,
        veritatis modi exercitationem iure quisquam architecto harum illo saepe et recusandae illum est?
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto nam unde delectus quis doloribus iste nihil cumque?
        Asperiores quia omnis ducimus perspiciatis doloremque corrupti ea eius est, eveniet veniam rem!
    </p>
    <h2 class="font-alfa azure mx-5 mt-4">2 - Paragraphe N° 2</h2>
    <h3 class="font-alfa azure mx-5 mt-3">2.2 Sous-paragraphe</h3>
    <p class="font-alfa azure mx-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti numquam minus ad. Voluptate fuga vel adipisci
        corporis, voluptatem animi dignissimos porro deleniti reiciendis eos, incidunt obcaecati facilis consequatur neque
        error.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, hic libero? Id omnis rem quam sed voluptatibus,
        veritatis modi exercitationem iure quisquam architecto harum illo saepe et recusandae illum est?
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto nam unde delectus quis doloribus iste nihil cumque?
        Asperiores quia omnis ducimus perspiciatis doloremque corrupti ea eius est, eveniet veniam rem!
    </p>
    <br>
    <h3 class="font-alfa azure mx-5 mt-3">2.2 Sous-paragraphe</h3>
    <p class="font-alfa azure mx-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti numquam minus ad. Voluptate fuga vel adipisci
        corporis, voluptatem animi dignissimos porro deleniti reiciendis eos, incidunt obcaecati facilis consequatur neque
        error.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, hic libero? Id omnis rem quam sed voluptatibus,
        veritatis modi exercitationem iure quisquam architecto harum illo saepe et recusandae illum est?
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto nam unde delectus quis doloribus iste nihil cumque?
        Asperiores quia omnis ducimus perspiciatis doloremque corrupti ea eius est, eveniet veniam rem!
    </p>
    <br>
    <h3 class="font-alfa azure mx-5 mt-3">2.3 Sous-paragraphe</h3>
    <p class="font-alfa azure mx-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti numquam minus ad. Voluptate fuga vel adipisci
        corporis, voluptatem animi dignissimos porro deleniti reiciendis eos, incidunt obcaecati facilis consequatur neque
        error.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, hic libero? Id omnis rem quam sed voluptatibus,
        veritatis modi exercitationem iure quisquam architecto harum illo saepe et recusandae illum est?
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto nam unde delectus quis doloribus iste nihil cumque?
        Asperiores quia omnis ducimus perspiciatis doloremque corrupti ea eius est, eveniet veniam rem!
    </p>
</article>

@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/home.js"></script>
@endsection