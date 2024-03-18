<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDFMergeSubscriber extends Model
{
    use HasFactory;

    protected $table = 'pdfmergesubscribers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'active'
    ];

    public static function messages()
    {
        return [
            'email.required|email|unique:pdfmergesubscribers,email' => 'Welcome back! It seemed you are already registered.',
        ];
    }
}
