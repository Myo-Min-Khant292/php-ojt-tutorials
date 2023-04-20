<?php
    // connect to db
    $conn = mysqli_connect("localhost" , "root" , "1234" , "user_data");

    if(!$conn) {
       echo 'Connection failed' . mysqli_connect_error();
    }else {
        // echo "database connect successfully"."</br>";
    }

    class UserValidator {
        private $data;
        private $errors = [];
        private static $fields = ['username' , 'email' , 'phone' , 'password' , 'address'];

        public function __construct($post_data) {
            $this->data = $post_data;
        }

        public function validateForm() {
            // check for empty fields
            foreach (self::$fields as $field) {
                if(!array_key_exists($field , $this->data)) {
                    trigger_error("$field is required");
                    return;
                }
            }
            $this->validateUserName();
            $this->validateEmail();
            $this->validatePhone();
            $this->validatePassword();
            $this->validateAddress();
            return $this->errors;
        }

        private function validateUserName() {
            $val = trim($this->data['username']);
            if (empty($val)) {
                $this->addError('username' , 'username cannot be empty');
            }else {
                if(!preg_match('/^[a-zA-Z\s]+$/', $val)){
                    $this->addError('username' , 'username must be only contain numbers and letters');
               }
            }
        }

        private function validateEmail() {
            $val = trim($this->data['email']);
            global $conn;
            $emailsql = "SELECT * FROM users WHERE email = '$val'";
        
            $results = mysqli_query($conn , $emailsql);
            $lists = mysqli_fetch_all($results , MYSQLI_ASSOC);
            $user = count($lists);

            if (empty($val)) {
                $this->addError('email' , 'email cannot be empty');
            }elseif ($user > 0) {
                $this->addError('email' , 'This email already exists');
            }else {
                if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                    $this->addError('email' , 'email must be an valid email');
               }
            }

        }

        private function validatePhone() {
            $val = trim($this->data['phone']);
            if (empty($val)) {
                $this->addError('phone' , 'Phone number cannot be empty');
            }
        }

        private function validatePassword() {
            $val = trim($this->data['password']);
            if (empty($val)) {
                $this->addError('password' , 'Password cannot be empty');
            }
        }

        private function validateAddress() {
            $val = trim($this->data['address']);
            if (empty($val)) {
                $this->addError('address' , 'Address cannot be empty');
            }
        }

        private function addError($key , $val) {
            $this->errors[$key] = $val;
        }
    }

    class LoginValidator {
        private $data;
        private $errors = [];
        private static $fields = ['email' , 'password' ];

        public function __construct($post_data) {
            $this->data = $post_data;
        }

        public function validateForm() {
            // check for empty fields
            foreach (self::$fields as $field) {
                if(!array_key_exists($field , $this->data)) {
                    trigger_error("$field is required");
                    return;
                }
            }
            $this->validateEmail();
            $this->validatePassword();
            return $this->errors;
        }

        private function validateEmail() {
            $val = trim($this->data['email']);
            global $conn;
            $sql = "SELECT * FROM users WHERE email = '$val'";

            $results = mysqli_query($conn , $sql);
            $lists = mysqli_fetch_all($results , MYSQLI_ASSOC);
            $email = count($lists);

            if (empty($val)) {
                $this->addError('email' , 'email cannot be empty');
            }elseif ($email < 1) {
                $this->addError('email' , "This email dosnen't exists");
            }else {
                if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                    $this->addError('email' , 'email must be an valid email');
               }
            }

        }

        private function validatePassword() {
            $val = trim($this->data['password']);
            global $conn;
            $email = mysqli_real_escape_string($conn, $this->data['email']);
            $sql = "SELECT password FROM users WHERE email = '$email'";

            $result = mysqli_query($conn , $sql);
            $row = mysqli_fetch_assoc($result);
            $hash = $row['password'] ?? '';

            if (empty($val)) {
                $this->addError('password' , 'Password cannot be empty');
            }else {
                if (!password_verify($val, $hash)) {
                    $this->addError('password' , 'Password is wrong');
                }
            }
        }

        private function addError($key , $val) {
            $this->errors[$key] = $val;
        }
    }
?>