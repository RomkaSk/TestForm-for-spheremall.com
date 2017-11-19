<?php

class User {
    private $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }

    function sendMail($data) {
       $to = $data['email'];
       $subject = "TestForm";
        
       $message = '
        <html>
            <head>
                <title>TestForm</title>
            </head>
            <body>
                <p>Name: '.$data['name'].'</p>
                <p>Last Name: '.$data['last_name'].'</p>
                <p>Email: '.$data['email'].'</p>
                <p>Comment: '.$data['comment'].'</p>
                <p>Image: <a href="'.$data['avatar'].'">'.$data['avatar'].'</a></p>
            </body>
        </html>';

        $headers  = "Content-type: text/html; charset=utf8 \r\n";
        $headers .= "From: TestForm <admin@site.ua>\r\n";
       
        if(mail($to, $subject, $message, $headers)) {
            return true;
        }
    }

    function saveAvatar($file) {
        $uploaddir = UPLOAD_DIR;

        if($file['file']['size'] > 1024*6*1024)
        {
            echo 'The file is too large';
            return true;
        }
     
        $uploadfile = $uploaddir.rand(0, 999999).basename($file['file']['name']);
     
        if(move_uploaded_file($file['file']['tmp_name'], $uploadfile))
        { 
            return $uploadfile;
            // return split('/site.ua/public_html/', $uploadfile)[1]; - If the script outside website root
        } else {
            return false;
        }       
    }

    public function save($data, $file) {
        $user = array(
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'comment' => $data['comment'],
            'avatar' => $this->saveAvatar($file)
        );

        if($this->db->insertForm($user) && $this->sendMail($user)) {
            header('Location: /#good', true, 301);
            exit;
        } else {
            header('Location: /#error', true, 301);
            exit;
        }
    }
}

