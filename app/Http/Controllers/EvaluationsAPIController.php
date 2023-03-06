<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationsAPIController extends Controller
{
    public function index()
    {
        return QuestionResource::collection(Question::where('evaluation_id', 1)->get());
    }
}