<?php 
namespace App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class Menu{

 public static function getCategory(){
  $menuCategory =  DB::table('categories')->get();
  return (isset($menuCategory) ? $menuCategory : '');
 }

 public static function getAuthor(){
  $menuAuthor = DB::table('authors')->get();
  return (isset($menuAuthor) ? $menuAuthor : '');
 }

 public static function getPublisher(){
  $menuPublisher = DB::table('publishers')->get();
  return (isset($menuPublisher) ? $menuPublisher : '');
 }
}
?>