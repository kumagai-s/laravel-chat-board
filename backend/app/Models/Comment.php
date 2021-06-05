<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'login_id',
        'name',
        'comment',
    ];

    protected $guarded = [
        'create_at',
        'update_at',
    ];
    
    /**
     * コメントを全件取得
     * @return mixed
     */
    public function fetchAll()
    {
        return Comment::get();
    }
    
    /**
     * 直近のコメント1件を取得
     * @return mixed
     */
    public function fetchRecentComment()
    {
        return Comment::orderBy('created_at', 'desc')->first();
    }
    
    /**
     * コメントの登録
     * @param $request
     */
    public function register($request)
    {
        $user = Auth::user();
        $data = [
            'login_id' => $user->id,
            'name' => $user->name,
            'comment' => $request->input('comment'),
        ];
        Comment::create($data);
    }
}
