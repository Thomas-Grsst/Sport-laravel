@extends('layout')
@section('title', 'Détails du exercice : ' . $exercice->name)
@section('mainSection')
<!-- Détails -->
<div class="container mx-auto mt-12 px-6 max-w-2xl bg-white rounded-xl shadow-md p-8 text-center">
	<h1 class="text-3xl font-bold text-blue-700 mb-6">Détails de l'exercice #{{ $exercice->name }}</h1>

	<div class="space-y-4">
	<img src="{{ $exercice->image }}" alt="photo" class="mx-auto w-48 h-48 object-cover rounded-lg shadow-md">

	<p class="text-xl font-semibold text-gray-700">{{ $exercice->category }}</p>
	<p class="text-lg text-gray-600">{{ $exercice->description }}</p>
    
	</div>
</div>


<!-- Bouton Éditer -->
<div class="flex justify-center mt-6">
	<a href="/exercices/{{ $exercice->id }}/edit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition-all">✏️ Éditer</a>
</div>
@endsection