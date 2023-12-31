<?php
    class reactionModel extends CI_model{
        public function CheckLike($blogId, $userId) {
            $this->db->from('likes');
            $this->db->where('likes.blogid', $blogId);
            $this->db->where('likes.userId', $userId);
            
            // Execute the query and get the count of likes
            $query = $this->db->get();
            $likeCount = $query->num_rows(); // Assuming this returns the number of likes
            if($likeCount){
              return $likeCount;
            }
        }
        




        public function like($blog,$user){
            $data=[
                'blogid'=>$blog,
                'userid'=>$user,
                'date'=>date("Y-m-d H:i:s")
            ];
            $q=$this->db->insert('likes',$data);
            if($q){
                return TRUE;
            }
            
        }

        public function unlike($blog,$user){
            $this->db->where('blogid', $blog);
            $this->db->where('userid', $user);
            $q=$this->db->delete('likes');
            if($q){
                return TRUE;
            }


         
        }



        public function likeCount($blogid){
            $this->db->where('blogid',$blogid);
          
           $likes= $this->db->get('likes');

           //if($likes->num_rows()>0){
            return $likes->num_rows();

           //}
         return '';
        }

        public function doILike($blog,$user){
            $this->db->where('blogid', $blog);
            $this->db->where('userid', $user);
            $dolike=$likes= $this->db->get('likes');
            return $likes->num_rows();
        }

        public function CommentCount($blogid){
            $this->db->where('blogid',$blogid);
           $likes= $this->db->get('comments');

           //if($likes->num_rows()>0){
            return $likes->num_rows();

           //}

            
            return '';
        }




        public function comment($blog,$user,$comment){
            $data=[
                'blogid'=>$blog,
                'userid'=>$user,
                'date'=>date("Y-m-d H:i:s"),
                'comment'=>$comment
            ];
            $q=$this->db->insert('comments',$data);
            if($q){
                return TRUE;
            }
            
        }

        public function getComment($blogid){
            $this->db->where('blogId',$blogid);
            $this->db->join('users', 'users.uid = comments.userId');
            $this->db->order_by('commentId','desc');
            $comments=$this->db->get('comments');

            if($comments->num_rows()>0){
                return $comments->result();
            }
            else{
                return array();
            }
        }
    }
?>