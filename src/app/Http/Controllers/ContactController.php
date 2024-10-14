<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Livewire\Modal;

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
        dd($request->all());
        
        $tell = implode('-',[$request->tell1, $request->tell2, $request->tell3]);

        $contact = $request->only([
            'last_name', 'first_name', 'email','tell', 'address', 'building', 'content', 'detail', 'category_id'
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
        $contact['tell'] = $tell;

        $contact['category_id'] = $request->category_id;

        Contact::create($contact);

        return view('thanks');
    }

// 管理画面の表示
    public function admin()
    {
        $contacts = Contact::Paginate(7);

        foreach ($contacts as $contact) {
            // Contactモデル内のgetGenderTextAttribute()を読み込み性別データをテキスト化
            $contact->gender_text = $contact->getGenderTextAttribute();

            // category_idにCategoryモデルのcontentカラムを代入
            $category = Category::find($contact->category_id);
            $contact->content = $category ? $category->content : null;
        };

        $genders = [
            0 => '全て',
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];

        $categories = Category::all();

        $showModal = false;
        return view('admin', compact('contacts', 'categories', 'genders', 'showModal'));
    }

// 管理画面での検索
    public function search(Request $request)
    {
        // リセットボタンが押された時の処理
        if ($request->has('reset')) {
            return redirect()->action([ContactController::class, 'admin']);
        };

        // 完全一致または部分一致検索の定義
        $exactMatch = $request->input('exact_match', false);

        $contacts = Contact::query()
            ->NameSearch($request->name, $exactMatch)
            ->EmailSearch($request->email, $exactMatch)
            ->GenderSearch($request->gender)
            ->CategorySearch($request->category_id)
            ->DateSearch($request->date)
            ->paginate(7)
            ->appends($request->except('page'));

        $categories = Category::all();

        $genders = [
            0 => '全て',
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];

        return view('admin', compact('contacts', 'categories', 'genders'));
    }
}
