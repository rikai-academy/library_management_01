<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
class ViewPublisherController extends Controller
{
 public function showPublisher($publisher){
  $getPublisher = Publisher::with('book')->find($publisher);
  $bookByPublisher = $getPublisher->Book; 
  return view('layouts.user.viewpublisher', compact('getPublisher','bookByPublisher'));
 }
}