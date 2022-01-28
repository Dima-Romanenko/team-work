<?php

class Task
{
    const FILE = 'storage.json';

    public $projects = [];

    public function __construct()
    {
        $this->load();
    }

    public function addProjects($project)
    {
        $this->projects[] = $project;
        $this->save();
    }

    public function editProjects($project, $id)
    {
        $this->project[$id]['name'] = $project;
        $this->save();
    }

    public function deleteArticleById($idx)
    {
        unset($this->projects[$idx]);

        $this->projects = array_values($this->projects);
        $this->save();
    }

    private function save()
    {
        $json = json_encode($this->projects);
        file_put_contents(self::FILE, $json);
    }

    private function load()
    {
        if (file_exists(self::FILE)) {
            $json = file_get_contents(self::FILE);
            $this->projects = json_decode($json, true);
        }
    }

    private function database() {
        $task = filter_input(INPUT_POST, 'task');

//TODO validation
//        const DB_HOST = 'localhost';
//        const DB_USER = 'root';
//        const DB_PASS = '';
//        const DB_NAME = 'jul_1401';
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if($db->connect_errno != 0) {
            exit($db->connect_error);
        }
        $query = "INSERT INTO tasks(name) values('$task');";

        if(!$db->query($query)) {
            exit($db->error);
        }

        header('Location:/index.php');
    }

}