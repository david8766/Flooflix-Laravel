@extends('layouts.base')
@section('content')
<body>
    <h1>Page de test</h1>
    <div class="card text-white bg-dark mb-3" id="box">
    <div class="card-body">
        <h5 class="card-title">Attribuer la note de :</h5>
        <form method="GET" action="lightbox-formulaire-test.html" target="_parent">
            <select name="note">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        <input type="submit" name="submit" value="Envoyer">
        <input type="button" name="cancel" value="Annuler" onclick="closebox()">
        </form>
    </div>
</div>
</body>
@endsection
<script src="http://127.0.0.1:8000/js/test.js"></script>