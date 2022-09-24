<?php 
header("Content-Type: text/plain; charset=utf-8");

require __DIR__ . '../../vendor/autoload.php';

use \Hillel\Models\User;

$user = User::find(1);

$user1 = new User();
$user1->id = 1;
$user1->name = 'John';
$user1->email = 'John@mail.com';
$result1 = $user1->create();

$result = $user1->delete();

$user2 = new User;
$user2->name = 'John';
$user2->email = 'some@gmail.com';
$result2 = $user2->save();