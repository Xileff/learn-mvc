<?php

class About extends Controller
{
    public function index($name = 'name', $occupation = 'occupation', $age = 0)
    {
        $data['name'] = $name;
        $data['occupation'] = $occupation;
        $data['age'] = $age;
        $this->view('about/index', $data);
    }

    public function page()
    {
        $this->view('templates/header');
        $this->view('about/page');
        $this->view('templates/footer');
    }
}
