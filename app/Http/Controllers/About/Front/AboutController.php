<?php

namespace App\Http\Controllers\About\Front;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function show()
    {
        $about = About::find(1);

        $this->seo()->setTitle('About us - SANIK GROUP');
        $this->seo()->setDescription($about->content);

        return view('about.front.show', compact('about'));
    }
}
