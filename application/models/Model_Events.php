<?php


class Model_Events extends CI_Model {

    public function get_events() {

        //$query = $this->db->query("SELECT event.id, event.title, event.date, event.time, event.venue, event.details, event.timeStamp, event.image, event.userId, user.username FROM siyothlk.event JOIN user on event.userId = user.userId ORDER BY event.timeStamp DESC;");
        $query = $this->db->query("SELECT event.id, event.title, event.details, event.timeStamp, event.image, event.userId, user.username FROM siyothlk.event JOIN user on event.userId = user.userId ORDER BY event.timeStamp DESC;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }


    }

    public function add_new_event($data) {

        $data = array(

            'title' => $this->input->post('title'),
            'details' => $this->input->post('content'),
            'timeStamp' => date ('Y-m-d H:i:s'),
            'image' => $data['image'],
            'userId' => $this->session->userdata('id')

        );

        return $this->db->insert('event', $data);

    }

    public function get_full_event($id) {

        $query = $this->db->query("SELECT event.id, event.title, event.details, event.timeStamp, event.image, event.userId, user.username FROM siyothlk.event JOIN user on event.userId = user.userId WHERE event.id=$id;");

        return $query->row(0);

    }

    public function get_edit_event ($id) {

        $query = $this->db->query("SELECT event.id, event.title, event.details FROM siyothlk.event WHERE event.id = $id;");
        return $query->row(0);

    }

    public function submit_edit_event() {

        $data = array(
            'title' => $this->input->post('title'),
            'details' => $this->input->post('details'),
            'timeStamp' => date ('Y-m-d H:i:s')
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('event', $data);

    }

    public function delete_event($id) {

        return $this->db->delete('event', array('id' => $id));

    }

}