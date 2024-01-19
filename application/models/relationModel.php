<?php
class RelationModel extends CI_Model {
    public function showName($a, $b) {
         $this->db->select('fname');
        $this->db->from('users');
        $this->db->where_in('uid', array($a, $b));

        $query = $this->db->get();
        $result = $query->result();

          if ($result) {
             return $result;
        } else {
             return false;
        }
    }


    public function FollowOrBlock($todo,$by,$to){
        if($todo=='Follow'){
            $data=[
                'followBy'=>$by,
                'followTo'=>$to,
                'date'=>date("Y-m-d H:i:s")
            ];
            $isFollow=$this->isFollow($by,$to);

            if(!$isFollow){
                $follow=$this->db->insert('follow',$data);
                return"follow";
            }
            else{
                $this->db->where('followBy', $by);
                $this->db->where('followTo', $to);
                $unfollow = $this->db->delete('follow');  
                return"unfollow";
            }
        }
        //if($todo=='Follow')
        
    }

    public function isFollow($by,$to){
        $this->db->where('followBy', $by);
        $this->db->where('followTo', $to);
        $isFollow= $this->db->get('follow');
        return $isFollow->num_rows();
    }

    
}
?>
