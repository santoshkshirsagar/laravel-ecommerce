<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentBlock;

class ContentBlockController extends Controller
{
    //
    public function manage(ContentBlock $block)
    {
        return view('content.manage', compact('block'));
    }
}
