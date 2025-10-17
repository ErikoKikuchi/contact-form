<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    //インデックス画面の表示
    public function index()
    {
        return view('index');
    }
    //入力内容確認ページの表示
    public function confirm(ContactRequest$request)
    {
        $contact = $request -> only(['name','email','tel','content']);
        return view('confirm',compact('contact'));
    }
    //送信ボタンを押したときの処理
    public function store(ContactRequest$request)
    {
        $contact =$request -> only(['name','email','tel','content']);
        Contact::create($contact);
        return view('thanks');
    }

}
