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

        // $contact_form = session('contact_data',[]);

        return view('index', compact('categories'));
    }
// お問い合わせフォーム→確認画面
    public function confirm(ContactRequest $request)
    {
        $category = Category::find($request->category_id);

        $contact = $request->only([
            'last_name', 'first_name','gender', 'email', 'address', 'building', 'category_id', 'detail'
        ]);

        // 電話番号を加工する処理
        $tell = implode('-',[$request->tell1, $request->tell2, $request->tell3]);
        $contact['tell'] = $tell;

        if($category){
            $contact['category'] = $category->content;
        } else {
            $contact['category'] = null;
        }

        // session(['contact_data' => $contact]);
        // session()->flash('old_values', $contact);

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

// 管理画面の表示
    public function admin()
    {
        $lists = Contact::all()->map(function ($contact) {
            $contact->gender_label = match ($contact->gender) {
                1 => '男性',
                2 => '女性',
                3 => 'その他',
            };

            // category_idにCategoryモデルのcontentカラムを代入
            $category = Category::find($contact->category_id);
            $contact->content = $category ? $category->content : null;

            return $contact;
        });

        $lists = Contact::Paginate(7);

        return view('admin', compact('lists'));
    }

}
