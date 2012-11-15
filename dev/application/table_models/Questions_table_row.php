<?php if (!defined('APPPATH')) { die('No direct access allowed ...'); }

class Questions_table_row extends Abstract_table_row {
    
    /**
     * var Abstract_table_relation relation to answers for this question.
     */
    protected $answers;
    
    /**
     * Relations initialisation.
     */
    protected function init() {
        $this->answers = $this->load->table_relation('questions', 'answers');
    }
    
    /**
     * Relations reset.
     */
    protected function resetRelations() {
        $this->answers->reset();
    }
    
    /**
     * Get all related answers in database storage order.
     * 
     * @return array<Abstract_table_row> array of related rows.
     */
    public function getAnswers() {
        return $this->answers->setOrderBy(NULL)->get($this->getId());
    }
    
    /**
     * Get all related answers in random order.
     * 
     * @return array<Abstract_table_row> array of related rows.
     */
    public function getAnswersRandom() {
        return $this->answers->setOrderBy('random')->get($this->getId());
    }
}

?>