<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
      //return  categories list
      public function index(){
        $categories=Category::all();
        return view('pages.category',['categories'=> $categories]);
    }

    //show category details
    public function show_categorie_details(string $id){
        $category=Category::findOrFail($id);
        return view('pages.category', ['category'=>$category]);
    }

    //create category
    public function create_category(){
        $category= new Category() ;
        $category->name= request('name');
        $category->author= request('author');
        $category->save();
        return  redirect('/category')->with('msg','Your category added successfully');
    }

    // delete category
    public function destroy_category($id){
        $category= Category::findOrFail($id);
        $category->delete();
        return  redirect('/category')->with('msg','Your category deleted successfully');  ;
    
        }

        // update category 
        public function update_category($id)
        {
            $category = Category::findOrFail($id);
    
            $category->name = $request->input('name');
            $category->author = $request->input('author');
            $category->save();
    
            return redirect('/category')->with('msg', 'Your category  updated successfully');
        }
}
