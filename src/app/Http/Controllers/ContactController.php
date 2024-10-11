<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }
// お問い合わせフォーム→確認画面
    public function confirm(Request $request)
    {
        $tell = implode('-',[$request->tell1, $request->tell2, $request->tell3]);

        $contact = $request->only([
            'first_name','last_name', 'gender', 'email', 'address', 'building', 'content', 'detail'
        ]);

        // 値を加工する必要があるカラムの処理
        $contact['tell'] = $tell;
        $category = Category::find($request->category_id);

        if($category){
            $contact['category_id'] = $category->content;
        } else {
            $contact['category_id'] = null;
        }

        return view('confirm', compact('contact'));
    }
// 確認画面→Thanksページ／データベース挿入
    public function store(Request $request)
    {
        $contact = $request->only([
            'first_name','last_name', 'email', 'address', 'building', 'content', 'detail'
        ]);

        // 値を加工する必要があるカラムの処理
        if ($request->gender === '男性')
        {
            $contact['gender'] = 1;
        } elseif ($request->gender === '女性'){
            $contact['gender'] = 2;
        } else {
            $contact['gender'] = 3;
        }
        $contact['tell'] = $request->tell;

        $contact['category_id'] = $request->category_id;

        Contact::create($contact);

        return view('thanks');
    }

// お問い合わせフォーム入力ページバリデーション
public function create(ContactRequest $request)
{
    $form = $request->all();
    Contact::create($form);
    return redirect('/');
}
}
