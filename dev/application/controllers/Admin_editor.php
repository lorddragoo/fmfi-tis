<?php if (!defined('APPPATH')) { die('No direct access allowed ...'); }

class Admin_editor extends Abstract_backend_controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->parser->disable_caching();
    }
    
    public function index($table = NULL) {
        $table_collection = $this->load->table_collection($table);
        
        if ($table_collection == NULL) {
            $this->parser->assign('error', 'no_table');
        } else {
            $this->parser->assign('sql_table', $table);
            $this->parser->assign('grid_settings', $table_collection->getGridSettings());
            
            $this->_applySorting($table_collection);
            
            $max_pages = $table_collection->getPagesCount($this->_numberOfRowsPerPage());
            $table_collection->paginate($this->_pageNumber($max_pages), $this->_numberOfRowsPerPage());
            
            $this->parser->assign('current_page', $this->_pageNumber($max_pages));
            $this->parser->assign('current_rows_per_page', $this->_numberOfRowsPerPage());
            $this->parser->assign('max_pages', $max_pages);
            $this->parser->assign('rows_per_pages_options', self::getConfigItem('application', 'grid_rows_per_page_possibilities'));
            
            $this->parser->assign('rows', $table_collection->execute()->get());
        }
        
        $this->_addTemplateJs('admin_editor/index.js');
        $this->_assignTemplateAdditionals();
        
        $this->parser->parse('backend/admin_editor.index.tpl', array());
    }
    
    private function _numberOfRowsPerPage() {
        $post = $this->input->post();
        if ($post === FALSE || !isset($post['paginate']['rows_per_page'])) {
            return intval(self::getConfigItem('application', 'grid_default_rows_per_page'));
        }
        return intval($post['paginate']['rows_per_page']);
    }
    
    private function _pageNumber($max_pages) {
        $post = $this->input->post();
        if ($post === FALSE || !isset($post['paginate']['page'])) {
            return 1;
        }
        if (intval($post['paginate']['page']) > $max_pages) {
            return $max_pages;
        }
        return intval($post['paginate']['page']);
    }
    
    private function _applySorting(Abstract_table_collection $table_collection) {
        $post = $this->input->post();
        if ($post === FALSE || !isset($post['sorting']['by']) || empty($post['sorting']['by'])) { return; }
        
        $sort_by = $post['sorting']['by'];
        $sort_direction = isset($post['sorting']['direction']) ? $post['sorting']['direction'] : 'DESC';
        
        $table_collection->orderBy($sort_by, $sort_direction);
    }
}

?>