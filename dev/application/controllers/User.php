<?php 
    
    if (!defined('APPPATH')) { die('No direct access allowed ...'); }

/**
 * @package AppControllers
 */

    class User extends Abstract_backend_controller {
        
        /*
        * Display Form for changing email and password
        * 
        * @param string $form
        * @retrun;
        */
        public function changeForm($param1 = NULL, $param2 = NULL) {
            $this->parser->disable_caching();
            
            switch ($param1) {
                case "email":
                case "password":
                case "failed":
                case "success":
                    $name = $param1;
                    break;
                default:
                    $name = NULL;
                    break;
            }
            if (!is_null($name)) {
                $this->parser->assign("param1", $name);
            }
            
            switch ($param2) {
                case "password-short":
                case "password-mismatch":
                case "invalid-email":
                case "email":
                case "password";
                    $msg = $param2;
                    break;
                default:
                    $msg = NULL;
                    break;
            }
            
            if (!is_null($msg)) {
                $this->parser->assign("param2", $msg);
            }

            $this->parser->parse('backend/user_changeForm.tpl');
        }
        
        /*
        * 
        * 
        * @param string $form
        * @retrun;
        */
        public function proccesForm($form = NULL) {
            //var_dump($form);
            //var_dump($_POST);
            
            
            $param1 = NULL;
            $param2 = NULL;
            if ($form === "email") {
                $this->load->helper('email');
                $email = $this->input->post("email");
                if (valid_email($email)) {
                    $param1 = "success";
                    $param2 = "email";
                    
                    $this->_sendVerificationEmail($email);
                    
                } else {
                    $param1 = "email";
                    $param2 = "invalid-email";
                }
            }
            
            if ($form === "password") {
                $pwd1 = $this->input->post("password1");
                $pwd2 = $this->input->post("password2");
                $pwd_len = 4;
                
                if (strlen($pwd1) < $pwd_len || strlen($pwd2) < $pwd_len) {
                    $param1 = "password";
                    $param2 = "password-short";
                } else {
                    if ($pwd1 === $pwd2) {
                        $param1 = "success";
                        $param2 = "password";                        
                        
                        $this->_editPassword($pwd1);
                    } else {
                        $param1 = "password";
                        $param2 = "password-missmatch";
                    }
                }
            }
            
            $this->load->helper('url');
            redirect(createUri("user", "changeForm", [$param1, $param2]));
        }
        
        public function validateEmail($verification) {
            
        }
        
        private function _editPassword($newPassword) {
            $this->load->library('session');
            
            $data = $this->session->userdata("logged_in_admin");
            $data = $data["id"];
            
            $edit = $this->load->table_row('admins');
            $edit->load(intval($data));
            $edit->data(array(md5($newPassword)));
            
            var_dump($edit);
            exit;
        }
        
        private function _sendVerificationEmail($email) {
            
        }
        
        
    }