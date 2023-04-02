<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
   public function index() {

   
     $pages = Page::all();

     return View::make('pages.index')
         ->with('pages', $pages);



}
public function create() {
   
     return View::make('pages.create');
}
public function store(Request $request) {
  $request->validate([
    'title' => 'required',
    'content' => 'required|min:50',
    'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  ]);

  $imageName = time() . '.' . $request->file->extension();
  // $request->image->move(public_path('images'), $imageName);
  $request->file->storeAs('public/images', $imageName);

  $pageData = ['title' => $request->title, 'content' => $request->content, 'image' => $imageName];

  Page::create($pageData);
  return redirect('/page')->with(['message' => 'Page added successfully!', 'status' => 'success']);

}
public function show($id) {
   
     $page = Page::find($id);

     return View::make('pages.show')
         ->with('page', $page);
}
public function edit($id) {

     $page = Page::find($id);

     return View::make('pages.edit')
         ->with('page', $page);
}
public function update(Request $request, Page $page) {
  $imageName = '';
  if ($request->hasFile('file')) {
    $imageName = time() . '.' . $request->file->extension();
    $request->file->storeAs('public/images', $imageName);
    if ($page->image) {
      Storage::delete('public/images/' . $page->image);
    }
  } else {
    $imageName = $page->image;
  }

  $pageData = ['title' => $request->title,  'content' => $request->content, 'image' => $imageName];

  $page->update($pageData);
  return redirect('/page')->with(['message' => 'Page updated successfully!']);
}

public function destroy(Page $page) {
  Storage::delete('public/images/' . $page->image);
  $page->delete();
  return redirect('/page')->with(['message' => 'Page deleted successfully!']);
}
}
