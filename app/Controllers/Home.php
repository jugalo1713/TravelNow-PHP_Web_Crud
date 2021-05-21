<?php

namespace App\Controllers;
use App\Models\User;

class Home extends BaseController
{
	public function index()
	{
		echo view('/login/login_view');
		
	}
	public function Home(){
		echo view('layouts/header');
		echo view('/home_view');
        echo view('layouts/footer');
	}
}
