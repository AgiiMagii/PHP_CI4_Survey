<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    public function index()
    {
        return $this->render('pages/home', [
            'title' => 'Home'
        ]);
    }

    public function view($page = 'home')
    {
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            throw new PageNotFoundException($page);
        }

        return $this->render('pages/' . $page, [
            'title' => ucfirst($page)
        ]);
    }

}