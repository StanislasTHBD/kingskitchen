<h1>Voici la fiche recette</h1>

<p>
    Ceci est la fiche recette
</p>

<ul>
    <li>Nom de la recette : {{ $recette->name }}</li>
    <li>Prix : {{ $recette->price / 100 }} €</li>
    <li>Description : {{ $recette->description }}</li>
</ul>
