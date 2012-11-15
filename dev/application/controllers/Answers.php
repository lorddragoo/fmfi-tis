<?php if (!defined('APPPATH')) { die('No direct access allowed ...'); }

class Answers extends Abstract_frontend_controller {

    public function ajaxCheckAnswer($answer_id = NULL) {
        $this->output->set_content_type('application/json');
        if ($answer_id = NULL) {
            $this->output->set_output(json_encode(false));
        }
        
        $answer = $this->load->table_row("answers");
        if ($answer->load($answer_id)) {
            $odpoved = $answer->getCorrect();
        } else {
            $this->output->set_output(json_encode(false));
        }
        
        if ($odpoved === 1) {
            $this->output->set_output(json_encode(true));
        } else {
            $this->output->set_output(json_encode(false));
        }
    }	
	
}