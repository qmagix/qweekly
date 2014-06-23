<?php class Weekly_model extends CI_Model {

    var $project=array('title'=>'','notes'=>'','keywords'=>'');
    var $finding=array('title'=>'','notes'=>'','comments'=>'','keywords'=>'');
   
    function __construct()
    {
        parent::__construct();
    }
    
    function getProjects()
    {
        $query = $this->db->get('projects');
        return $query->result();
    }
    
    function getFindings()
    {
        $query = $this->db->get('findings');
        return $query->result();
    }
    
    function insertProjectEntry()
    {
        $project['title'] = $_POST['title']; // please read the below note
        $project['notes'] = $_POST['notes'];

        $this->db->insert('projects', $project);
    }

    function updateProjectEntry()
    {
        $project['title']= $_POST['title'];
        $project['notes']= $_POST['notes'];
        //$this->date    = time();

        $this->db->update('projects', $project, array('id' => $_POST['id']));
    }
    
    function insertFindingEntry()
    {
        $finding['title'] = $_POST['title']; // please read the below note
        $finding['notes'] = $_POST['notes'];
        $finding['comments'] = $_POST['comments'];

        $this->db->insert('findings', $finding);
        //get id, insert into project_findings table
        $this->db->insert('project_findings', array('project_id'=>$_POST['project_id'], 'finding_id'=>$this->db->insert_id()));
        // need to support multiple projects association
        
    }

    function updateFindingEntry()
    {
        $finding['title']= $_POST['title'];
        $finding['notes']= $_POST['notes'];
        $finding['comments'] = $_POST['comments'];
        //$this->date    = time();

        $this->db->update('findings', $finding, array('id' => $_POST['id']));
    }
    
    
}
?>