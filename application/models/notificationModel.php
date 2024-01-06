<?php
     class notificationModel extends CI_Model{

        public function index(){

        }
        public function addNotification($notificationBy,$notificationTo,$notification,$notificationOn){
            $data=[
                'notificationFrom'=>$notificationBy,
                'notificationTo'=>$notificationTo,
                'notificationOn'=>$notificationOn,
                'notification'=>$notification,
                'date'=>date("Y-m-d H:i:s"),
            ];

            $q=$this->db->insert('notification',$data);//active_record_user
            if($q){
                return true;
            }
            else{
                return false;
            }



        }


        public function delNotification($notificationBy,$notificationOn){
            $this->db->where('notificationFrom', $notificationBy);
            $this->db->where('notificationOn', $notificationOn);
            $this->db->where('notification', "likes on");
            $q=$this->db->delete('notification');
            if($q){
                return TRUE;
            }
            else{
                return false;
            }

        }


        public function showNotification($user){
            $this->db->select('n.*, b.title,u.fname,u.lname'); // Selecting the necessary fields including the blog title
            $this->db->from('notification n');
            $this->db->join('blogs b', 'b.blogid = n.notificationON'); // Joining with blogs table and aliasing it as 'b'
            $this->db->join('users u', 'u.uid = n.notificationFrom'); // Joining with blogs table and aliasing it as 'b'
            
            $this->db->where('n.notificationTo', $user);
            $this->db->where('n.notificationFrom !=', $user);
           
            $this->db->order_by('notificationId', 'desc'); // Order by notification ID in descending order
   
            $notifications = $this->db->get();
            return $notifications->result_array(); // Assuming this returns an array of notification objects with blogTitle included
        }


        public function countNotification($user){
            $this->db->from('notification');
            $this->db->where('notificationTo', $user);
            $this->db->where('notificationFrom !=', $user);
            $this->db->where('seen', 0); // Assuming 'seen' is a column indicating whether the notification is seen or not
            
            return $this->db->count_all_results(); // Returns the count of notifications that match the criteria
        }
        

    }
    ?>        