<?php if (!defined('APPPATH')) { die('No direct access allowed ...'); }
    
class Migration_Base_tables extends CI_Migration {
    
    public function up() {
        /**
         * Add physicists table begin.
         */
        $this->dbforge->add_field(array(
            'invention_id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
            ),              
            'physicist_id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
            ),
            'sorting' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'default' => '0',
            ),
        ));
        
        $this->dbforge->add_key('invention_id');
        $this->dbforge->add_key('physicist_id');
        
        $this->dbforge->create_table('inventions_physicists_mm');
    }
    
    public function down() {
        /**
         * Drop inventions_physicists_mm table.
         */
        $this->dbforge->drop_table('inventions_physicists_mm');
    }
    
}
    
?>