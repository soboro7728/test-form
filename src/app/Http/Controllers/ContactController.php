<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }
    public function confirm(ContactRequest $request){
        $contact = $request->only(['first_name', 'last_name', 'gender','email','tel','address','building', 'detail', 'category_id',]);
        $categories = Category::all();
        return view('confirm', compact('contact', 'categories'));
    }
    public function store(ContactRequest $request){
        if ($request->input('back') == 'back') {
            return redirect('/')
                ->withInput();
        }
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'detail', 'category_id']);
        Contact::create($contact);
        return view('thanks');
    }
    public function admin()
    {
        $contacts = Contact::with('category','gender')->simplePaginate(3);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category', 'gender')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->DateSearch($request->date)->simplePaginate(3);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }
}
