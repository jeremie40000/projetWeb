@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>Welcome to my first page</title>
@endsection

@section('contentWelcome')
<p>Liste des comptes :</p>
<?php 
    foreach ($users as $user) {
        echo "$user->firstName . $user->name . $user->id . $user->password<br>";
    }
    //var_dump($users);
 ?>

 <p>Creer un nouveau compte : </p>
 <form action="/create" method="post">
     @csrf
     Name = <input type="text" name="nameInput">
     firstName = <input type="text" name="firstNameInput">
     id = <input type="text" name="idInput">
     password = <input type="text" name="passwordInput">
     <input type="submit" name="submitInput" value="Envoyer">
 </form>

@endsection